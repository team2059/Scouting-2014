<?php
$hostname = "localhost";
$username = "2059";
$password = "r62h4yLSAEnTJ2K5";
try {
  $dbh = new PDO("mysql:host=localhost;dbname=2059","2059","r62h4yLSAEnTJ2K5");
  echo("Connected to database");
} catch(PDOException $e) {
  die($e->getMessage());
}
