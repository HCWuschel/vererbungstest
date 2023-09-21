<?php

namespace App\Entity;

use App\Repository\SCFahrzeugRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;

#[MappedSuperclass]
class SCFahrzeug
{


    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $alter = null;



    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAlter(): ?int
    {
        return $this->alter;
    }

    public function setAlter(int $alter): static
    {
        $this->alter = $alter;

        return $this;
    }
}
