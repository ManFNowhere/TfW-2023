#!/usr/bin/php
<?php
require_once("Mail.php");

$from = "Test tmahdi <tmahdi@studenten.hs-bremerhaven.de>";
$to = "test php <vrlix03@gmail.com>";
$subject = "Subject";
$body = "Lorem ipsum dolor sit amet, consectetur adipiscing elit...";

$host = "smail.hs-bremerhaven.de";
$username = "tmahdi@studenten.hs-bremerhaven.de";
$password = "Pandamedina11.";

$headers = array('From' => $from, 'To' => $to, 'Subject' => $subject);

$smtp = Mail::factory('smtp', array ('host' => $host,
                                     'auth' => true,
                                     'username' => $username,
                                     'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if ( PEAR::isError($mail) ) {
    echo("<p>Error sending mail:<br/>" . $mail->getMessage() . "</p>");
} else {
    echo("<p>Message sent.</p>");
}
?>