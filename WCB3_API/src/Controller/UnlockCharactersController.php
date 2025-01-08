<?php

namespace App\Controller;

use App\Entity\Unlockcharacters;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UnlockCharactersController extends AbstractController
{
    #[Route('/api/unlockcharacters/user/{id}', name: 'get_unlock_characters_by_user', methods: ['GET'])]
    public function getUnlockCharactersByUser(int $id, EntityManagerInterface $em): JsonResponse
    {
        // Récupérer les enregistrements de la table Unlockcharacters pour l'utilisateur donné
        $unlockCharacters = $em->getRepository(Unlockcharacters::class)
            ->createQueryBuilder('uc')
            ->leftJoin('uc.character', 'c') // Joindre avec la table Character
            ->addSelect('c') // Inclure les données des personnages
            ->where('uc.user = :userId')
            ->setParameter('userId', $id)
            ->getQuery()
            ->getResult();

        // Transformer les résultats en un tableau JSON
        $responseData = [];
        foreach ($unlockCharacters as $unlockCharacter) {
            $character = $unlockCharacter->getCharacter();
            $responseData[] = [
                'idUnlock' => $unlockCharacter->getId(),
                'qty' => $unlockCharacter->getQty(),
                'character' => [
                    'id' => $character->getId(),
                    'nom' => $character->getNom(),
                    'age' => $character->getAge(),
                    'lore' => $character->getLore(),
                    'atk' => $character->getAtk(),
                    'vie' => $character->getVie(),
                    'competence' => $character->getCompetence(),
                    'sexe' => $character->getSexe(),
                    'img' => $character->getImg(),
                    'race' => $character->getRace(),
                ]
            ];
        }

        return new JsonResponse($responseData);
    }
}