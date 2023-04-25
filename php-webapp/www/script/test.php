<?php
// Rufen Sie 
// https://informatik.hs-bremerhaven.de/IHR-ACCOUNT/eingabe.html
// auf, füllen Sie das Formular aus und senden Sie es ab ...
$name = $_POST["name"];
$alter = $_POST["alter"];
echo("Hallo $name, Sie sind also $alter Jahre alt?");
?>