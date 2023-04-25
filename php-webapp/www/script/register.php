#!/usr/bin/php
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'tanwirkhalid';
$DATABASE_NAME = 'login';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['fullname'],$_POST['username'], $_POST['email'],$_POST['telpNummer'] ,$_POST['password'], $_POST['confPassword'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form!(isset)');
}

// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!';
	} else {
		// Insert new account
        // Username doesn't exists, insert new account
        if ($stmt = $con->prepare('INSERT INTO accounts (fullname, username, email, telpNummer ,password ,confPassword ) VALUES ( ?, ?, ?, ?, ?, ?)')) {
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $_POST['fullname'], $_POST['username'], $_POST['email'], $_POST['telpNummer'], $password, $_POST['confPassword'] );
            $stmt->execute();
            echo 'You have successfully registered! You can now login!';
        } else {
	        // Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all 3 fields.
	        echo 'Could not prepare statement!';
        }
	}
	$stmt->close();
} else {
	// Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$con->close();

