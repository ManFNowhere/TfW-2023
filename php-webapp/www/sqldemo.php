<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../private/dbconnection.inc.php";

$conn = mysqli_connect("p:".$servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "select * from demo";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
  echo $row['id']." ".$row['name']."\n";
}

mysqli_close($conn);
