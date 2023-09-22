<?php

namespace App\Service;

use App\Entity\Auto;
use App\Entity\Einrad;
use App\Entity\Fahrrad;
use App\Entity\Roller;
use App\Entity\Tretauto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

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
	//Lade Daten in Array
		$sortierDaten = $request->request->all();

		//Deklariere einen Itterator der die tatsächliche Reihenfolge aufnimmt
		$sortierItterator = 0;
		//itterie durch zugrundeliegendes Array
		foreach ($sortierDaten as $daten){
			//Erhöhe den Wert des Itterators um 1
			$sortierItterator +=1;
			//teile den String
				$datenTeile = explode("-",$daten);
			//extrahiere Daten
			$idDesFahrzeugs = $datenTeile[0];
			$idUmfassendeKlasse = $datenTeile[1];

			switch ($idUmfassendeKlasse){
				case 1:
					$fahrzeug = $entityManager->getRepository(Auto::class)->findOneBy(['id'=>$idDesFahrzeugs]);
					$fahrzeug->setOrderRank($sortierItterator);
					$entityManager->flush();
					break;
				case 2:
					$fahrzeug = $entityManager->getRepository(Fahrrad::class)->findOneBy(['id'=>$idDesFahrzeugs]);
					$fahrzeug->setOrderRank($sortierItterator);
					$entityManager->flush();
					break;
				case 3:
					$fahrzeug = $entityManager->getRepository(Roller::class)->findOneBy(['id'=>$idDesFahrzeugs]);
					$fahrzeug->setOrderRank($sortierItterator);
					$entityManager->flush();
					break;
				case 4:
					$fahrzeug = $entityManager->getRepository(Einrad::class)->findOneBy(['id'=>$idDesFahrzeugs]);
					$fahrzeug->setOrderRank($sortierItterator);
					$entityManager->flush();
					break;
				case 5:
					$fahrzeug = $entityManager->getRepository(Tretauto::class)->findOneBy(['id'=>$idDesFahrzeugs]);
					$fahrzeug->setOrderRank($sortierItterator);
					$entityManager->flush();
					break;

			}

	}
	}
	public  function ladeInfoBekannteFahrzeuge():array{

	}

}