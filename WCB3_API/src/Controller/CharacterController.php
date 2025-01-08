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
        // Créer un query builder pour obtenir tous les personnages
        $characters = $em->getRepository(Character::class)
            ->createQueryBuilder('c')
            ->getQuery()
            ->getResult();

        shuffle($characters);
        $randomCharacters = array_slice($characters, 0, 10); // Sélectionner les 10 premiers

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
}
