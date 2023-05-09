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


$sql = 'SELECT id, fullname, password FROM demo WHERE email = ?';

if ( !isset($_POST['email'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare($sql)) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

        if ($stmt->num_rows > 0) {
                $stmt->bind_result($id,$fullname, $password);
                $stmt->fetch();
                // Account exists, now we verify the password.
                // Account for admin
                if ($_POST['email'] and $_POST['password']=='admin'){
                        header("Location:admin.php");
                // Account for User
                // Note: remember to use password_hash in your registration file to store the hashed passwords
                }elseif (password_verify($_POST['password'], $password)) {
                        // Verification success! User has logged-in!
                        // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                        session_regenerate_id();
                        $_SESSION['loggedin'] = TRUE;
                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION['id'] = $id;
                        $_SESSION['fullname'] = $fullname;
                        header("Location:user.php?=".$fullname);
                } else {
                        // Incorrect password
                        echo 'Incorrect email and/or password!';
                        echo '<script type="text/javascript">';
                        echo " alert('Incorrect email and/or password!');window.location.href='../login.html'";
                        echo '</script>';
                }
        } else {
                // Incorrect email
                        echo 'Account never Exist!!';
                        echo '<script type="text/javascript">';
                        echo " alert('Account never Exist!!');window.location.href='../login.html'";
                        echo '</script>';
        }
	$stmt->close();
}

