<?php

namespace App\Entity;

use App\Repository\EinradRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EinradRepository::class)]
class Einrad extends SCFahrzeug
{

    #[ORM\Column(length: 255)]
    private ?string $pedalenhersteller = null;


    public function getPedalenhersteller(): ?string
    {
        return $this->pedalenhersteller;
    }

    public function setPedalenhersteller(string $pedalenhersteller): static
    {
        $this->pedalenhersteller = $pedalenhersteller;

        return $this;
    }
}
