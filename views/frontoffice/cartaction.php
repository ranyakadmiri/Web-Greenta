<?php

session_start();

// initialize shopping cart class
include '../../controller/pannierC.php';
include '../../controller/produitC.php';
include '../../model/produit.php';
$cart = new Cart;
$produit = new ProduitC;

// include database configuration file
if (isset($_REQUEST['action']) && !empty($_REQUEST['action'])) {
    if ($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['idpr'])) {
        $productID = $_REQUEST['idpr'];

        // get product details
        $db = config::getConnexion();
        $q = "SELECT * FROM produits WHERE idpr = " . $productID;
        $query = $db->query($q);
        $row = $query->fetch(PDO::FETCH_ASSOC);


        $itemData = array(
            'idpr' => $row['idpr'],
            'nomp' => $row['nomp'],
            'prix' => $row['prix'],
            'img' =>  $row['img'],
            'quantite' => 1
        );


        $insertItem = $cart->insert($itemData);


        header("Location: cartview.php");
    } elseif ($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['idpr'])) {
        $deleteItem = $cart->remove($_REQUEST['idpr']);
        header("Location: cartview.php");
    } else {
        header("Location: shop.php");
    }
}
