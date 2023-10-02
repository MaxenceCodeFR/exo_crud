<?php

namespace App\Entity;

use App\Repository\YeuxEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: YeuxEntityRepository::class)]
class YeuxEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
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
