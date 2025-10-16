<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ems";

// Créer la connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
