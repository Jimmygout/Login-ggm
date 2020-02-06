<?php

namespace App\Controller;

use App\Entity\GgmContact;
use App\Entity\Contact;
use App\Entity\Tiers;
use App\Repository\TiersRepository;
use App\Form\RegistrationFormType;
use App\Security\AppAdminAuthenticator;
use App\Services\Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/inscription", name="app_register")
     * @param TiersRepository $tiersRepository
     * @param TokenGeneratorInterface $tokenGenerator
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param GuardAuthenticatorHandler $guardHandler
     * @param AppAdminAuthenticator $authenticator
     * @param Mailer $mailer
     * @return Response
     */
    public function register(TiersRepository $tiersRepository, TokenGeneratorInterface $tokenGenerator,  Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, AppAdminAuthenticator $authenticator, Mailer $mailer): Response
    {
        $user = new GgmContact();
        $contact = new Contact();
        $tiers = new Tiers();

        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $mail = $user->getEmail();

            /****************************************************************
             ************** Integration dans la table Tiers *****************
             *****************************************************************/

            /**** Récupération du dernier Tiers en bas de données ****/
            $tiersBdd = $tiersRepository->findLast();

            /**** Création d'un nouveau numéro de Tiers ****/
            $dernierTiers = $tiersBdd[0]->getPkTiers();
            $tiersDecoupe = SUBSTR($dernierTiers, 3, 10);
            $newNumTiers = $tiersDecoupe + 4 ;
            $newTiers = "CRM$newNumTiers";

            /**** Insertion des données dans la table tiers ****/
            $tiers
                ->setpkTiers($newTiers)
                ->setTypeTiers($user->gettypeSociete())
                ->setasw('N')
                ->setNomTiers($user->getSociete())
                ->setnomInterneTiers($user->getSociete());


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tiers);
            $entityManager->flush();

            /****************************************************************
            ********* Integration de l'utilisateur dans le CRM **************
            *****************************************************************/

            $contact
                ->setFkTiers($tiers->getPkTiers())
                ->setmailContact($user->getEmail())
                ->setnomContact($user->getNom())
                ->setprenomContact($user->getPrenom())
                ->settelContact($user->getTelephone())
                ->setmobileContact($user->getGsm())
                ->setpassword($passwordEncoder->encodePassword(
                    $user,
                    $form->get('pass')->getData()
                ))
                ->setville($user->getVille())
                ->setpays($user->getPays())
                ->setlangCc($user->getLang())
                ->setdateCre(time())
                ->setsource('gigamedia.net')
                ->setnewsletterGgm($user->getNewsletter());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
            //dump($contact->getPkContact()); die();

            /*************** Fin Integration dans le CRM ***************/


            /****************************************************************
             ****** Integration de l'utilisateur dans les Contacts GGM *******
             *****************************************************************/
            $user
                ->setFkContact($contact->getPkContact())
                ->setSubDate(time())
                ->setsource('gigamedia.net');

            $user
                ->setValide('N')
                ->setConfirmAccount($tokenGenerator->generateToken());
            //dump($form); die;
            $user->setPass(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('pass')->getData()
                )
            );
            /*
            $message = (new \Swift_Message("Confirmation d'inscription"))
                ->setFrom('jimmy.gout@conectis.com')
                ->setTo($mail)
                ->setBody(
                    $this->renderView(
                    // templates/emails/inscription.html.twig
                        'emails/inscription.html.twig',
                        ['mail' => $mail]
                    ),
                    'text/html'
                )
            ;

            $mailer->send($message);
            */

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            /*************** Fin Integration les Contacts GGM  ***************/


            /****************************************************************
             ********** Envoie de mail pour la confirmation mail ************
             *****************************************************************/

            // on utilise le service Mailer créé précédemment
            $bodyMail = $mailer->createBodyMail('mail/validationMail.html.twig', [
                'user' => $user
            ]);
            $mailer->sendMessage('from@email.com', $user->getEmail(), 'renouvellement du mot de passe', $bodyMail);
            $request->getSession()->getFlashBag()->add('success', "Un mail va vous être envoyé afin que vous puissiez valider votre compte");


            /*************** Fin d'envoi de mail de confirmation ***************/

            return $this->redirectToRoute("app_login");

            // do anything else you need here, like send an email
/*
            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );*/
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/validation-compte/{id}/{token}", name="confirm_account")
     * @param $token
     * @param $id
     * @return Response
     */
    public function confirmAccount($token, $id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(GgmContact::class)->findOneBy(['pkGgmContact' => $id]);
        $tokenExist = $user->getConfirmAccount();

        if($token === $tokenExist) {
            $user->setValide('O');
            $user->setvalideLe(time());
            $user->setRoles(["ROLE_USER"]);
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('app_login');
        } else {
            return $this->render('registration/token-expire.html.twig');
        }
    }
}
