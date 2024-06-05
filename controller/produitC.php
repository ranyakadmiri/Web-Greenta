<?php

require_once 'C:\xampp\htdocs\integrationf/config.php';

class produitC
{

    public function listproduits()
    {
        $sql = "SELECT * FROM produits";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function deleteproduits($ide)
    {
        $sql = "DELETE FROM produits WHERE idpr = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addproduit($produit)
    {
        $sql = "INSERT INTO produits
        VALUES (:idpr, :nomp,:prix, :disponibilite , :img,:idca)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idpr' => $produit->getidpr(),
                'prix' => $produit->getprix(),
                'disponibilite' => $produit->getdisponibilite(),
                'nomp' => $produit->getnomp(),
                'img' => $produit->getimg(),
                'idca' => $produit->getidca()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showproduit($id)
    {
        $sql = "SELECT * from  produits where idpr = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $commande = $query->fetch();
            return $commande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateproduit($produit, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produits SET 
                    nomp = :nomp, 
                    prix = :prix, 
                    disponibilite = :disponibilite, 
                    idca=:idca,
                WHERE idpr= :idpr'
            );
            $query->execute([
                'idpr' => $id,
                'prix' => $produit->getprix(),
                'disponibilite' => $produit->getdisponibilite(),
                'nomp' => $produit->getnomp(),
                'idca' => $produit->getidca()

            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showidca()
    {
        $sql = "SELECT idca FROM categories";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $num = $query->fetchAll();
            return $num;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function listcat($idc)
    {
        $sql = "SELECT * FROM produits where idca = $idc";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function rechercherProduit($search)
    {
        $sql = "SELECT * from produits where idpr=$search";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function aff_prod($id)
    {
        $sql = "SELECT * FROM produits WHERE idca = ?";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([$id]);
            $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function tot($id)
    {
        // Effectuer une requête SQL pour récupérer le nombre de produits sous la catégorie sélectionnée
        $sql = "SELECT COUNT(*) FROM produits WHERE idca = :idca";
        $db = config::getConnexion();
        // Préparer la requête SQL
        try {
            $stmt = $db->prepare($sql);
            // Bind des paramètres
            $stmt->bindParam(':idca', $id, PDO::PARAM_INT);
            // Exécuter la requête SQL
            $stmt->execute();
            // Récupérer le nombre total de produits
            $count = $stmt->fetchColumn();
            // Afficher le nombre total de produits
            return $count;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}
