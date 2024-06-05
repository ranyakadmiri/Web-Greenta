<?php
include '../../controller/produitC.php';
$produitC = new produitC();
$produitC->deleteproduits($_GET["idpr"]);
header('Location:listproduit.php');
