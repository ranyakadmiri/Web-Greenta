<?php
session_start();


if(!isset( $_SESSION['mail'], $_SESSION['name'],$_SESSION['role'] )){
	header('location:login.php');
}

    
    $email = $_SESSION['mail'];
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];

    

    include "../../config2.php";
   // include "../Controller/cuser.php";
    $varid=$_GET['varid'];
    $verifuser = $pdo -> query("SELECT * FROM user where idUser=$varid");
    
    $userdata = $verifuser->fetch();
    // $var_value = $_GET['data'];
    // echo $userdata['name'];

    $id=$userdata['idUser'];
    $name2 = $userdata['name'];
    $lastName = $userdata['lastName'];
    $sexe = $userdata['sexe'];
    $mail = $userdata['email'];
    $number = $userdata['phoneNumber'];
    $adress = $userdata['adress'];
    $password = $userdata['password'];
    $role2 = $userdata['role'];
    $status = $userdata['status'];
    
    if($status==1){
        $status=0;
    }
    else{
        $status=1;
    }


    echo $name,$lastName,$sexe,$mail;



    $verifuser2 = $pdo -> query("  UPDATE user SET status =$status  WHERE idUser=$varid");
  
if($verifuser2)
{
    header('location:listuser.php');
}



    // create an instance of the controller
        // $cuser = new cuser();

        // $user = new user($id, $lastName, $name2, $adress,$number,$sexe,$mail,$role2,$password,$status);
        
        // $cuser->updateUser($user, $id);
      
