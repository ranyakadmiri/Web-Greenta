<?php

include "../config2.php";
echo $_GET['varname'];

$verifuser = $pdo -> query('SELECT * FROM user WHERE email ="'.$_GET['varname'].'"');
            
$userdata = $verifuser->fetch();

$forgotdate=date('d-m-y H:i:s'); 




$req = $pdo->prepare('UPDATE user SET forgotPassDate= :forgotdate WHERE email = :mail_user ');

             $req->execute(array(
             
                    'forgotdate' => $forgotdate,
                     'mail_user' => $userdata['email']
             
                    ));



$to = "selim03gaaloul@gmail.com";
$subject= "Forget Password";
$message ="Hello ".$userdata['name'].",

Somebody requested a new password for account associated with ".$userdata['email'].".

No changes have been made to your account yet.

You can reset your password by clicking the link below:http://localhost/bonsai/Views/forgotpasslink.php?varname=".$userdata['email']."  

If you did not request a new password, please let us know immediately by replying to this email.

Yours,
Bonsai team";

$headers ="Content-Type: text/plain; charset=utf8\r\n";
$headers .="From:ggselim335@gmail.com\r\n";

if(mail($to,$subject,$message,$headers))
{
    echo 'envoyer !';
    header('location:login.php?varname=mailenvoyer');
}
else
    echo 'erreur envoi';