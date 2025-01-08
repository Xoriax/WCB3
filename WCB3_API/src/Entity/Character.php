<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource(
    operations: [
        new \ApiPlatform\Metadata\GetCollection(),
        new \ApiPlatform\Metadata\Get(name: 'random_characters', uriTemplate: '/random-characters', controller: 'App\Controller\CharacterController::getRandomCharacters'),
        new \ApiPlatform\Metadata\Get(name: 'random_character', uriTemplate: '/random-character', controller: 'App\Controller\CharacterController::getRandomCharacter'),
        new \ApiPlatform\Metadata\Get(),
    ],
)]
class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $nom;

    #[ORM\Column(type: 'integer')]
    private int $age;

    #[ORM\Column(type: 'text')]
    private string $lore;

    #[ORM\Column(type: 'integer')]
    private int $atk;

    #[ORM\Column(type: 'integer')]
    private int $vie;

    #[ORM\Column(type: 'string', length: 255)]
    private string $competence;

    #[ORM\Column(type: 'string', length: 10)]
    private string $sexe;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $img;

    #[ORM\Column(type: 'string', length: 255)]
    private string $race;

    // Getters et setters...

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this;
    }

    public function getLore(): string
    {
        return $this->lore;
    }

    public function setLore(string $lore): self
    {
        $this->lore = $lore;
        return $this;
    }

    public function getAtk(): int
    {
        return $this->atk;
    }

    public function setAtk(int $atk): self
    {
        $this->atk = $atk;
        return $this;
    }

    public function getVie(): int
    {
        return $this->vie;
    }

    public function setVie(int $vie): self
    {
        $this->vie = $vie;
        return $this;
    }

    public function getCompetence(): string
    {
        return $this->competence;
    }

    public function setCompetence(string $competence): self
    {
        $this->competence = $competence;
        return $this;
    }

    public function getSexe(): string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;
        return $this;
    }

    public function getRace(): string
    {
        return $this->race;
    }

    public function setRace(string $race): self
    {
        $this->nom = $race;
        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;
        return $this;
    }

}
