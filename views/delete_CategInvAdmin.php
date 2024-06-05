<?php
include '../controller/categoryInvC.php';


$categoryInvC = new categoryInvc();
$categoryInvC->delete_category($_GET["id"]);
header('Location:aff_CategInvAdmin.php');


?>