<?php
include 'C:\xampp\htdocs\integrationf\controller\machineC.php';



$error = "";

// create machine
$machine = null;

// create an instance of the controller
$machineC = new machineC();
if (
  isset($_POST["nom"]) &&
  isset($_POST["prix"]) &&
  isset($_POST["dsp"]) &&
  isset($_POST["imagep"])
) {
  if (
    !empty($_POST["nom"]) &&
    !empty($_POST["prix"]) &&
    !empty($_POST["dsp"]) &&
    !empty($_POST["imagep"])
  ) {
    $machine = new machine(
      $_POST['nom'],
      $_POST['prix'],
      $_POST['dsp'],
      $_POST['imagep']
    );
    $machineC->ajouterproduit($machine);
    header('Location:AfficheListeproduit.php');
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
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
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
          Start Bootstrap
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>

        <body>
          <a href="afficheListeproduit.php">Back to list </a>
          <hr />

          <div id="error">
            <?php echo $error; ?>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Ajouter produit</h4>
                </div>
                <div class="card-body">
                  <div class="form-validation">
                    <form class="form-valide" action="" method="post">
                      <div class="row">
                        <div class="col-xl-6">
                          <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="id">Id
                              <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                              <input type="number" class="form-control" id="id" name="id" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="nom">nom<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="nom" name="nom" onkeypress="return /[a-zA-Z]/i.test(event.key)">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="prix">prix<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                              <input type="number" class="form-control" id="prix" name="prix" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="dsp">disponibilité <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                              <input type="number" class="form-control" id="dsp" name="dsp" oninput="javascript: if (this.value.length > 1) this.value = '';" pattern="[1-2]" maxlength="1" onkeypress="return event.charCode >= 49 && event.charCode <= 50">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="imagep">image produit<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="imagep" name="imagep">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                              <a>
                                <button href="AfficheListeproduit.php" type="submit" class="btn btn-primary">Ajouter</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
    </div>
  </div>
</body>

</html>
</main>