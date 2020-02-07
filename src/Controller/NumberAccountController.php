<?php

namespace App\Controller;

use App\Entity\GgmContact;
use App\Entity\Contact;
use App\Entity\GgmUserPanier;
use App\Entity\GgmUserPanierLigne;
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
        foreach ($passBdd as $compte){
            if (password_verify( $passForm , $compte->getPass() )) {
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
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function reset(Request $request, Mailer $mailer, TokenGeneratorInterface $tokenGenerator, GgmContactRepository $ggmContactRepository,  UserPasswordEncoderInterface $passwordEncoder)
    {

        /*** Récupération des données du formulaire ***/
        $mail_form = $_POST['choix_compte_form']['email'];
        $mdp_form = $_POST['choix_compte_form']['plainPassword'];

        $em = $this->getDoctrine()->getManager();


        /*** Recherche en bdd si le compte entré est bon et valide  ***/
        $user_valide = $ggmContactRepository->login($mail_form);

        /** Utilisation de la fonction pour savoir si le compte existe, Renvoie 'mdp_ok' */
        $verif_mdp = $this->compteExiste($user_valide, $mdp_form);

        if($verif_mdp)
        {
            /*** Recherche en bdd La liste des contact  ***/
            $all_contact = $em->getRepository(Contact::class)->findBy(['mailContact' => $mail_form]);

            /*** Recherche en bdd La liste des favoris  ***/
            $all_favoris = $em->getRepository(GgmUserPanier::class)->findBy(['fkLogin' => $mail_form]);

            /*** Recherche en bdd La liste des utilisateur  ***/
            $all_user = $em->getRepository(GgmContact::class)->findBy(['email' => $mail_form]);

            /*** Récuperation des element par liste de favoris ***/
            $detail_favoris = array();
            foreach ($all_favoris as $favoris)
            {
                $detail_favoris[] = $em->getRepository(GgmUserPanierLigne::class)->findBy(['fkPanier' => $favoris->getpkPanier()]);
            }

            return $this->render('account/reset.html.twig', [
                'users' => $all_user ,
                'contacts' => $all_contact,
                'favoris' => $all_favoris,
                'detail_favoris' => $detail_favoris
            ]);
        }
        else{
            $request->getSession()->getFlashBag()->add('error', "Mot de passe incorrecte ou compte non validé.");
            return $this->redirectToRoute("number_account");
        }

    }

    /**
     * @Route("/delete-compte", name="delete_account")
     * @param GgmContactRepository $ggmContactRepository
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(GgmContactRepository $ggmContactRepository)
    {
        //dump($_POST); die();
        /*** Récupération des données du formulaire ***/
        $id_save = $_POST['delete'];
        $entityManager = $this->getDoctrine()->getManager();

            /*** Récupération en bdd ggm_contact en fonction des cases cochés ***/
            $one_user = $entityManager->getRepository(GgmContact::class)->findOneBy(['pkGgmContact' => $id_save]);
            /** Récupération des utilisateurs non cochés pour le supprimer **/
            $other_users = $ggmContactRepository->loadOtherUser($one_user->GetEmail(), $id_save);

            foreach ($other_users as $one_user)
            {
            /*** Suppression utilisateur ggm ***/
            $entityManager->remove($one_user);
            $entityManager->flush();

            /*** Suppression CRM en bdd contact en fonction des cases cochés ***/
            $one_contact = $entityManager->getRepository(Contact::class)->findOneBy(['pkContact' => $one_user->getFkContact()]);
            $entityManager->remove($one_contact);
            $entityManager->flush();

            /*** Suppression Tiers en bdd tiers en fonction des cases cochés ***/

            $one_tiers = $entityManager->getRepository(Tiers::class)->findOneBy(['pkTiers' => $one_contact->getFkTiers()]);
            $entityManager->remove($one_tiers);
            $entityManager->flush();
            }
        return $this->redirectToRoute("request_resetting");
        //dump($tab_delete); die();
    }
}
