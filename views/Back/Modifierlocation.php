<?php
include_once 'C:\xampp\htdocs\integrationf\model\location.php';
include_once 'C:\xampp\htdocs\integrationf\controller\locationC.php';

$error = "";

// create user
$location = null;

// create an instance of the controller
$locationC = new locationC();
if (
  isset($_POST["id_client"]) &&
  isset($_POST["id_produit"]) &&
  isset($_POST["date_d"]) &&
  isset($_POST["date_f"])
) {
  if (
    !empty($_POST["id_client"]) &&
    !empty($_POST["id_produit"]) &&
    !empty($_POST["date_d"]) &&
    !empty($_POST["date_f"])

  ) {
    $location = new location(
      $_POST['id_client'],
      $_POST['id_produit'],
      $_POST['date_d'],
      $_POST['date_f'],
    );
    $locationC->modifierlocation($location, $_POST["id_location"]);
    header('Location:AfficheListelocation.php');
  } else
    $error = "Missing information";
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
    <a class="navbar-brand ps-3" href="index.html">Admin locations</a>
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

            <div class="sb-sidenav-menu-heading">Interfaces</div>
            <!-- <a class="nav-link" href="listPanier.html">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-chart-area"></i>
                </div>
                Pannier
              </a> -->
            <a class="nav-link" href="../aff_investissementAdmin.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Investissement
            </a>
            <a class="nav-link" href="../aff_CategInvAdmin.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Category Investissement
            </a>
            <div class="sb-sidenav-menu-heading">Produits et Commandes</div>
            <a class="nav-link" href="/integrationf/views/backoffice/listcategorie.php">
              <div class="sb-nav-link-icon">
                <i class="fas fa-chart-area"></i>
              </div>
              Categories Produits
            </a>



            <a class="nav-link" href="/integrationf/views/backoffice/listCommande.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Commandes
            </a>
            <a class="nav-link" href="/integrationf/views/backoffice/listproduit.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Produits
            </a>

            <a class="nav-link" href="../aff_investissement.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Back To Front
            </a>
            <div class="sb-sidenav-menu-heading">Offres </div>

            <!--  mezelt partie nour-->
            <a class="nav-link" href="AfficheListelocation.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Locations
            </a>
            <a class="nav-link" href="AfficheListeproduit.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Produits
            </a>
            <div class="sb-sidenav-menu-heading">Utilisateurs</div>
            <!-- mezelet partie adem-->
            <a class="nav-link" href="../../viewss/back/listuser.php">
                <div  class="far fa-circle-user"><i class="fas fa-table"></i></div>
                &nbsp; User
              </a>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          Admin locations
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>

        <body>
          <button><a href="AfficheListelocation.php">Back to list</a></button>
          <hr />

          <div id="error">
            <?php echo $error; ?>
          </div>
          <?php
          if (isset($_POST['id_location'])) {
            $location = $locationC->recupererlocation($_POST['id_location']);

          ?>
            <form action="" method="POST">
              <table border="1" align="center" width="70%">
                <tr>
                  <td>
                    <label for="id_location">Id Location: </label>
                  </td>
                  <td>
                    <input type="number" name="id_location" id="id_location" value="<?php echo $location['id']; ?>" maxlength="20" />
                  </td>
                </tr>

                <tr>
                  <td>
                    <label for="id_client">Id Client: </label>
                  </td>
                  <td>
                    <input type="number" name="id_client" id="id_client" value="<?php echo $location['id_client']; ?>" maxlength="20" />
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="id_produit">Id Produit: </label>
                  </td>
                  <td>
                    <input type="number" name="id_produit" id="id_produit" value="<?php echo $location['id_produit']; ?>" maxlength="20" />
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="date_d">Date debut: </label>
                  </td>
                  <td>
                    <input type="date" name="date_d" id="date_d" value="<?php echo $location['date_d']; ?>" />
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="date_f">Date fin: </label>
                  </td>
                  <td>
                    <input type="date" name="date_f" id="date_f" value="<?php echo $location['date_f']; ?>" />
                  </td>
                </tr>




                <tr>
                  <td></td>
                  <td>
                    <input type="submit" value="Update" />
                  </td>
                  <td>
                    <input type="reset" value="Reset" />
                  </td>
                </tr>
              </table>
            </form>
          <?php
          }
          ?>
        </body>

</html>
</main>