<?php

include "../../config.php";


if(isset($_GET['mail']))
{

    $mail = $_GET['mail'];

    if(!empty($mail))
    {
        $verifuser = $pdo -> query('SELECT * FROM user WHERE email ="'.$mail.'"');
            
        $userdata = $verifuser->fetch();
        if(!empty($userdata)){

            header('location:envoiMail.php?varname='.$mail.'');





        }else echo"compte nexiste pas!";
    }
}




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgotpass</title>
    <link href="css/forgotpass.css" rel="stylesheet">

</head>
<body>
    
    <div class="right_box ">

        <div class="title">
            <h2 >Forgot Password</h2>
            <p>Enter your email address below and we'll send you an email with <br> instructions on how to change your password</p>
        </div>
        


        <form action="" method="get">
            

            <label for=""> Mail  </label>
            <input type="mail" name="mail" placeholder="Enter mail" id="mail" required>
           
           

            <button class="btn " type="submit" >
                Send
             </button>

             <a class="link" href="login.php"><p>Already an account? Sign in</p></a>
             
        </form>

    </div>

    <div class="left_box ">
        <video loop autoplay muted id="vid">
            <source src="img/bg.mp4" type="video/mp4"  >
            <source src="img/bg.mp4" type="video/ogg">
            Your browser does not support the video tag.
         </video>
    </div>
</body>
</html>