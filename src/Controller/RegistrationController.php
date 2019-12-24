<?php

namespace App\Controller;

use App\Entity\GgmContact;
use App\Form\RegistrationFormType;
use App\Security\AppAdminAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param GuardAuthenticatorHandler $guardHandler
     * @param AppAdminAuthenticator $authenticator
     * @param \Swift_Mailer $mailer
     * @return Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, AppAdminAuthenticator $authenticator, \Swift_Mailer $mailer): Response
    {
        $user = new GgmContact();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $mail = $user->getEmail();
            $user->setPass(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $message = (new \Swift_Message("Confirmation d'inscription"))
                ->setFrom('send@example.com')
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


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
