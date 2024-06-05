<?php

require 'C:\xampp\htdocs\integrationf/config.php';

class commandeC
{

    public function listcommandes()
    {
        $sql = "SELECT * FROM commandes";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletecommandes($ide)
    {
        $sql = "DELETE FROM commandes WHERE idco = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addcommande($commande)
    {
        $sql = "INSERT INTO commandes
        VALUES (:idco, :idclient, :total)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idco' => $commande->getidco(),
                'idclient' => $commande->getidclient(),
                'total' => $commande->gettot()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showcommande($id)
    {
        $sql = "SELECT * from commandes  where idco = $id";
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

    function updatecommande($commande, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commandes  SET 
                    idclient = :idclient, 
                  total = :total
                  
                WHERE idco= :idco'
            );
            $query->execute([
                'idco' => $id,
                'idclient' => $commande->getclient(),
                'itotal' => $commande->gettot()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showidcl()
    {
        $sql = "SELECT idclient FROM clients";
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
}
