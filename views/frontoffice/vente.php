<?php

include '../../controller/produitC.php';
include '../../model/produit.php';
include '../../controller/categorieC.php';
include '../../model/categorie.php';

session_start();

include '../../controller/pannierC.php';
$cart = new Cart;

$c1 = new categorieC();


$tab1 = $c1->listcategories();

$error = "";

// create commande
$produit = null;

// create an instance of the controller
$produitC = new produitC();

// create commande
$categorie = null;

// create an instance of the controller
$categorieC = new categorieC();

$tab = $produitC->showidca();
$db = config::getConnexion();
$query = "SELECT * from categories ORDER BY nomc DESC;";
$statement = $db->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

if (
    //isset($_POST["idpa"]) &&
    isset($_POST["nomp"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["disponibilite"]) &&
    isset($_POST["img"]) &&
    isset($_POST["idca"])


) {
    if (
        //!empty($_POST['idpa']) &&
        !empty($_POST["nomp"]) &&
        !empty($_POST["prix"]) &&
        !empty($_POST["disponibilite"]) &&
        !empty($_POST["img"]) &&
        !empty($_POST["idca"])

    ) {
        $idca = intval($_POST['idca']);
        $produit = new produit(
            null,
            //$_POST['idpa'],
            $_POST['nomp'],
            $_POST['prix'],
            $_POST['disponibilite'],
            $_POST['img'],
            $_POST['idca']
        );
        $produitC->addproduit($produit);

        header('Location:shop.php');
    } else
        $error = "Missing information";
}

if (
    //isset($_POST["idca"]) &&
    isset($_POST["nomc"])

) {
    if (
        //!empty($_POST['idca']) &&
        !empty($_POST["nomc"])

    ) {
        $categorie = new categorie(
            null,
            //$_POST['idca'],
            $_POST['nomc']

        );
        $categorieC->addcategorie($categorie);
        header('Location:vente.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!DOCTYPE html>
    <html lang="en">
    <!-- Basic -->

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Site Metas -->
        <title>Freshshop - Ecommerce Bootstrap 4 HTML Template</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <!-- Site Icons -->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <!-- Site CSS -->
        <link rel="stylesheet" href="css/style.css" />
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css" />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/custom.css" />

        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="custom-select-box">
              <select
                id="basic"
                class="selectpicker show-tick form-control"
                data-placeholder="$ USD"
              >
                <option>¥ JPY</option>
                <option>$ USD</option>
                <option>€ EUR</option>
              </select>
            </div>
            <div class="right-phone-box">
              <p>Call US :- <a href="#"> +11 900 800 100</a></p>
            </div>
            <div class="our-link">
              <ul>
                <li>
                  <a href="../Viewss/back/login.php"><i class="fa fa-user s_color"></i> My Account</a>
                </li>
                <li>
                  <a href="#"
                    ><i class="fas fa-location-arrow"></i> Our location</a
                  >
                </li>
                <li>
                  <a href="contact-us.html"><i class="fas fa-headset"></i> Contact Us</a>
                </li>
                <li>
                  <a href="../Viewss/back/logout.php"><i class='fas fa-sign-out-alt'></i> Deconnexion</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            
            <div class="text-slid-box">
              <div id="offer-box" class="carouselTicker">
                <ul class="offer-box">
                  <li>
                    <i class="fab fa-opencart"></i> 20% off Entire Purchase
                    Promo code: offT80
                  </li>
                  <li>
                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                  </li>
                  <li>
                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                  </li>
                  <li><i class="fab fa-opencart"></i> Off 50%! Shop Now</li>
                  <li>
                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                  </li>
                  <li>
                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                  </li>
                  <li>
                    <i class="fab fa-opencart"></i> 20% off Entire Purchase
                    Promo code: offT30
                  </li>
                  <li><i class="fab fa-opencart"></i> Off 50%! Shop Now</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html" style="color: #77b81e"><img src="images/logo.jpg" class="logo" alt="" />GreenTa</a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="../aff_investissement.php">Investissement</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Nos produits</a>
                            <ul class="dropdown-menu">
                                <li><a href="vente.php">Mettre en vente</a></li>
                                <li><a href="shop.php">Parcourir</a></li>
                                <li><a href="cartview.php">Panier</a></li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../aff_CategInv.php">Catégorie Investissement</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="/integrationf/views/Front/Location.php">Locations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Offres d'emplois</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../aff_investissementAdmin.php">Panel</a>
                        </li>
                        <li class="dropdown">
                <a
                  href="#"
                  class="nav-link dropdown-toggle arrow"
                  data-toggle="dropdown"
                  >Compte</a
                >
                <ul class="dropdown-menu">
                  <li><a href="../Viewss/my-account.php">Mon compte</a></li>
                  
                </ul>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search">
                            <a href="#"><i class="fa fa-search"></i></a>
                        </li>
                        <li class="side-menu">
                            <a href="#">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="badge">3</span>
                                <p>Mon Panier</p>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->

            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <?php
                    if ($cart->total_items() > 0) {
                        //get cart items from session
                        $cartItems = $cart->contents();

                        foreach ($cartItems as $item) {
                    ?>
                            <ul class="cart-list">

                                <li>
                                    <a href="#" class="photo"><img src="images/<?= $item['img']; ?>" class="cart-thumb" alt="" /></a>
                                    <h6><a href="#"><?php echo $item["nomp"]; ?></a></h6>
                                    <p>1x - <span class="price"><?php echo $item["prix"] . ' DT'; ?></span></p>
                                </li> <?php }
                                } else { ?>

                            <p>Le Panier Est Vide.....</p>

                        <?php } ?>

                        <li class="total">
                            <?php if ($cart->total_items() > 0) { ?>
                                <a href="cartview.php" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                                <span class="float-right"><strong>Total : </strong><?php echo $cart->total() . ' DT'; ?></span>
                        </li> <?php } ?>
                            </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search" />
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <div id="error">
        <?php echo $error; ?>
    </div>
    <style>
        body {

            font-family: Arial, sans-serif;
        }

        form {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: nomk;
            font-weight: bold;
            margin-bottom: 5px;
            color: black;
        }

        input[poids="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            color: black;
        }

        input[poids="submit"],
        input[poids="reset"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[poids="submit"]:hover,
        input[poids="reset"]:hover {
            background-color: #2E8B57;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>

    <form class="needs-validation" action="" method="POST" onsubmit="return verif();">

        <div class="row">
            <div class="col-md-6 mb-3">

                <label for="nomp">Nom du produit:
                </label>

                <input class="form-control" type="text" name="nomp" id="nomp" maxlength="20">
            </div>
            <div class="col-md-6 mb-3">
                <label for="prix">prix:
                </label>

                <input class="form-control" type="float" name="prix" id="prix" maxlength="20">
            </div>
        </div>
        <div class="mb-3">
            <label for="disponibilite">quantité en stock :
            </label>

            <input class="form-control" type="int" name="disponibilite" id="disponibilite">
        </div>
        <div class="mb-3">
            <td>image du produit:</td>
            <td><input type="file" name="img"></td>
        </div>
        <div class="mb-3">
            <td>
                <label for="idca">N°categorie
                </label>
            </td>
            <td>
                <select name="idca" id="idca">

                    <option value="">Sélectionner</option>
                    <?php
                    foreach ($result as $row) : ?>
                        <option value="<?php echo $row['idca']; ?>"><?php echo $row['nomc']; ?></option>;

                    <?php endforeach; ?>
                </select>

            </td>
        </div>

        <div class="col-12 d-flex shopping-box">
            <td>
                <input onclick="verif()" type="submit" value="Save" class="ml-auto btn hvr-hover">
            </td>
            <td>
                <input type="reset" value="Reset" class="ml-auto btn hvr-hover">
            </td>
        </div>

        </table>
    </form>
    <script src="jscodes.js"></script>


    <div class="filter-sidebar-left">
        <div class="title-left">
            <h3>Categories</h3>
        </div>
        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
            <?php foreach ($tab1 as $categorie) { ?> <div class="list-group-collapse sub-men">


                    <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1"><?= $categorie['nomc'] . ' ' . $categorie['idca'] ?>
                    </a>

                </div>
            <?php } ?>


            <div class="price-box-slider">
                <form action="" method="POST">

                    <div class="form-group">
                        <tr>
                            <td>
                                <label for="nomc">Nom de la categorie:
                                </label>
                            </td>
                            <td><input type="text" name="nomc" id="nomc" maxlength="20"></td>
                        </tr>

                </form>
                <p>

                    <button class="btn hvr-hover" type="submit">
                        Ajouter
                    </button>
                </p>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>



    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->

    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Business Time</h3>
                            <ul class="list-time">
                                <li>Monday - Friday: 08.00am to 05.00pm</li>
                                <li>Saturday: 10.00am to 08.00pm</li>
                                <li>Sunday: <span>Closed</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Newsletter</h3>
                            <form class="newsletter-box">
                                <div class="form-group">
                                    <input class="" type="email" name="Email" placeholder="Email Address*" />
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <button class="btn hvr-hover" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Social Media</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <ul>
                                <li>
                                    <a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About Freshshop</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p>
                                        <i class="fas fa-map-marker-alt"></i>Address: Michael I.
                                        Days 3756 <br />Preston Street Wichita,<br />
                                        KS 67213
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fas fa-phone-square"></i>Phone:
                                        <a href="tel:+1-888705770">+1-888 705 770</a>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fas fa-envelope"></i>Email:
                                        <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">
            All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a>
        </p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>