<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\GgmContact;
use App\Entity\Contact;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\Mailer;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\Form\ResettingType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Repository\GgmContactRepository;

class ResettingController extends AbstractController
{

    // si supérieur à 10min, retourne false
    // sinon retourne false
    private function isRequestInTime(\Datetime $passwordRequestedAt = null)
    {
        if ($passwordRequestedAt === null)
        {
            return false;
        }

        $now = new \DateTime();
        $interval = $now->getTimestamp() - $passwordRequestedAt->getTimestamp();

        $daySeconds = 60 * 60 * 24 ;
        $response = $interval > $daySeconds ? false : $reponse = true;
        return $response;
    }

    /**
     * @Route("/{id}/{token}", name="resetting")
     * @param GgmContact $user
     * @param $token
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function resetting(GgmContact $user ,  $token, Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // interdit l'accès à la page si:
        // le token associé au membre est null
        // le token enregistré en base et le token présent dans l'url ne sont pas égaux
        // le token date de plus de 10 minutes

        if ($user->getToken() === null || $token !== $user->getToken() || !$this->isRequestInTime($user->getPasswordRequestedAt()))
        {
            throw new AccessDeniedHttpException();
        }

        $form = $this->createForm(ResettingType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {

            /** Recupération des données en table contact */
            $em = $this->getDoctrine()->getManager();
            /** Recupération des données en table contact en fonction de la fk de ggm contact */
            $contact = $em->getRepository(Contact::class)->findOneBy(['pkContact' => $user->getFkContact()]);

            $password = $passwordEncoder->encodePassword($user, $user->getPass());

            /** On reinitialise le mdp de la table ggm contact puis de contact (CRM) */
            $contact->setPassword($password);
            $user->setPass($password);
            //$contact->setPassword($password);

            // réinitialisation du token à null pour qu'il ne soit plus réutilisable
            $user->setToken(null);
            $user->setPasswordRequestedAt(null);

            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', "Votre mot de passe a été renouvelé.");

            return $this->redirectToRoute('app_login');

        }

        return $this->render('resetting/index.html.twig', [
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/renouvellement-mot-de-passe", name="request_resetting")
     * @param Request $request
     * @param Mailer $mailer
     * @param TokenGeneratorInterface $tokenGenerator
     * @param GgmContactRepository $ggmContactRepository
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @throws \Exception
     */
    public function request(Request $request, Mailer $mailer, TokenGeneratorInterface $tokenGenerator, GgmContactRepository $ggmContactRepository)
    {
        // création d'un formulaire "à la volée", afin que l'internaute puisse renseigner son mail
        $form = $this->createFormBuilder()
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Email(),
                    new NotBlank()
                ],
                'attr' => [
                    'placeholder' => 'Email',
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr' => [

                    'placeholder' => 'Prénom',
                ]
            ])
            ->add('nom', TextType::class, [
                'attr' => [
                    'placeholder' => 'Nom',
                ]
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();


            /** Requete pour voir si il existe plusieur compte à cette adresse */
            $user = $ggmContactRepository->loadUserInfos($form->getData()['email'],$form->getData()['prenom'],$form->getData()['nom']);

            /** Calcule du nombre de compte existant pour rediriger vers une page qui permet de choisir le compte à garder **/
            $nombreCompte = count($user);

            if( $nombreCompte > 1){
                // redirect to a route with parameters
                return $this->redirectToRoute('number_account' ,['prenom' => $form->getData()['prenom'], 'nom' => $form->getData()['nom'] ]);
            }


            $user_valide = $ggmContactRepository->findOneBy(array('email' => $form->getData()['email'],'prenom' => $form->getData()['prenom'],'nom' => $form->getData()['nom'])) ;


            /** si aucun email n'à était validé. **/
            if (!$user_valide) {
                $request->getSession()->getFlashBag()->add('warning', "Cet email n'existe pas ou n'a pas était validé.");
                return $this->redirectToRoute("request_resetting");
            }

            // création du token
            $user_valide->setToken($tokenGenerator->generateToken());

            // enregistrement de la date de création du token
            $user_valide->setPasswordRequestedAt(new \Datetime());
            $em->flush();

            // on utilise le service Mailer créé précédemment
            $bodyMail = $mailer->createBodyMail('resetting/mail.html.twig', [
                'user' => $user_valide
            ]);
            $mailer->sendMessage('from@email.com', $user_valide->getEmail(), 'renouvellement du mot de passe', $bodyMail);
            $request->getSession()->getFlashBag()->add('success', "Un mail va vous être envoyé afin que vous puissiez renouveller votre mot de passe. Le lien que vous recevrez sera valide 24h.");

            return $this->redirectToRoute("request_resetting");
        }

        return $this->render('resetting/request.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
