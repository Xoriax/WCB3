<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource(
    operations: [
        new \ApiPlatform\Metadata\GetCollection(),
        new \ApiPlatform\Metadata\Get(
            uriTemplate: '/unlockcharacters/user/{id}',
            controller: 'App\Controller\UnlockCharactersController::getUnlockCharactersByUser',
            name: 'get_unlock_characters_by_user'
        ),
    ],
)]
class Unlockcharacters
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Users::class)]
    #[ORM\JoinColumn(name: "iduser", referencedColumnName: "id", onDelete: "CASCADE")]
    private ?Users $user = null;

    #[ORM\ManyToOne(targetEntity: Character::class)]
    #[ORM\JoinColumn(name: "idcharacter", referencedColumnName: "id", onDelete: "CASCADE")]
    private ?Character $character = null;

    #[ORM\Column(type: 'integer')]
    private int $qty = 1;

    // Getters et setters...

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getCharacter(): ?Character
    {
        return $this->character;
    }

    public function setCharacter(?Character $character): self
    {
        $this->character = $character;
        return $this;
    }

    public function getQty(): int
    {
        return $this->qty;
    }

    public function setQty(int $qty): self
    {
        $this->qty = $qty;
        return $this;
    }
}