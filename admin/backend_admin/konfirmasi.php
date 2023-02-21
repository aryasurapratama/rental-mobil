<?php
// if(session_id() == '' || !isset($_SESSION)){session_start();}
include '../../database/config.php';

$id_pembayaran = $_GET['id'];

if($mysqli->query("UPDATE pembayaran SET status='KONFIRMASI' WHERE id_pembayaran=".$id_pembayaran)){
  header("location:../transaksi.php");
}

function redirect() {
  echo '<h1>Invalid Insert! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}


?>
