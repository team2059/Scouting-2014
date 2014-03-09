<?php
try {
  $dbh = new PDO("mysql:host=localhost;dbname=2059","2059","r62h4yLSAEnTJ2K5");
} catch(PDOException $e) {
  die($e->getMessage());
}
