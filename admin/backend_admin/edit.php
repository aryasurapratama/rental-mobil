<?php
// if(session_id() == '' || !isset($_SESSION)){session_start();}
include '../../database/config.php';

$id_mobil = $_POST['id_mobil'];
$nama = $_POST['nama_mobil'];
$jenis = $_POST['j_mobil'];
$harga = $_POST['harga_sewa'];
$desk = $_POST['deskripsi'];
$file_name = $_FILES['fileToUpload']['name'];

if($nama!=''){
  $mysqli->query("UPDATE mobil SET nama_mobil='$nama', jenis_mobil='$jenis' WHERE id_mobil=".$id_mobil);
}

if($harga!=''){
  $mysqli->query("UPDATE mobil SET harga_sewa='$harga', jenis_mobil='$jenis' WHERE id_mobil=".$id_mobil);
}

if($desk!=''){
  $mysqli->query("UPDATE mobil SET deskripsi='$desk', jenis_mobil='$jenis' WHERE id_mobil=".$id_mobil);
}

if($file_name!=''){
  $ekstensi_diperbolehkan	= array('jpg','jpeg', 'png');
  $x = explode('.', $file_name);
  $ekstensi = strtolower(end($x));
  $ukuran	= $_FILES['fileToUpload']['size'];
  $file_tmp = $_FILES['fileToUpload']['tmp_name'];

  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    if($ukuran < 10044070){
      if($mysqli->query("UPDATE mobil SET gambar='$file_name', jenis_mobil='$jenis' WHERE id_mobil=".$id_mobil)){
        move_uploaded_file($file_tmp, '../../asset_gambar/'.$file_name);
      }
    }
  }
}

header("location:../index.php");

function redirect() {
  echo '<h1>Invalid Insert! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}


?>
