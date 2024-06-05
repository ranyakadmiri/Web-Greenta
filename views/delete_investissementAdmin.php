<?php
include '../controller/investissementC.php';


$investissementC = new investissementc();
$investissementC->delete_investissement($_GET["id"]);
header('Location:aff_investissementAdmin.php');


?>