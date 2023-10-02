<?php

namespace App\Entity;

use App\Repository\CheveuxEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CheveuxEntityRepository::class)]
class CheveuxEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'cheveuxEntity', cascade: ['persist', 'remove'])]
    private ?HumainEntity $couleurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCouleurs(): ?HumainEntity
    {
        return $this->couleurs;
    }

    public function setCouleurs(?HumainEntity $couleurs): static
    {
        $this->couleurs = $couleurs;

        return $this;
    }
}
