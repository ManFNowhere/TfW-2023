#!/usr/bin/php
<?php
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

// Try and connect using the info above.
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//get input from register html
$fullname = $_POST["fullname"];
$username = $_POST["username"];
$email = $_POST["email"];
$telpNummer = $_POST["telpNummer"];
$password = password_hash($_POST["password"],PASSWORD_DEFAULT);


//echo ($fullname.$username.$email.$telpNummer.$password);
if(mysqli_query($conn, "INSERT INTO demo (fullname, username, email, telpNummer,password) VALUES
('$fullname','$username', '$email', $telpNummer, '$password')")){
    $_SESSION['fullname']= $fullname;
    header("Location:user.php");
    exit;
    ##echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
session_destroy();
