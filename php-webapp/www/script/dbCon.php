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
// Try and connect using the info above.
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
