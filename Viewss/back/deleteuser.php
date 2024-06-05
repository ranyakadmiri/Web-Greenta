<?php
session_start();
include "../../config2.php";

$id = $_GET['varname'];



try{
    $verifuser = $pdo -> query('DELETE FROM user WHERE email ="'.$id.'"');
    
    
    header('location:listuser.php');

   
}catch(PDOException $e){
    $e->getMessage();
}

$pdo = null;
?>

