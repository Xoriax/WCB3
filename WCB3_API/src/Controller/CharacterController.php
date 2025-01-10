<?php

namespace App\Controller;

use App\Entity\Character;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class CharacterController extends AbstractController
{
    #[Route('/character', name: 'app_character')]
    public function index(): Response
    {
        return $this->render('character/index.html.twig', [
            'controller_name' => 'CharacterController',
        ]);
    }

    #[Route('/api/random-characters', name: 'random_characters', methods: ['GET'])]
    public function getRandomCharacters(EntityManagerInterface $em): JsonResponse
    {
        // Récupérer tous les personnages depuis la base de données
        $characters = $em->getRepository(Character::class)
            ->createQueryBuilder('c')
            ->getQuery()
            ->getResult();

        if (empty($characters)) {
            return new JsonResponse(['error' => 'No characters found'], 404);
        }

        // Générer une liste aléatoire avec répétitions possibles
        $randomCharacters = [];
        for ($i = 0; $i < 10; $i++) {
            $randomIndex = array_rand($characters); // Choisir un index aléatoire
            $randomCharacter = $characters[$randomIndex]; // Récupérer le personnage
            $randomCharacters[] = $randomCharacter;
        }

        // Transformer les objets en tableau pour la réponse JSON
        $responseData = array_map(function (Character $character) {
            return [
                'id' => $character->getId(),
                'nom' => $character->getNom(),
                'age' => $character->getAge(),
                'lore' => $character->getLore(),
                'atk' => $character->getAtk(),
                'vie' => $character->getVie(),
                'competence' => $character->getCompetence(),
                'sexe' => $character->getSexe(),
                'img' => $character->getImg(),
                'race' => $character->getRace()
            ];
        }, $randomCharacters);

        return new JsonResponse($responseData);
    }

    #[Route('/api/random-character', name: 'random_character', methods: ['GET'])]
    public function getRandomCharacter(EntityManagerInterface $em): JsonResponse
    {
        // Récupérer tous les personnages depuis la base de données
        $characters = $em->getRepository(Character::class)
            ->createQueryBuilder('c')
            ->getQuery()
            ->getResult();

        if (empty($characters)) {
            return new JsonResponse(['error' => 'No characters found'], 404);
        }

        // Choisir un personnage aléatoire
        $randomIndex = array_rand($characters);
        $randomCharacter = $characters[$randomIndex];

        // Transformer l'objet en tableau pour la réponse JSON
        $responseData = [
            'id' => $randomCharacter->getId(),
            'nom' => $randomCharacter->getNom(),
            'age' => $randomCharacter->getAge(),
            'lore' => $randomCharacter->getLore(),
            'atk' => $randomCharacter->getAtk(),
            'vie' => $randomCharacter->getVie(),
            'competence' => $randomCharacter->getCompetence(),
            'sexe' => $randomCharacter->getSexe(),
            'img' => $randomCharacter->getImg(),
            'race' => $randomCharacter->getRace()
        ];

        return new JsonResponse($responseData);
    }
} 