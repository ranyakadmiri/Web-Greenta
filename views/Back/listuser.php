<?php
session_start();

if(empty( $_SESSION['name']))
{
    header('location:login.php');
}



if(!isset( $_SESSION['mail'], $_SESSION['name'],$_SESSION['role'] )){
   // header('location:databaseconnect.php');
}

    
    $email = $_SESSION['mail'];
    $name = $_SESSION['name'];
    
   
    $role = $_SESSION['role'];

    echo ($name);



    include "../../config.php";


    $verifuser = $pdo -> query('SELECT * FROM user');
        
        $userdata = $verifuser->fetchall();
        // echo 'cbon';
        //echo ($userdata['name']);


?>













<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link
      href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css"
      rel="stylesheet"
    />
    <link href="css/styles.css" rel="stylesheet" />
    <script
      src="https://use.fontawesome.com/releases/v6.1.0/js/all.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
      <!-- Sidebar Toggle-->
      <button
        class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0"
        id="sidebarToggle"
        href="#!"
      >
        <i class="fas fa-bars"></i>
      </button>
      <!-- Navbar Search-->
      <form
        class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"
      >
        <div class="input-group">
          <input
            class="form-control"
            type="text"
            placeholder="Search for..."
            aria-label="Search for..."
            aria-describedby="btnNavbarSearch"
          />
          <button class="btn btn-primary" id="btnNavbarSearch" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </form>
      <!-- Navbar-->
      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            id="navbarDropdown"
            href="#"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            ><i class="fas fa-user fa-fw"></i
          ></a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdown"
          >
            <li><a class="dropdown-item" href="#!">Settings</a></li>
            <!-- <li><a class="dropdown-item" href="#!">Activity Log</a></li> -->
            
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
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
              <a class="nav-link" href="admin.php">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-tachometer-alt"></i>
                </div>
                Dashboard
              </a>

              <div class="sb-sidenav-menu-heading">Interfaces</div>
              </a>
              <a class="nav-link" href="listuser.php">
                <div  class="far fa-circle-user"><i class="fas fa-table"></i></div>
                &nbsp; User
              </a>
              <a class="nav-link" href="listPanier.html">
                <div class="sb-nav-link-icon">
                  <i class="fas fa-chart-area"></i>
                </div>
                Pannier
              </a>
              <a class="nav-link" href="listCommande.html">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Commandes
              <a class="nav-link" href="listproduit.html">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Produits
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
            <h1>List of Users</h1>
            <!-- <h2>
              <a href="addproduit.html">Add user</a>
            </h2> -->
          </center>
          <table border="1" align="center" width="80%" >
            <tr height="50px">
              <th>id_</th>
              <th>nom</th>
              <th>email</th>
              <th>Adresse</th>
              <th>Numero</th>

              <th>Role</th>
              <th>Modifier</th>
              <th>Supprimer</th>
              <th>Status</th>
            </tr>

            <!-- <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>

              <td align="center">
                <form method="POST" action="updateproduit.html">
                  <input type="submit" name="update" value="Update" />
                </form>
              </td>
              <td>
                <input type="submit" name="delete" value="delete" />
              </td>
            </tr> -->
            <tr>
            <?php 
         
                                                    $nb_data = count($userdata);
                                                    for($i = 0; $i < $nb_data; $i++)
                                                    {
                                                        // Te donne le login :
                                                        if( $userdata[$i]['role']==1){
                                                            $role = 'admin';
                                                        }
                                                        if( $userdata[$i]['role']==2){
                                                            $role = 'Agriculteur';
                                                        }
                                                        if( $userdata[$i]['role']==3){
                                                            $role = 'Investisseur';
                                                        }
                                                        if( $userdata[$i]['role']==4){
                                                            $role = 'Livreur';
                                                        }

                                                        if( $userdata[$i]['role']==5){
                                                            $role = 'Fournisseur';
                                                        }


                                                        echo "<tr>
                                                        <td><strong>". $userdata[$i]['idUser']."</strong></td>
                                                        <td>". $userdata[$i]['name']."</td>
                                                        <td>". $userdata[$i]['email']."</td>
                                                        <td>". $userdata[$i]['adress']."</td>
                                                        <td>". $userdata[$i]['phoneNumber']."</td>
                                                        <td>". $role ."</td>
                                                         


                                                        
                                                        <td><a href=midifyuser.php?varname=".$userdata[$i]['email']." >Modify</a></td>
                                                          <td><a href=deleteuser.php?varname=".$userdata[$i]['email']." style='color:red;' >Delete</a></td>  
                                                       
                                                        ";
                                                        
                                                       if($userdata[$i]['status']==0){
                                                        echo " <td> <a href='status_change.php?varid=". $userdata[$i]['idUser']."'><button  style='border:0px;'><span class='badge light badge-danger' id='status_badge' style='color:red;'>Blocked</span></button></a></td>";
                                                     }
                                                     if($userdata[$i]['status']==1){
                                                        echo " <td> <a href='status_change.php?varid=". $userdata[$i]['idUser']."'><button  style='border:0px;'><span class='badge light badge-success' id='status_badge' style='color:green;'>Open</span></button></a></td>";
                                                     }

                                                     echo "</tr>";

                                                    }
                                                
                                                 ?>
          </table>
        </main>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/scripts.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"
      crossorigin="anonymous"
    ></script>
    <script src="js/datatables-simple-demo.js"></script>
  </body>
</html>
