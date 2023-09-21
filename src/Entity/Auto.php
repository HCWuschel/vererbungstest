<?php

namespace App\Entity;

use App\Repository\AutoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AutoRepository::class)]
class Auto extends SCFahrzeug
{


    #[ORM\Column(length: 255)]
    private ?string $lenkradtyp = null;


    public function getLenkradtyp(): ?string
    {
        return $this->lenkradtyp;
    }

    public function setLenkradtyp(string $lenkradtyp): static
    {
        $this->lenkradtyp = $lenkradtyp;

        return $this;
    }
}
