<?php

namespace App\Controller;

use App\Entity\UnlockedCharacter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UnlockedCharacterController extends AbstractController
{
    #[Route('/unlocked/character', name: 'app_unlocked_character')]
    public function index(): Response
    {
        return $this->render('unlocked_character/index.html.twig', [
            'controller_name' => 'UnlockedCharacterController',
        ]);
    }

    #[Route('/api/users/{id}/unlocked-characters', name: 'get_unlocked_characters_by_user', methods: ['GET'])]
    public function getUnlockedCharactersByUser(int $id, EntityManagerInterface $em): JsonResponse
    {
        $unlockedCharacters = $em->getRepository(UnlockedCharacter::class)
            ->createQueryBuilder('uc')
            ->leftJoin('uc.idcharacter', 'c')
            ->addSelect('c')
            ->where('uc.iduser = :userId')
            ->setParameter('userId', $id)
            ->getQuery()
            ->getResult();

        $responseData = [];
        foreach ($unlockedCharacters as $unlockedCharacter) {
            $character = $unlockedCharacter->getIdcharacter();
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
                'level' => $unlockedCharacter->getLevel(),
            ];
        }

        return new JsonResponse($responseData);
    }
}