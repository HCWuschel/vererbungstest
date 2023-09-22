<?php

namespace App\Entity;

use App\Repository\TretautoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TretautoRepository::class)]
class Tretauto extends SCFahrzeug
{


    #[ORM\Column(length: 255)]
    private ?string $bremsenhersteller = null;



    public function getBremsenhersteller(): ?string
    {
        return $this->bremsenhersteller;
    }

    public function setBremsenhersteller(string $bremsenhersteller): static
    {
        $this->bremsenhersteller = $bremsenhersteller;

        return $this;
    }
}
