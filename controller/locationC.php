<?php
require_once 'C:\xampp\htdocs\integrationf\config.php';
include_once 'C:\xampp\htdocs\integrationf\model\location.php';
class locationC
{




	/////..............................Afficher............................../////
	function afficherlocation()
	{
		$sql = "SELECT * FROM location";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}







	/////..............................Supprimer............................../////
	function supprimerlocation($id_location)
	{
		$sql = "DELETE FROM location WHERE id=:id_location";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id_location', $id_location);   //bind??
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}

	/////..............................Affichage par la cle Primaire............................../////
	function recupererlocation($id_location)
	{
		$sql = "SELECT * from location where id=$id_location";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$location = $query->fetch();
			return $location;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}



	/////..............................Ajouter............................../////


	function ajouterlocation($location)
	{
		$sql = "INSERT INTO location 
	VALUES (:id,:id_client,:id_produit, :date_d, :date_f)";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute([
				'id' => $location->getid(),
				'id_client' => $location->getidclient(),
				'id_produit' => $location->getidproduit(),
				'date_d' => $location->getdated(),
				'date_f' => $location->getdatef()
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}

	/////..............................Update............................../////
	function modifierlocation($location, $id)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare('UPDATE location SET id_client = :id_client, id_produit = :id_produit, date_d = :date_d, date_f = :date_f WHERE id= :id');
			$query->execute([
				'id_client' => $location->getidclient(),
				'id_produit' => $location->getidproduit(),
				'date_d' => $location->getdated(),
				'date_f' => $location->getdatef(),
				'id' => $id
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
}
