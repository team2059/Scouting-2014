<?php
$hostname = "76.182.74.61";
$username = "2059";
$password = "r62h4yLSAEnTJ2K5";
try {
  $dbh = new PDO("mysql:host=76.182.74.61;dbname=2059","2059","r62h4yLSAEnTJ2K5");
  echo("Connected to database");
} catch(PDOException $e) {
  die($e->getMessage());
}
