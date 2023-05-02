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
}?>
<!DOCTYPE html>
<html style='font-size: 16px;' lang='en'>
<head>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta charset='utf-8'>
    <meta name='keywords' content='TFW, Hallo'>
    <meta name='description' content=''>
    <title>User</title>
    <link rel='stylesheet' href='../css/index.css' media='screen'>
    <link rel='stylesheet' href='../css/user.css' media='screen'>
    <script class='u-script' type='text/javascript' src='jquery-1.9.1.min.js' defer=''></script>
    <script class='u-script' type='text/javascript' src='script.js' defer=''></script>

    <link id='u-theme-google-font' rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i'>
    <meta name='theme-color' content='#478ac9'>
    <meta property='og:title' content='Page 1'>
    <meta property='og:type' content='website'>
    <meta data-intl-tel-input-cdn-path='intlTelInput/'>
</head>
<body class='u-body u-xl-mode' data-lang='en'>
        <section class='u-align-center u-clearfix u-image u-shading u-section-1'  data-image-width='3362' data-image-height='2177' id='sec-f76f'>
                <div class='u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1'>