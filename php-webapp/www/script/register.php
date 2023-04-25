#!/usr/bin/php
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "private/dbconnection.inc.php";

// Try and connect using the info above.
$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//get input from register html
$fullname = $_POST["fullname"];
$username = $_POST["username"];
$email = $_POST["email"];
$telpNummer = $_POST["telpNummer"];
$password = $_POST["password"];

//echo ($fullname.$username.$email.$telpNummer.$password);
if(mysqli_query($conn, "INSERT INTO demo (fullname, username, email, telpNummer,password) VALUES
('$fullname','$username', '$email', $telpNummer, '$password')")){
    echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);