<?php

namespace App\Controller;

use App\Entity\Character;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CharacterController extends AbstractController
{
    #[Route('/api/random-characters', name: 'random_characters', methods: ['GET'])]
    public function getRandomCharacters(EntityManagerInterface $em): JsonResponse
    {
        // Récupérer tous les personnages depuis la base de données
        $characters = $em->getRepository(Character::class)
            ->createQueryBuilder('c')
            ->getQuery()
            ->getResult();

        // Générer une liste aléatoire avec répétitions possibles
        $randomCharacters = [];
        for ($i = 0; $i < 10; $i++) {
            $randomIndex = array_rand($characters); // Choisir un index aléatoire
            $randomCharacter = $characters[$randomIndex]; // Récupérer le personnage
            $randomCharacters[] = $randomCharacter;
        }

        // Transformer les objets en tableau pour la réponse JSON
        $responseData = [];
        foreach ($randomCharacters as $character) {
            $responseData[] = [
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
        }

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
