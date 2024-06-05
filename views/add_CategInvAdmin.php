<?php
include '../controller/categoryInvC.php';


// create agriculteur
$categoryInv = null;

// create an instance of the controller
$categoryInvc = new categoryInvC();

if (
  isset($_POST["nomCateg"]) &&
  isset($_POST["descriptionCateg"])
) {
  if (
    !empty($_POST['nomCateg']) &&
    !empty($_POST["descriptionCateg"])
  ) {
    $categoryInv = new categoryInv(
      null,
      $_POST['nomCateg'],
      $_POST['descriptionCateg']
    );
    $categoryInvc->add_category($categoryInv);
    header('Location:aff_CategInvAdmin.php');
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
            <a class="nav-link" href="../viewss/back/listuser.php">
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
        <form action="" method="POST">
          <table align="center">
            <br>
            <h2 align="center">Ajouter Catégorie</h2>
            <br>
            <div class="form-group">
              <tr>
                <td>
                  <label for="firstName">Nom Catégorie:
                  </label>
                </td>
                <td><input type="text" name="nomCateg" maxlength="20"></td>
              </tr>
            </div>
            <tr>
              <td>
                <label>Description Catégorie:
                </label>
              </td>
              <td>
                <textarea name="descriptionCateg"></textarea>
              </td>
            </tr>

            <tr align="center">
              <td>
                <input style="      background-color: #007bff;
        border: none;
        border-radius: 5px;
        color: white;
        display: inline-block;
        font-size: 16px;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease; background-color: green;" type="submit" value="Save">
              </td>
              <td>
                <input style="      background-color: #007bff;
        border: none;
        border-radius: 5px;
        color: white;
        display: inline-block;
        font-size: 16px;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease; background-color: red;" type="reset" value="Reset">
              </td>
            </tr>
          </table>
        </form>
        <script src="jscodes.js"></script>
</body>