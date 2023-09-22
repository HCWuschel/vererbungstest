<?php

namespace App\Service;

use App\Entity\Auto;
use App\Entity\Einrad;
use App\Entity\Fahrrad;
use App\Entity\Roller;
use App\Entity\Tretauto;
use Doctrine\ORM\EntityManagerInterface;
use http\Client\Request;

class FahrzeugProviderService
{

	public function holeEinFahrzeugMitIdEinsUndGibInArray(EntityManagerInterface $entityManager) :array{
		$fahrzeugsammlung = [];

		$einAuto = $entityManager->getRepository(Auto::class)->findOneBy(['id'=>1]);
		array_push($fahrzeugsammlung,$einAuto);
		$einFahrrad = $entityManager->getRepository(Fahrrad::class)->findOneBy(['id'=>1]);
		array_push($fahrzeugsammlung,$einFahrrad);
		$einRoller = $entityManager->getRepository(Roller::class)->findOneBy(['id'=>1]);
		array_push($fahrzeugsammlung,$einRoller);
		$einEinrad = $entityManager->getRepository(Einrad::class)->findOneBy(['id'=>1]);
		array_push($fahrzeugsammlung,$einEinrad);
		$einTretauto = $entityManager->getRepository(Tretauto::class)->findOneBy(['id'=>1]);
		array_push($fahrzeugsammlung,$einTretauto);

		return $fahrzeugsammlung;


	}

	public function speichereDateninFahrzeugObjekteAusRequestListe(Request $request, EntityManagerInterface $entityManager):void{

	}

}