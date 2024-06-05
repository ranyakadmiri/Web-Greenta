<?php
require_once 'C:\xampp\htdocs\integrationf\config.php';
include_once 'C:\xampp\htdocs\integrationf\model\location.php';
class machineC
{

	/////..............................Afficher............................../////
	function afficherproduit()
	{
		$sql = "SELECT * FROM machine";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}

	/////..............................Supprimer............................../////
	function supprimerproduit($id_produit)
	{
		$sql = "DELETE FROM machine WHERE id=:id_produit";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id_produit', $id_produit);   //bind??
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}

	/////..............................Ajouter............................../////
	function ajouterproduit($machine)
	{
		$sql = "INSERT INTO machine
			VALUES (:id, :nom,:prix,:dsp, :imagep)";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute([
				'id' => $machine->getid(),
				'nom' => $machine->getnom(),
				'prix' => $machine->getprix(),
				'dsp' => $machine->getdsp(),
				'imagep' => $machine->getimagep()
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}



	/////..............................Affichage par la cle Primaire............................../////
	function recupererproduit($id_produit)
	{
		$sql = "SELECT * from machine where id=$id_produit";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$machine = $query->fetch();
			return $machine;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	/////..............................Update............................../////
	function modifierproduit($machine, $id)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare('UPDATE machine SET nom = :nom, prix = :prix, dsp = :dsp, imagep = :imagep WHERE id= :id');
			$query->execute([
				'id' => $id,
				'nom' => $machine->getnom(),
				'prix' => $machine->getprix(),
				'dsp' => $machine->getdsp(),
				'imagep' => $machine->getimagep()

			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
}
