<?php

namespace App\Entity;

use App\Repository\TasksRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TasksRepository::class)]
class Tasks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'tasks')]
    private ?ToDo $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?ToDo
    {
        return $this->name;
    }

    public function setName(?ToDo $name): static
    {
        $this->name = $name;

        return $this;
    }
}
