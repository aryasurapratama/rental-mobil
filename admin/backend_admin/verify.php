<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include '../../database/config.php';


$username = $_POST["username"];
$password = $_POST["password"];
$flag = 'true';

$result = $mysqli->query('SELECT id_admin, username, email, password FROM admin order by id_admin asc');

if($result === FALSE){
  die(mysql_error());
}
if($result){
  while($obj = $result->fetch_object()){
    if($obj->username === $username && $obj->password === $password || $obj->email === $username && $obj->password === $password) {

      $_SESSION['username'] = $username;
      $_SESSION['type'] = $obj->status;
      $_SESSION['id_us'] = $obj->id_user;
      $_SESSION['fname'] = $obj->username;
      $_SESSION['status_cek'] = 'admin';

      header("location:../index.php");
    } else {

      if($flag === 'true'){
        redirect();
        $flag = 'false';
      }
    }
  }
}

function redirect() {
  echo '<center><h1>DATA YANG DIMASUKKAN SALAH</h1></center>';
  header("Refresh: 3; url=../login.php");
}


?>
