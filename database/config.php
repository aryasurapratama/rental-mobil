<?php
  $db_username = 'root';
  $db_password = '';
  $db_name = 'rental_mobil';
  $db_host = 'localhost';
  // $link = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die(mysqli_error());
  $mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);
?>
