<?php

namespace App\Entity;

use App\Repository\SCFahrzeugRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\MappedSuperclass;

#[MappedSuperclass]
#[DiscriminatorColumn(name: 'id', type: 'int')]

class SCFahrzeug
{
	#[ORM\Id]
                     	#[ORM\GeneratedValue]
                     	#[ORM\Column]
                     	private ?int $id = null;

	/**
	 * @return int|null
	 */
	public function getId(): ?int
                     	{
                     		return $this->id;
                     	}

	/**
	 * @param int|null $id
	 */
	public function setId(?int $id): void
                     	{
                     		$this->id = $id;
                     	}

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $orderRank = 1;

	#[ORM\Column(length: 255)]
         	private ?string $status = 'Angefragt';

    #[ORM\Column]
    private ?int $idUmfassendeKlasse = 1;

	/**
	 * @return string|null
	 */
	public function getStatus(): ?string
         	{
         		return $this->status;
         	}

	/**
	 * @param string|null $status
	 */
	public function setStatus(?string $status): void
         	{
         		$this->status = $status;
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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getOrderRank(): ?int
    {
        return $this->orderRank;
    }

    public function setOrderRank(int $orderRank): static
    {
        $this->orderRank = $orderRank;

        return $this;
    }

    public function getIdUmfassendeKlasse(): ?int
    {
        return $this->idUmfassendeKlasse;
    }

    public function setIdUmfassendeKlasse(int $idUmfassendeKlasse): static
    {
        $this->idUmfassendeKlasse = $idUmfassendeKlasse;

        return $this;
    }
}
