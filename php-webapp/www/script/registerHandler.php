#!/usr/bin/php
<?php
@ob_end_clean();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//to redirect if dircect url used
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../index.html');
    exit;
}

session_start();
include "private/dbconnection.inc.php";
include "dbCon.php";

//get input from register html
$fullname = $_POST["fullname"];
$username = $_POST["username"];
$email = $_POST["email"];
$telpNummer = $_POST["telpNummer"];
$password = password_hash($_POST["password"],PASSWORD_DEFAULT);
$token = bin2hex(openssl_random_pseudo_bytes(32));


//echo ($fullname.$username.$email.$telpNummer.$password);
if(mysqli_query($conn, "INSERT INTO validation (timestamp, fullname, username, email, telpNummer,password, token) VALUES
(CURRENT_TIMESTAMP,'$fullname','$username', '$email', $telpNummer, '$password','$token')")){
    $_SESSION['fullname']= $fullname;
    $_SESSION['token'] = $token;
    //send email verification
    $message = "Hi $fullname! 
    Account created here is the activation link http://localhost/registration/activate.php?token=$token";
    mail($email,'Activation Link TfW 2023', $message, 'From: tmahdi@studenten.hs-bremerhaven.de ');
    include 'simpleHeader.php';
    echo ("<div><h2 class='u-text u-text-default u-title u-text-1'>Verification link sended to your Email(".$email.".)</h2></div>
    <br><br><br><br><br><br><div><h3 class='u-text u-text-default'>Token : ".$token."</h3>
    <a href='../validation.html'>Click here for validation link</a></div>
    </div></section>");
    include 'footer.php';

    ##echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


