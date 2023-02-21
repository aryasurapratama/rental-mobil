<?php
// if(session_id() == '' || !isset($_SESSION)){session_start();}
include '../../database/config.php';

$id_mobil = $_GET['id'];

if($id_mobil!=''){
  $mysqli->query("UPDATE mobil SET status=0 WHERE id_mobil=".$id_mobil);
  header("location:../config_mobil.php");
}

function redirect() {
  echo '<h1>Invalid Insert! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}


?>
