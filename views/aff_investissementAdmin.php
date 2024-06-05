<?php
include '../controller/investissementC.php';

$c = new investissementc();
$tab = $c->aff_inv();


if ($_POST["aff"] == "Tri") {
  $tab = $c->triInvestissement();
} else if ($_POST["aff"] == "Search") {
  $tab = $c->rechercheInvestissement($_POST["rech"]);
} else
  $tab = $c->aff_inv();

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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <a class="nav-link" href="aff_invadmin.php">
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
            <a class="nav-link" href="aff_investissementAdmin.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Investissement
            </a>
            <a class="nav-link" href="aff_CategInvAdmin.php">
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

            <a class="nav-link" href="aff_investissement.php">
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
          Admin locations
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <style>
          body {
            font-family: Arial, sans-serif;
          }

          h1 {
            text-align: center;
          }

          h2 {
            text-align: center;
            margin-bottom: 30px;
          }

          table {
            border-collapse: collapse;
            margin: auto;
            width: 70%;
          }

          th,
          td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
          }

          th {
            background-color: #dcdcdc;
          }

          tr:nth-child(even) {
            background-color: #f2f2f2;
          }

          a {
            text-decoration: none;
            color: blue;


          }


          a:hover {
            text-decoration: underline;
          }
        </style>

        <div style="padding-top=50px;">
          <br><br><br><br>

          <form action="aff_investissementAdmin.php" method="POST">
            <input type="text" name="rech" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" style="height=50px;">
            <center>
              <input type="submit" style="background-color: #007bff;
                    border: none;
                    border-radius: 5px;
                    color: white;
                    display: inline-block;
                    font-size: 16px;
                    padding: 8px 16px;
                    text-align: center;
                    text-decoration: none;
                    transition: background-color 0.3s ease; background-color: green;" name="aff" value="Search" />
            </center>
          </form>
          <form action="aff_investissementAdmin.php" method="POST">
            <center>
              <input type="submit" style="background-color: #007bff;
                border: none;
                border-radius: 5px;
                color: white;
                display: inline-block;
                font-size: 16px;
                padding: 8px 16px;
                text-align: center;
                text-decoration: none;
                transition: background-color 0.3s ease; background-color: green;" name="aff" value="Tri" />
            </center>
          </form>

        </div>
        <center>
          <br><br>
          <h1>List des Investissements</h1>
          <br>

          <br><br>
        </center>
        <table border="1" align="center" width="70%">
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Date</th>
            <th>Catégorie</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>


          <?php
          foreach ($tab as $inv) {
          ?>
            <tr>
              <td><?= $inv['lastName']; ?></td>
              <td><?= $inv['firstName']; ?></td>
              <td><?= $inv['adress']; ?></td>
              <td><?= $inv['dob']; ?></td>
              <td><?= $inv['category']; ?></td>
              <td align="center">
                <form method="POST" action="update_investissementAdmin.php">
                  <input style="      background-color: #007bff;
        border: none;
        border-radius: 5px;
        color: white;
        display: inline-block;
        font-size: 16px;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease; background-color: green;" type="submit" name="update" value="Update">
                  <input type="hidden" value=<?PHP echo $inv['idinv']; ?> name="idinv">
                </form>
              </td>
              <td>
                <a style="      background-color: #007bff;
        border: none;
        border-radius: 5px;
        color: white;
        display: inline-block;
        font-size: 16px;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease; background-color: red;" href="delete_investissementAdmin.php?id=<?php echo $inv['idinv']; ?>">Delete</a>
              </td>
            </tr>
          <?php
          }
          ?>
        </table>
        <br><br>
        <center>
          <h5>
            <a href="add_investissementAdmin.php">Ajouter Investissement</a>
          </h5>
        </center>

        <br><br><br>
        <div class="row" style="position: relative;left:50px;top:-50px;">
          <div class="col-lg-10 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <canvas id="myChart"></canvas>
              </div>
            </div>
          </div>
        </div>

        <!-- Start Footer  -->


        <script>
          var xValues = ["Nombre des Catégories", "Nombre des Catégories sans investissements"];
          var yValues = [<?php echo $c->count_AvecCategoryInv(); ?>, <?php echo $c->count_AvecCategoryInv() - $c->count_Investissement(); ?>];
          var barColors = [
            "#00aba9",
            "#e8c3b9"
          ];

          new Chart("myChart", {
            type: "doughnut",
            data: {
              labels: xValues,
              datasets: [{
                backgroundColor: barColors,
                data: yValues
              }]
            },
            options: {
              title: {
                display: true,
                text: "Catégories-Investissements"
              }
            }
          });
        </script>