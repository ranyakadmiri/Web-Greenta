<?php

include_once 'C:\xampp\htdocs\integrationf\controller\locationC.php';
include 'C:\xampp\htdocs\integrationf\controller\machineC.php';
session_start();

include '../../controller/pannierC.php';
$cart = new Cart;


$error = "";

// create location
$machineC = new machineC();
$listeproduit = $machineC->afficherproduit();
$location = null;

// create an instance of the controller
$locationC = new locationC();

if (
  isset($_POST["id"]) &&
  isset($_POST["id_client"]) &&
  isset($_POST["id_produit"]) &&
  isset($_POST["date_d"]) &&
  isset($_POST["date_f"])
) {
  if (
    !empty($_POST["id"]) &&
    !empty($_POST["id_client"]) &&
    !empty($_POST["id_produit"]) &&
    !empty($_POST["date_d"]) &&
    !empty($_POST["date_f"])
  ) {
    $location = new location(
      $_POST['id'],
      $_POST['id_client'],
      $_POST['id_produit'],
      $_POST['date_d'],
      $_POST['date_f']
    );
    $locationC->ajouterlocation($location);
    header('Location:AfficheListelocation.php');
  } else
    $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
  <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
  <df-messenger chat-title="GreenTa" agent-id="newagent-xbi9" language-code="fr"></df-messenger>


  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Site Metas -->
  <title>ThewayShop - Ecommerce Bootstrap 4 HTML Template</title>
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
                  <a href="../../Viewss/back/login.php"><i class="fa fa-user s_color"></i> My Account</a>
                </li>
                <li>
                  <a href="#"
                    ><i class="fas fa-location-arrow"></i> Our location</a
                  >
                </li>
                <li>
                  <a href="#"><i class="fas fa-headset"></i> Contact Us</a>
                </li>
                <li>
                  <a href="../../Viewss/back/logout.php"><i class='fas fa-sign-out-alt'></i> Deconnexion</a>
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
              <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="../aff_investissement.php">Investissement</a>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Nos produits</a>
              <ul class="dropdown-menu">
                <li><a href="/integrationf/views/frontoffice/vente.php">Mettre en vente</a></li>
                <li><a href="/integrationf/views/frontoffice/shop.php">Parcourir</a></li>
                <li><a href="/integrationf/views/frontoffice/cartview.php">Panier</a></li>

              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../aff_CategInv.php">Catégorie Investissement</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Location.php">Locations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Offres d'emplois</a>
            </li>
            <li class=" nav-item">
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
                  <li><a href="../../Viewss/my-account.php">Mon compte</a></li>
                  
                </ul>
          </ul>
        </div>
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
          <h2>Locations</h2>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Boutique</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End All Title Box -->

  <!-- Start Wishlist  -->
  <div class="wishlist-box-main">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="table-main table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Images</th>
                  <th>Nom du produit</th>
                  <th>Prix/jour</th>
                  <th>Disponibilité</th>
                  <th>Date debut</th>
                  <th>Date fin</th>
                  <th>Email</th>
                  <th>Ajouter un objet</th>
                </tr>
              </thead>

              <tbody>
                <?php
                foreach ($listeproduit as $row) {
                ?>
                  <form method="POST" action="envoyer.php">
                    <tr>
                      <td class="thumbnail-img">
                        <div>
                          <img width=130 height=110 src="./images/<?php echo $row['imagep']; ?> ">
                        </div>
                      </td>
                      <td class="name-pr">
                        <a href="#"> <?php echo $row['nom']; ?> </a>
                      </td>
                      <td class="price-pr">
                        <p><?php echo $row['prix']; ?> TND</p>
                      </td>
                      <td class="quantity-box"><?php echo $row['dsp']; ?></td>
                      <td class="date-debut">
                        <input name="date_d" type="date">
                        <input name="id" type="hidden">
                        <input name="id_client" type="hidden" value="2">
                        <input name="id_produit" type="hidden" value="<?php echo $row['id']; ?>">
                      </td>
                      <td class="date-fin">
                        <input name="date_f" type="date">
                      </td>

                      <td>
                        <input name="email" type="email">
                        <input class="btn hvr-hover" type="submit" value="louer">
                      </td>



                      <td class="add-pr">


                      </td>

                    </tr>

                  </form>
                <?php
                }
                ?>
              </tbody>


            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Wishlist -->

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
              <h3>Temps De Travail</h3>
              <ul class="list-time">
                <li>Lundi - Vendredi: 08.00am à 05.00pm</li>
                <li>Samedi: 10.00am à 08.00pm</li>
                <li>Dimanche: <span>Fermé</span></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="footer-top-box">
              <h3>Newsletter</h3>
              <form class="newsletter-box">
                <div class="form-group">
                  <input class="" type="email" name="Email" placeholder="Adresse Email" />
                  <i class="fa fa-envelope"></i>
                </div>
                <button class="btn hvr-hover" type="submit">Envoyer</button>
              </form>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="footer-top-box">
              <h3>Réseaux sociaux</h3>
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
              <h4>About Greenta</h4>
              <p>
                Nous sommes une entreprise, websters, qui cherche à digitaliser le secteur agriculteur, en facilitant le contact entre le client, l'agriculteur et même l'investisseur. Nous encourageons aussi l'agriculture écologique et proposons plusieurs formations, aide scientifique et même les matériaux.
              </p>
              <p>
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="footer-link">
              <h4>Information</h4>
              <ul>
                <li><a href="#">À Propos De Nous</a></li>
                <li><a href="#">Service Client</a></li>
                <li><a href="#">Notre Plan Du Site</a></li>
                <li><a href="#">Termes &amp; Conditions</a></li>
                <li><a href="#">Politique De Confidentialité</a></li>
                <li><a href="#">Informations De Livraison</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="footer-link-contact">
              <h4>Contactez-nous</h4>
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
  <script src="js/form-validator.min.js"></script>
  <script src="js/contact-form-script.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>