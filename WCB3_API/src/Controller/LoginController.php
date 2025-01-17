<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login', methods: ['GET', 'POST'])]
    public function login(
        Request $request,
        UsersRepository $usersRepository,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        // Si l'utilisateur est déjà connecté, redirection vers une page spécifique
        if ($this->getUser()) {
            return $this->redirectToRoute('app_character');
        }

        // Si c'est une requête POST (soumission du formulaire de connexion)
        if ($request->isMethod('POST')) {
            $pseudo = $request->request->get('pseudo');
            $password = $request->request->get('password');

            // Vérification des données
            if (!$pseudo || !$password) {
                return $this->render('security/login.html.twig', [
                    'error' => 'Missing username or password',
                ]);
            }

            // Rechercher l'utilisateur
            $user = $usersRepository->findOneBy(['username' => $pseudo]);

            // Vérifier si l'utilisateur existe et si le mot de passe est valide
            if (!$user || !$passwordHasher->isPasswordValid($user, $password)) {
                return $this->render('security/login.html.twig', [
                    'error' => 'Invalid credentials',
                ]);
            }

            // Rediriger vers une page en cas de succès (simule une connexion réussie)
            return $this->redirectToRoute('app_character');
        }

        // Pour une requête GET, afficher le formulaire
        return $this->render('security/login.html.twig', [
            'error' => null, // Pas d'erreur initialement
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
