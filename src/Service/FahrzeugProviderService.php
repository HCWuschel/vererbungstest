<?php

namespace App\Service;

use App\Entity\Auto;
use App\Entity\Einrad;
use App\Entity\Fahrrad;
use App\Entity\Roller;
use App\Entity\SCFahrzeug;
use App\Entity\Tretauto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class UmgebendesFahrzeug{


	private SCFahrzeug $fahrzeug;

	/**
	 * @return SCFahrzeug
	 */

	function __construct($Fahrzeug){
		$this->fahrzeug = $Fahrzeug;
	}
	public function getFahrzeug(): SCFahrzeug
	{
		return $this->fahrzeug;
	}

	/**
	 * @param SCFahrzeug $fahrzeug
	 */
	public function setFahrzeug(SCFahrzeug $fahrzeug): void
	{
		$this->fahrzeug = $fahrzeug;
	}
}
class FahrzeugProviderService
{

	public function holeEinFahrzeugMitIdEinsUndGibInArray(EntityManagerInterface $entityManager, string $info) :array{
		$fahrzeugsammlung = [];

		$einAuto = $entityManager->getRepository(Auto::class)->findOneBy(['id'=>1]);
		array_push($fahrzeugsammlung,new UmgebendesFahrzeug($einAuto));
		$einFahrrad = $entityManager->getRepository(Fahrrad::class)->findOneBy(['id'=>1]);
		array_push($fahrzeugsammlung,new UmgebendesFahrzeug($einFahrrad));
		$einRoller = $entityManager->getRepository(Roller::class)->findOneBy(['id'=>1]);
		array_push($fahrzeugsammlung,new UmgebendesFahrzeug($einRoller));
		$einEinrad = $entityManager->getRepository(Einrad::class)->findOneBy(['id'=>1]);
		array_push($fahrzeugsammlung,new UmgebendesFahrzeug($einEinrad));
		$einTretauto = $entityManager->getRepository(Tretauto::class)->findOneBy(['id'=>1]);
		array_push($fahrzeugsammlung,new UmgebendesFahrzeug($einTretauto));
		if($info == "normal"){
			$fahrzeugsammlung = $this->sortiereFahrzeugArrayNachOrderRank($fahrzeugsammlung);

		}
		if($info == "usort"){
			$fahrzeugsammlung = $this->sortiereFahrzeugArrayNachOrderRankUsort($fahrzeugsammlung);
		}
		return $fahrzeugsammlung;


	}
	public function sortiereFahrzeugArrayNachOrderRank(array $fahrzeugsammlung):array{
		$neueSortierung = [];
		//Der letzte Platz kann bei voller Nutzung aller Objekte nur maximal der Anzahl aller möglichen Objekte entsprechen
		//Hier gibt es 5 Fahrzeugtypen
		$maximalerSortierWert = 5;
		//Es wird keine 0 Werte geben können udn somit bei der 1 begonnen
		$wertSortierabfrage = 1;

		//Einleiten einer begrenzten For-Schleife
		for($wertSortierabfrage; $wertSortierabfrage<=$maximalerSortierWert; $wertSortierabfrage++){
			//iteriere durch jedes Fahrzeug
			foreach ($fahrzeugsammlung as $fahrzeug){
				//Prüfe ob Fahrzeug orderRank gleich dem aktuellen Stellenwert ist
				if($fahrzeug->getFahrzeug()->getOrderRank() == $wertSortierabfrage){
					//Füge dies nun in die richtige Sortierung ein
					array_push($neueSortierung,$fahrzeug);
				}
			}

		}

		return  $neueSortierung;
	}
	 private function usortOrderRank($fahrzeug1, $fahrzeug2){
		return $fahrzeug1->getFahrzeug()->getOrderRank()<=>$fahrzeug2->getFahrzeug()->getOrderRank();

	}

	public function sortiereFahrzeugArrayNachOrderRankUsort(array $fahrzeugsammlung):array{

		usort($fahrzeugsammlung,[$this,"usortOrderRank"]);

		return  $fahrzeugsammlung;
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
	public  function sortiereSortierteFahrzeugNachStatus(array $fahrzeugsammlungFürStatus):array{
		//Sortierung der Stadien nach Erscheinungszeitpunkt
		$stadien = ['Zurückgewiesen','Angefragt','Eingereicht','Bestätigt'];
		$neueSortierung = [];
		//Itteration durch stadien nach Erscheinungszeitpunkt
		foreach ($stadien as $status){
			//iteriere durch jedes Fahrzeug
			foreach ($fahrzeugsammlungFürStatus as $fahrzeug){
				//Prüfe, ob Status des Fahrzeuges dem aktuellen Status aus Stadien entspricht
				if($fahrzeug->getFahrzeug()->getStatus() == $status){
					//Füge es somit an der richtigen Stelle in ein neues Array
					array_push($neueSortierung,$fahrzeug);
				}

			}
		}
		return $neueSortierung;

	}

}