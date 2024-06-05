<?php
require_once '../../config.php';
include_once 'C:\xampp\htdocs\yousef\Controller\locationC.php';
include 'C:\xampp\htdocs\integrationf\controller\machineC.php';



if (!isset($_POST['email'])) {
  echo "erreur de ";
}

$location = new location(
  $_POST['id'],
  $_POST['id_client'],
  $_POST['id_produit'],
  $_POST['date_d'],
  $_POST['date_f']
);
$locationC = new locationC();
$locationC->ajouterlocation($location);
// adresse mail du destinataire
$sujet = "Ajout réussi du forum sur votre site"; // sujet du mail
$message = "Je suis ravi de vous informer que nous avons avec succès ajouté un forum à votre site web. Cette nouvelle fonctionnalité permettra à vos utilisateurs de discuter, échanger des idées et partager des informations sur votre site, créant ainsi une communauté en ligne dynamique et engagée.

Nous avons travaillé dur pour assurer que cette fonctionnalité soit facile à utiliser et à administrer, tout en offrant des options de personnalisation pour s'adapter à votre marque et à vos besoins spécifiques.

Nous croyons que cette nouvelle fonctionnalité sera un ajout précieux à votre site web, permettant une meilleure interaction entre les utilisateurs et renforçant l'engagement de votre communauté en ligne.

N'hésitez pas à nous contacter si vous avez des questions ou des préoccupations concernant le forum. Nous sommes là pour vous aider à tout moment.

Cordialement,"; // message qui dira que le destinataire a bien lu votre mail
// maintenant, on crée l'en-tête du mail

mail($_POST['email'], $sujet, $message);



//$forum=new forumC();

//$prod=$forum->Ajouterforum($ser);

header('location:http://localhost/yousef/View/Front/location.php');
