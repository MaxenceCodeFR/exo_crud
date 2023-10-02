<?php

namespace App\Entity;

use App\Repository\HumainEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HumainEntityRepository::class)]
class HumainEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $cheveux = null;

    #[ORM\Column(length: 255)]
    private ?string $yeux = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToOne(mappedBy: 'couleurs', cascade: ['persist', 'remove'])]
    private ?CheveuxEntity $cheveuxEntity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCheveux(): ?string
    {
        return $this->cheveux;
    }

    public function setCheveux(string $cheveux): static
    {
        $this->cheveux = $cheveux;

        return $this;
    }

    public function getYeux(): ?string
    {
        return $this->yeux;
    }

    public function setYeux(string $yeux): static
    {
        $this->yeux = $yeux;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCheveuxEntity(): ?CheveuxEntity
    {
        return $this->cheveuxEntity;
    }

    public function setCheveuxEntity(?CheveuxEntity $cheveuxEntity): static
    {
        // unset the owning side of the relation if necessary
        if ($cheveuxEntity === null && $this->cheveuxEntity !== null) {
            $this->cheveuxEntity->setCouleurs(null);
        }

        // set the owning side of the relation if necessary
        if ($cheveuxEntity !== null && $cheveuxEntity->getCouleurs() !== $this) {
            $cheveuxEntity->setCouleurs($this);
        }

        $this->cheveuxEntity = $cheveuxEntity;

        return $this;
    }
}
