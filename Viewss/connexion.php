<?php
//include "../config.php";
session_start();
include "../config2.php";


$mail = $_POST['mail'];
$password = $_POST['pass'];

    
    if(!empty($mail) AND !empty($password)){
       
        $verifuser = $pdo -> query('SELECT * FROM user WHERE email ="'.$mail.'"');
        
        $userdata = $verifuser->fetch();
         echo 'cbon';
         echo ($userdata['name']);

        
        
        
        if(empty($userdata))
        {
            // echo $password_hached;
            // echo "///////";
            // echo $password_hached;
             //header('location:login.php?varname=mdp');
            // echo ('erreur');
        }else{

            echo "jawna behi";
       
            if( password_verify($password,$userdata['password'])){
                echo "password is correct";



                if($userdata['status']==0){
                
                    header('location:back/login.php?varname=blocked');
                   
                 }
                else{

                    if($verifuser -> rowCount() == 1){
                
                        $_SESSION['mail'] = $userdata['email']; 
                        $_SESSION['name'] = $userdata['name'];
                        $_SESSION['role'] = $userdata['role'];
                    
                        if($userdata['role'] == 1)
                        {
                            header('location:./back/admin.php');
                        }else if($userdata['role'] == 2) 
                        {
                            header('<location:./Viewss/my-account.php'); // agriculteur
                        }
                        else if($userdata['role'] == 3) 
                        {
                            header('location:./Viewss/my-account.php'); //investisseur
                        }
                        else if($userdata['role'] == 4) 
                        {
                            header('location:../Viewss/my-account.php'); //livreur
                        }
                        else if($userdata['role'] == 5) 
                        {
                            header('location:./Viewss/my-account.php');//fournisseur
                        }else 
                        {
                           // header('location:../adem/DeliveryMan/Views/deliveryforyou.php'); 
                        }
                        // 0->customer, 1-> admin ,  2->delivaty
                    
                    }
                    else{
                        $return = "identifiant invalide !";
                        header('location:back/login.php?varname=mdp');
                    }
                   
                
               
                }

            
            }
            else{
                $return = "identifiant invalide !";
                header('location:back/login.php?varname=mdp');
            }
        }

    }else $return = "champs manquant !";


    

  $pdo=null;

