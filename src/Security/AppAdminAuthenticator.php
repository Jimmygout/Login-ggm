<?php

namespace App\Security;

use App\Entity\GgmContact;
use App\Repository\GgmContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Guard\PasswordAuthenticatedInterface;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppAdminAuthenticator extends AbstractFormLoginAuthenticator implements PasswordAuthenticatedInterface
{
    use TargetPathTrait;

    private $entityManager;
    private $urlGenerator;
    private $csrfTokenManager;
    private $passwordEncoder;

    public function __construct(EntityManagerInterface $entityManager, UrlGeneratorInterface $urlGenerator, CsrfTokenManagerInterface $csrfTokenManager , UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->entityManager = $entityManager;
        $this->urlGenerator = $urlGenerator;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function supports(Request $request)
    {
        return 'app_login' === $request->attributes->get('_route')
            && $request->isMethod('POST');
    }

    public function getCredentials(Request $request)
    {

        $credentials = [
            'email' => $request->request->get('email'),
            'password' => $request->request->get('password'),
            'csrf_token' => $request->request->get('_csrf_token'),
        ];
        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['email']
        );

        return $credentials;
    }

    /**
     * @param mixed $credentials
     * @param UserProviderInterface $userProvider
     * @return object|UserInterface|null
     */
    public function getUser( $credentials, UserProviderInterface $userProvider)
    {


        $token = new CsrfToken('authenticate', $credentials['csrf_token']);
        if (!$this->csrfTokenManager->isTokenValid($token)) {
            throw new InvalidCsrfTokenException();
        }

        /**  On recupére tout les user aveec cette adresse mail **/
        $users = $this->entityManager->getRepository(GgmContact::class)->findBy(['email' => $credentials['email'],'valide' => 'O']);
        $user = false;
        /** @var Boucle pour trouver a quelle adresse corespond ce mot de passe **/
        foreach ( $users as $oneUser) {
            /** Si le mot de passe entré corespond au mot de passe de la BDD */
            if ($this->passwordEncoder->isPasswordValid($oneUser, $credentials['password']) == true){
                $user = $oneUser;
            };
        }

        /** Message si le mail est introuvable **/
        if (!$user) {
            // fail authentication with a custom error
            throw new CustomUserMessageAuthenticationException('Le compte est introuvable.');
        }

        /** Message si le compte n'a pas encore etait validé */

        if ($user->GetValide() == 'N') {
            // fail authentication with a custom error
            throw new CustomUserMessageAuthenticationException('Vous n\'avez pas encore valider votre compte');
        }

        return $user;
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        return $this->passwordEncoder->isPasswordValid($user, $credentials['password']);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     * @param $credentials
     * @return string|null
     */
    public function getPassword($credentials): ?string
    {
        return $credentials['password'];
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token , $providerKey)
    {
        /*Récuperation des infos pour initialiser les variable de sessions*/
        /*
        $user = $this->entityManager->getRepository(GgmContact::class)->findOneBy(['email' => $request->request->get('email') ]);

        $session = new Session();
        $session->set('pk',  $request->request->get('email'));
        $session->set('login', $request->request->get('email'));
        $session->set('nom', $request->request->get('email'));
        $session->set('prenom', $request->request->get('email'));
        $session->set('lang', $request->request->get('email'));
        $session->set('profil', $request->request->get('email'));
        $session->set('societe', $request->request->get('email'));
        $session->set('nom_societe', $request->request->get('email'));
        $session->set('agence', $request->request->get('email'));
        $session->set('cp', $request->request->get('email'));
        $session->set('ville', $request->request->get('email'));
        $session->set('pays', $request->request->get('email'));
        $session->set('telephone', $request->request->get('email'));
        $session->set('fax', $request->request->get('email'));
        $session->set('listep', $request->request->get('email'));
        $session->set('newsletter', $request->request->get('email'));


        dump($user); die();
//$test = $request->getSession();
*/
        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
            return new RedirectResponse($targetPath);
        }

        return new RedirectResponse('test');
        //throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
    }

    protected function getLoginUrl()
    {
        return $this->urlGenerator->generate('app_login');
    }
}
