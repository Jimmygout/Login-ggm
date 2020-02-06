<?php

namespace App\Controller;

use App\Entity\GgmContact;
use App\Entity\Contact;
use App\Entity\Tiers;
use App\Form\ChoixCompteFormType;
use App\Repository\GgmContactRepository;
use App\Services\Mailer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class NumberAccountController extends AbstractController
{
    /**
     * @Route("/choix-de-compte", name="number_account")
     * @return Response
     */
    public function index()
    {
        return $this->render('account/number.html.twig', []);
    }


    /**
     * Fonction pour déterminer si il existe ou non un comtpe avec mail et pass corespondant
     * @param $passBdd
     * @param $passForm
     * @return string
     */
    function compteExiste($passBdd, $passForm){
        foreach ($passBdd as $test){
            if (password_verify( $passForm , $test->getPass() )) {
                return 'mdp ok'; break;
            }
        }
    }

    /**
     * @Route("/reset-compte", name="reset_account")
     * @param Request $request
     * @param Mailer $mailer
     * @param TokenGeneratorInterface $tokenGenerator
     * @param GgmContactRepository $ggmContactRepository
     * @param Contact $contact
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function reset(Request $request, Mailer $mailer, TokenGeneratorInterface $tokenGenerator, GgmContactRepository $ggmContactRepository,  UserPasswordEncoderInterface $passwordEncoder)
    {

        /*** Récupération des données du formulaire ***/
        $mail_form = $_POST['choix_compte_form']['email'];
        $mdp_form = $_POST['choix_compte_form']['plainPassword'];

        $em = $this->getDoctrine()->getManager();

        /*** Recherche en bdd si l'utilisateur existe ***/
        $all_user = $ggmContactRepository->loadUserByUsername($mail_form);
        $all_contact = $em->getRepository(Contact::class)->findBy(['mailContact' => $mail_form]);


        $all_contact = $em->getRepository(Contact::class)->findBy(['mailContact' => $mail_form]);

        $all_user = $ggmContactRepository->loadUserByUsername($mail_form);

        /** Utilisation de la fonction pour savoir si le compte existe, Renvoie 'mdp_ok' */
        $verif_mdp = $this->compteExiste($all_user, $mdp_form);
        $result = array_merge($all_user, $all_contact);


        dump($result);
        if($verif_mdp)
        {
            return $this->render('account/reset.html.twig', [
                'users' => $all_user ,
                'contacts' => $all_contact
            ]);
        }
        /** Calcule du nombre de compte existant pour rediriger vers une page qui permet de choisir le compte à garder **/
        $nombreCompte = count($all_user);




        // aucun email associé à ce compte.
        if (!$user) {
            $request->getSession()->getFlashBag()->add('warning', "Cet email n'existe pas.");
            return $this->redirectToRoute("request_resetting");
        }

        dump($_POST['choix_compte_form']); die();

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $mail = $form->getEmail();
            dump($mail); die();
        }

        return $this->render('number_account/index.html.twig', [
            'Form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete-compte", name="delete_account")
     *
     */
    public function delete()
    {
        dump($_POST); die();
        /*** Récupération des données du formulaire ***/
        $tab_delete = $_POST['delete'];

        foreach ($tab_delete as $em_delete){

            $entityManager = $this->getDoctrine()->getManager();

            /*** Suppression en bdd ggm_contact en fonction des cases cochés ***/
            $one_user = $entityManager->getRepository(GgmContact::class)->findOneBy(['pkGgmContact' => $em_delete]);
            //$entityManager->remove($one_user);
            //$entityManager->flush();

            /*** Suppression CRM en bdd contact en fonction des cases cochés ***/
            $one_contact = $entityManager->getRepository(Contact::class)->findOneBy(['pkContact' => $one_user->getFkContact()]);
            //$entityManager->remove($one_contact);
            //$entityManager->flush();

            /*** Suppression Tiers en bdd tiers en fonction des cases cochés ***/
            $one_tiers = $entityManager->getRepository(Tiers::class)->findOneBy(['pkTiers' => $one_contact->getFkTiers()]);
            dump($one_tiers); die();
            //$entityManager->remove($one_tiers);
            //$entityManager->flush();
        }
        dump($tab_delete); die();
    }
}
