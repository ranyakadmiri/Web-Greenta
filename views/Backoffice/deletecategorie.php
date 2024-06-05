<?php
include '../../controller/categorieC.php';
$categorieC = new categorieC();
$categorieC->deletecategorie($_GET["idca"]);
header('Location:listcategorie.php');
