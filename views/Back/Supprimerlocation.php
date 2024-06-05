<?php
include 'C:\xampp\htdocs\integrationf\controller\locationC.php';
$locationC = new locationC();
$locationC->supprimerlocation($_GET["id_location"]);
header('Location:AfficheListelocation.php');
