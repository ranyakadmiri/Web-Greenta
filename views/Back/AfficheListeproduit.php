<?php
include 'C:\xampp\htdocs\integrationf\controller\machineC.php';


$machineC = new machineC();
$listeproduit = $machineC->afficherproduit();
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
        <center>
          <h1>Liste des Produits</h1>
          <h2>
            <a href="Ajouterproduit.php">Ajouter Produit</a><br>
            <a href="stat.php">statistique</a>

          </h2>
        </center>
        <table border="1" align="center" width="70%">
          <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>prix</th>
            <th>disponibilité</th>
            <th>image produit</th>
          </tr>
          <?php
          foreach ($listeproduit as $machine) {
          ?>
            <tr>
              <td><?php echo $machine['id']; ?></td>
              <td><?php echo $machine['nom']; ?></td>
              <td><?php echo $machine['prix']; ?></td>
              <td><?php echo $machine['dsp']; ?></td>
              <td><?php echo $machine['imagep']; ?></td>

              <td align="center">
                <form method="POST" action="Modifierproduit.php">
                  <input type="submit" name="update" value="Update" />
                  <input type="hidden" value="<?php echo $machine['id']; ?>" name="id_produit">
                </form>
              </td>
              <td>
                <a href="Supprimerproduit.php?id_produit=<?php echo $machine['id']; ?>">Supprimer</a>
              </td>
            </tr>
          <?php
          }
          ?>
        </table>
        <button class="btn btn-primary" onclick="print('AfficheListeproduit.php')">Imprimer le PDF</button>
    </div>
    <script>
      function print(pdf) {
        // Créer un IFrame.
        const btn = document.createElement("button");
        var iframe = document.createElement('iframe');
        // Cacher le IFrame.    
        // iframe.style.visibility = "hidden"; 
        // Définir la source.    
        iframe.src = pdf;
        // Ajouter le IFrame sur la page Web.   
        pdf.innerHTML = "tessssssssssssssssssssssst"
        iframe.innerHTML = "Hello Button";
        //document.body.appendChild(btn);
        document.body.appendChild(iframe);
        iframe.contentWindow.focus();
        iframe.contentWindow.print(); // Imprimer.
      }
    </script>
    </main>
  </div>
  </div>
</body>

</html>