<?php

include '../../controller/produitC.php';
include '../../model/produit.php';
$error = "";

// create commande
$produit = null;

// create an instance of the controller
$produitC = new produitC();
$tab = $produitC->showidca();
if (
  isset($_POST["idpr"]) &&
  isset($_POST["nomp"]) &&
  isset($_POST["prix"]) &&
  isset($_POST["disponibilite"]) &&
  isset($_POST["img"]) &&
  isset($_POST["idca"])

) {
  if (
    !empty($_POST['idpr']) &&
    !empty($_POST["nomp"]) &&
    !empty($_POST["prix"]) &&
    !empty($_POST["disponibilite"]) &&
    !empty($_POST["img"]) &&
    !empty($_POST["idca"])

  ) {
    $produit = new produit(

      $_POST['idpr'],
      $_POST['nomp'],
      $_POST['prix'],
      $_POST['disponibilite'],
      $_POST['img'],
      $_POST['idca']

    );
    $produitC->updateproduit($produit, $_POST['idpr']);
    header('Location:listproduit.php');
  }
}
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard - SB Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
      <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="button">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#!">Settings</a></li>
          <li><a class="dropdown-item" href="#!">Activity Log</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="#!">Logout</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="index.html">
              <div class="sb-nav-link-icon">
                <i class="fas fa-tachometer-alt"></i>
              </div>
              Dashboard
            </a>

            <div class="sb-sidenav-menu-heading">Investissement</div>
            <a class="nav-link" href="../aff_investissementAdmin.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Investissement
            </a>
            <a class="nav-link" href="../aff_CategInvAdmin.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Category Investissement
            </a>
            <div class="sb-sidenav-menu-heading">Produits et Commandes</div>
            <a class="nav-link" href="listcategorie.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-chart-area"></i>
              </div>
              Categories Produits
            </a>



            <a class="nav-link" href="listCommande.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Commandes
            </a>
            <a class="nav-link" href="listproduit.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Produits
            </a>
            <a class="nav-link" href="../aff_investissement.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Back To Front
            </a>
            <div class="sb-sidenav-menu-heading">Offres </div>

            <!--  mezelt partie nour-->

            <div class="sb-sidenav-menu-heading">Locations</div>
            <a class="nav-link" href="/integrationf/views/Back/AfficheListelocation.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Locations
            </a>
            <a class="nav-link" href="/integrationf/views/Back/AfficheListeproduit.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Machines
            </a>
            <div class="sb-sidenav-menu-heading">Utilisateurs</div>
            <!-- mezelet partie adem-->

          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          Start Bootstrap
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>

        <body>
          <button><a href="listproduit.php">Back to list</a></button>
          <hr />

          <div id="error"></div>
          <?php
          if (isset($_POST['idpr'])) {
            $produit = $produitC->showproduit($_POST['idpr']);

          ?>


            <form action="" method="POST">
              <table border="1" align="center">
                <tr>
                  <td>
                    <label for="idpr">idpr: </label>
                  </td>
                  <td>
                    <input type="int" name="idpr" id="idpr" value="<?php echo $produit['idpr']; ?>" maxlength="20" />
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="nomp">nomp: </label>
                  </td>
                  <td><input type="text" name="nomp" id="nomp" value="<?php echo $produit['nomp']; ?>" maxlength="20" /></td>
                </tr>
                <tr>
                  <td>
                    <label for="prix">prix: </label>
                  </td>
                  <td>
                    <input type="float" name="prix" id="prix" value="<?php echo $produit['prix']; ?>" />
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="disponibilite">disponibilite: </label>
                  </td>
                  <td>
                    <input type="int" name="disponibilite" id="disponibilite" value="<?php echo $produit['disponibilite']; ?>" />
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="img">image: </label>
                  </td>
                  <td>
                    <input type="file" name="img" id="img" value="<?php echo $produit['img']; ?>" />
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="idca">N°categorie
                    </label>
                  </td>
                  <td>
                    <select name="idca" id="<?php echo $row['nomc']; ?>" value="<?php echo $row['idca']; ?>">

                      <?php
                      foreach ($tab as $categorie) {
                        echo ('<option value="' . $categorie['idca'] . '"> ' . $categorie['idca'] . '</option>');
                      }
                      ?>
                    </select>

                  </td>
                </tr>

                <tr>
                  <td></td>
                  <td>
                    <input type="submit" value="Update">
                  </td>
                  <td>
                    <input type="reset" value="Reset">
                  </td>
                </tr>

              </table>
            </form> <?php
                  }
                    ?>
        </body>

</html>
</main>