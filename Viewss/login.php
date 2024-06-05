












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="css/monlogin.css" rel="stylesheet">
    
</head>
<body>
    
    <div class="right_box ">

        <div class="title">
            <h2 >Welcome Back</h2>
            <p>Sign in to continue</p>
        </div>
        


        <form action="connexion.php" method="POST">
            

            <label for=""> Mail  </label>
            <input type="mail" name="mail" placeholder="Enter mail" required>
           
            

            <label for=""> Password  </label>
            <input type="password" name="pass" placeholder="Enter Password" required>

            
           
          
            <button class="btn " type="submit" >
                SIGN IN
             </button>

             <a class="link" href="forgotpass.php"><p>Forgot your password?</p></a>
             <a class="link2" href="signup.php"><p>Don't have an account? Sign up </p> <p id="ken" class=""></p> </a>
             <a class="link3" href="index.html"><p>Go Home</p></a>
             
        </form>
        

    </div>

    <div class="left_box ">
        <video loop autoplay muted id="vid">
            <source src="img/bg.mp4" type="video/mp4"  >
            <source src="img/bg.mp4" type="video/ogg">
            Your browser does not support the video tag.
         </video>
    </div>
    <script src="login.js"></script>
</body>

</html>


<?php

if(isset($_POST['varname']))
{

    $status = $_POST['varname'];

if(!empty($status))
{
    if($status == 'blocked')
    {
        echo "<script >blockerror();</script>";

    }
    if($status=='mdp')
    {
        echo "<script>passerror();</script>";

    }
    if($status=='mailenvoyer')
    {
        echo "<script>mailsent();</script>";

    }
}
}






?>