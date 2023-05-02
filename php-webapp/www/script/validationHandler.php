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


$sqlVal = "SELECT fullname, username, email, telpNummer, password FROM validation WHERE token = ?";
$key = $_POST['validationKey'];

if ($result = $conn->prepare($sqlVal)){
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $result->bind_param('s', $_POST['validationKey']);
    $result->execute();
    $result->store_result();

    if ($result-> num_rows > 0){
        $result->bind_result($fullname, $username, $email, $telpNummer, $password);
        $result->fetch();
        if(mysqli_query($conn, "INSERT INTO demo (timestamp, fullname, username, email, telpNummer,password, token) VALUES
            (CURRENT_TIMESTAMP,'$fullname','$username', '$email', $telpNummer, '$password','$key')")){
            //deleteing row/id used from validation table
            if(mysqli_query($conn,"DELETE FROM validation WHERE token = '$key'")){
                //User Activ
                $message = "Hi $fullname!\n";
                include 'simpleHeader.php';
                echo ("<div><h2 class='u-text u-text-default u-title u-text-1'>".$message."Your account is activ, you can now log-in!!</h2></div>
                <div><a href='../login.html'>Log-in</a></div></div></section>");
                include 'footer.php';
                exit;
            }else{
                // Error to delete data on validation
                echo 'Error, Contact Admin!!!!';
                echo '<script type="text/javascript">';
                echo " alert('error found!, contact admin');window.location.href='../validation.html'";
                echo '</script>';

            }    
        }else{
        // Error to write data on demo from validation table
        echo 'Error, Contact Admin!!!!';
        echo '<script type="text/javascript">';
        echo " alert('error found!, contact admin');window.location.href='../validation.html'";
        echo '</script>';
        }
    } else{
    echo 'Account never Exist!!!';
        echo '<script type="text/javascript">';
        echo " alert('Account never Exist!!!');window.location.href='../login.html'";
        echo '</script>';
    }
    $result->close();
}