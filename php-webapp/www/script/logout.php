<?php
//to redirect if dircect url used
if(!isset($_SERVER['HTTP_REFERER'])){
// redirect them to your desired location
header('location:../index.html');
exit;
}
 session_start();
 session_unset();
 session_destroy();
 session_write_close();
 setcookie(session_name(),'',0,'/');
 session_regenerate_id(true);

// Redirect to the login page:
header('Location: ../index.html');
?>