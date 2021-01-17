<?php

namespace App\Controller;
use App\Entity\User;
use App\Repository\UserRepository;
use Firebase\JWT\JWT;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends AbstractController
{
    /**
     * @Route("/auth", name="auth")
     */
    public function index(): Response
    {
        return $this->render('auth/index.html.twig', [
            'controller_name' => 'AuthController',
        ]);
    }

    /**
    * @Route("/auth/login", name="login", methods={"POST", "DELETE", "GET", "OPTIONS"})
    */
    public function login(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $encoder)
    {
            $user = $userRepository->findOneBy([
                    'email'=>$request->get('email'),
            ]);
            if (!$user || !$encoder->isPasswordValid($user, $request->get('password'))) {
                    return $this->json([
                        'message' => 'email or password is wrong.',
                    ]);
            }
        $payload = [
            "user" => $user->getUsername(),
            "exp"  => (new \DateTime())->modify("+5 minutes")->getTimestamp(),
        ];


            $jwt = JWT::encode($payload, $this->getParameter('jwt_secret'), 'HS256');
            return $this->json([
                'message' => 'success!',
                'token' => sprintf('Bearer %s', $jwt),
            ]);
    }

    /**
     * @Route("/auth/register", name="register", methods={"POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {

        $password = $request->get('password');
        $email = $request->get('email');
        $username = $request->get('username');
        $last_login = new \DateTime();//)->format('Y-m-d H:i:s');
        $firstname = $request->get('firstname');
        $lastname = $request->get('lastname');
        $avatar = $request->files->get('avatar');

        $user = new User();
        $user->setPassword($encoder->encodePassword($user, $password));
        $user->setEmail($email);
        $user->setUsername($username);
        $user->setLastLogin($last_login);
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        //TODO: avatar
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        return $this->json([
            'user' => $user->getEmail()
        ]);
    }
}
