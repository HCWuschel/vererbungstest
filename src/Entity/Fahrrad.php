<?php

namespace App\Entity;

use App\Repository\FahrradRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FahrradRepository::class)]
class Fahrrad extends SCFahrzeug

{


    #[ORM\Column(length: 255)]
    private ?string $satteltyp = null;


    public function getSatteltyp(): ?string
    {
        return $this->satteltyp;
    }

    public function setSatteltyp(string $satteltyp): static
    {
        $this->satteltyp = $satteltyp;

        return $this;
    }
}
