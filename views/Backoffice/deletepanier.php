<?php
include '../../controller/pannierC.php';
$pannierC = new pannierC();
$pannierC->deletepanniers($_GET["idpa"]);
header('Location:listPanier.php');
