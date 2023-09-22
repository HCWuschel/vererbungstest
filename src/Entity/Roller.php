<?php

namespace App\Entity;

use App\Repository\RollerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RollerRepository::class)]
class Roller extends SCFahrzeug
{


    #[ORM\Column(length: 255)]
    private ?string $raederhersteller = null;


    public function getRaederhersteller(): ?string
    {
        return $this->raederhersteller;
    }

    public function setRaederhersteller(string $raederhersteller): static
    {
        $this->raederhersteller = $raederhersteller;

        return $this;
    }
}
