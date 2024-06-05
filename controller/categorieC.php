<?php

require_once 'C:\xampp\htdocs\integrationf/config.php';

class categorieC
{

    public function listcategories()
    {
        $sql = "SELECT * FROM categories";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletecategorie($ide)
    {
        $sql = "DELETE FROM categories WHERE idca = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addcategorie($categorie)
    {
        $sql = "INSERT INTO categories 
        VALUES (:idca, :nomc)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idca' => $categorie->getidca(),
                'nomc' => $categorie->getnomc()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showcategorie($id)
    {
        $sql = "SELECT * from  categories  where idca = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $categorie = $query->fetch();
            return $categorie;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatecategorie($categorie, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE categories  SET 
                    nomc = :nomc, 
                   
                WHERE idca= :idca'
            );
            $query->execute([
                'idca' => $id,
                'nomc' => $categorie->getnomc()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
