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
        $characters = $em->getRepository(Character::class)
            ->createQueryBuilder('c')
            ->getQuery()
            ->getResult();

        shuffle($characters);
        $randomCharacters = array_slice($characters, 0, 10);

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
        $characters = $em->getRepository(Character::class)
            ->createQueryBuilder('c')
            ->getQuery()
            ->getResult();

        shuffle($characters);
        $randomCharacter = $characters[0];

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
