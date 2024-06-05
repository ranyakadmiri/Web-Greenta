<?php
include "../config.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signin</title>
    <link href="css/monsingin.css" rel="stylesheet">

</head>
<body>
    
    <div class="right_box ">

        <div class="title">
            <h2 >Hello There</h2>
            <p>Sign up to continue</p>
        </div>
        


        <form id="form" action="adduser.php" method="get">
            <label for=""> Name  </label>
            <input type="text" name="name" placeholder="Enter Name" required>
            
            <label for=""> Last Name  </label>
            <input type="text" name="lastname" placeholder="Enter lastName" required>

            <label for=""> Mail  </label>
            <input type="mail" name="mail" placeholder="Enter mail" required>


            <table  >
                <tr id="error">

                </tr>
                <tr>
                    <th><h5>homme</h5></th>
                <th> <input class="sexein" type="checkbox" name="sexe" id="myCheck1" value="men" ></th>
                </th>
                
                 <th> <h5>femme</h5> </th> 
                 <th> <input class="sexein"  type="checkbox" name="sexe" id="myCheck2" value="women" ></th>
                
            </table>
           
            
            
       
            <label for=""> Number <p id="addnumber"></p> </label>
            <input type="number" name="number" placeholder="Enter Number" id="idnumber" required>
            
            <label for=""> Adress  </label>
            <input type="text" name="address" placeholder="Enter Address" required>

            <label for="" > Password <p id="addpass"></p>  </label>
            <input type="password" name="pass" placeholder="Enter Password" id="pass" required>

            
            <input type="password" name="cpass" placeholder="Confirm Password" id="cpass" required>

            <button class="btn " type="submit" >
                SIGN UP
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
    <script src="../Controller/js/signup.js" type="text/javascript"></script>;
</body>
</html>