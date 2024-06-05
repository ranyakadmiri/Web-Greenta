<?php

include_once '../config.php';
include '../model/investissement.php';
require_once '../vendor/autoload.php';

class investissementc
{

    public function aff_inv()
    {
        $sql = "SELECT * FROM investissement";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function delete_investissement($ide)
    {
        $sql = "DELETE FROM investissement WHERE idinv = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function add_investissement($investissement)
    {
        $sql = "INSERT INTO investissement 
        VALUES ( NULL,:fn,:ln, :ad,:dob,:category)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $investissement->getFirstName(),
                'ln' => $investissement->getLastName(),
                'ad' => $investissement->getAddress(),
                'dob' => $investissement->getDob()->format('Y/m/d'),
                'category' => $investissement->getcategory()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function show_investissement($id)
    {
        $sql = "SELECT * from investissement where idinv = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $investissement = $query->fetch();
            return $investissement;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function update_inv($investissement, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE investissement SET 
                    firstName = :firstName, 
                    lastName = :lastName, 
                    adress = :adress, 
                    dob = :dob,
                    category = :category
                WHERE idinv= :idinv'
            );
            $query->execute([
                'idinv' => $id,
                'firstName' => $investissement->getFirstName(),
                'lastName' => $investissement->getLastName(),
                'adress' => $investissement->getAddress(),
                'dob' => $investissement->getDob()->format('Y/m/d'),
                'category' => $investissement->getcategory()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    function triInvestissement()
    {
        $sql = "SELECT * FROM investissement order by firstName";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function rechercheInvestissement($rech)
    {
        $sql = "SELECT * FROM investissement where investissement.firstName like '%$rech%' or investissement.lastName like '%$rech%' or investissement.adress like '%$rech%'";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function count_Investissement()
    {

        $sql = "SELECT count(idinv) FROM investissement";
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            $query->execute();
            $inv_number = $query->fetchColumn();
            return $inv_number;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function count_AvecCategoryInv()
    {

        $sql = "SELECT count(idCateg) FROM categoryinv";
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            $query->execute();
            $categinv_number = $query->fetchColumn();
            return $categinv_number;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function sendSMS()
    {
        $accountSid = '';
        $authToken = '';
        $twilioClient = new Twilio\Rest\Client($accountSid, $authToken);

        // Send an SMS
        $twilioClient->messages->create(
            '+21693788620',
            array(
                'from' => '+13184985221',
                'body' => 'Une investissement a été ajoutée'
            )
        );
    }
}
