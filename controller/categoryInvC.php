<?php

include_once '../config.php';
include '../model/categoryInv.php';

class categoryInvC
{

    public function aff_category()
    {
        $sql = "SELECT * FROM categoryinv";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function delete_category($idc)
    {
        $sql = "DELETE FROM categoryinv WHERE idCateg = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $idc);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function add_category($category)
    {
        $sql="INSERT INTO categoryinv (nomCateg, descriptionCateg) 
        VALUES (:nomCateg, :descriptionCateg)";
        $db = new config();
        $conn=$db->getConnexion();
        try{
            $query = $conn->prepare($sql);
            $query->execute([
           'nomCateg' => $category->getnomCateg(),
           'descriptionCateg' => $category->getdescriptionCateg()
       ]);			
       }
       catch (Exception $e){
       echo 'Erreur: '.$e->getMessage();
       }
    }


    function show_category($id)
    {
        $sql = "SELECT * from categoryinv where idCateg = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $category = $query->fetch();
            return $category;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function update_category($category, $id)
    {
        try {
            
            $conn = new config();
            $db=$conn->getConnexion();
            $query = $db->prepare(
                "UPDATE categoryinv SET 
                    nomCateg = :nomCateg,
                    descriptionCateg = :descriptionCateg
                    WHERE idCateg = :idCateg"
            );
            $query->execute([
                'nomCateg' => $category->getnomCateg(),
                'descriptionCateg' => $category->getdescriptionCateg(),
                'idCateg' => $id
            ]);
            echo $query->execute;
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


}
