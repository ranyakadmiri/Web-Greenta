<?php
include 'C:\xampp\htdocs\integrationf\controller\machineC.php';
$machineC = new machineC();
$machineC->supprimerproduit($_GET["id_produit"]);
header('Location:AfficheListeproduit.php');
