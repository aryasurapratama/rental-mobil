<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include '../database/config.php';
if(!isset($_SESSION["username"])){
  header("location:login.php");
} elseif(isset($_SESSION["username"])){
  if($_SESSION['status_cek']!="admin"){
    header("location:../user/product.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Admin tambah data</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/css/demo.css" rel="stylesheet" />
</head>

<body>
  <div class="wrapper">
    <div class="sidebar" data-image="assets/img/sidebar-5.jpg">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

      Tip 2: you can also add an image using data-image tag
    -->
    <div class="sidebar-wrapper">
      <div class="logo">
        <a href="#" class="simple-text">
          Admin Panel
        </a>
      </div>
      <ul class="nav">
        <li>
          <a class="nav-link" href="index.php">
            <i class="nc-icon nc-chart-pie-35"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li>
          <a class="nav-link" href="tambah_mobil.php">
            <i class="nc-icon nc-simple-add"></i>
            <p>Tambah data mobil</p>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="list_data_mobil.php">
            <i class="nc-icon nc-notes"></i>
            <p>List data mobil</p>
          </a>
        </li>
        <li>
          <a class="nav-link" href="config_mobil.php">
            <i class="nc-icon nc-settings-gear-64"></i>
            <p>Configurasi Mobil</p>
          </a>
        </li>
        <li>
          <a class="nav-link" href="transaksi.php">
            <i class="nc-icon nc-cart-simple"></i>
            <p>Transaksi</p>
          </a>
        </li>
        <li>
          <a class="nav-link" href="pemesanan_lunas.php">
            <i class="nc-icon nc-bullet-list-67"></i>
            <p>List pemesan lunas</p>
          </a>
        </li>
        <li>
          <a class="nav-link" href="../backend/logout.php">
            <i class="nc-icon nc-button-power"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
      <div class="container-fluid">
        <a class="navbar-brand" href="#pablo"> TAMBAH DATA </a>
        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar burger-lines"></span>
          <span class="navbar-toggler-bar burger-lines"></span>
          <span class="navbar-toggler-bar burger-lines"></span>
        </button>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card ">
              <div class="card-header ">
                <!-- jarak -->
                <form class="" action="backend_admin/edit.php" method="post" enctype="multipart/form-data">
                  <div class="form-group col-md-12">
                    <div class="form-group col-md-12" id="form-back">
                      <center>
                        <h3>MASUKKAN DATA MOBIL BARU</h3>
                      </center>
                    </div>
                    <br>
                    <?php
                    include '../database/config.php';
                    $id = $_GET['id'];
                    $result = $mysqli->query("SELECT * FROM mobil WHERE id_mobil=".$id);
                    $obj = $result->fetch_object();
                    $i = 1;
                    if($result === FALSE){
                      die(mysql_error());
                    }
                    echo '
                    <div class="form-row">
                    <div class="form-group col-md-10">
                    <label for="inputEmail4">NAMA MOBIL</label>
                    <input type="text" name="nama_mobil" class="form-control" placeholder='.$obj->nama_mobil.'>
                    </div>
                    </div>
                    <!-- jarak -->
                    <div class="form-group col-sm-10">';
                    if($obj->jenis_mobil=="SUV"){
                      echo '<label for="inputEmail4">JENIS MOBIL</label>
                      <div class="form-row">
                      <div class="form-group col-md-1">
                      </div>
                      <div class="form-group col-md-2">
                      <input class="form-check-input" type="radio" name="j_mobil" value="SUV" checked>
                      <label class="form-check-label" for="gridRadios2">
                      SUV
                      </label>
                      </div>
                      <div class="form-group  col-md-2">
                      <input class="form-check-input" type="radio" name="j_mobil" value="SEDAN">
                      <label class="form-check-label" for="gridRadios2">
                      SEDAN
                      </label>
                      </div>
                      <div class="form-group col-md-2">
                      <input class="form-check-input" type="radio" name="j_mobil" value="CABIN">
                      <label class="form-check-label" for="gridRadios2">
                      CABIN
                      </label>
                      </div>
                      <div class="form-group col-md-2">
                      <input class="form-check-input" type="radio" name="j_mobil" value="MINIBUS">
                      <label class="form-check-label" for="gridRadios2">
                      MINIBUS
                      </label>
                      </div>
                      </div>
                      </div>';
                    } elseif ($obj->jenis_mobil=="SEDAN") {
                      echo '<label for="inputEmail4">JENIS MOBIL</label>
                      <div class="form-row">
                      <div class="form-group col-md-1">
                      </div>
                      <div class="form-group col-md-2">
                      <input class="form-check-input" type="radio" name="j_mobil" value="SUV">
                      <label class="form-check-label" for="gridRadios2">
                      SUV
                      </label>
                      </div>
                      <div class="form-group  col-md-2">
                      <input class="form-check-input" type="radio" name="j_mobil" value="SEDAN" checked>
                      <label class="form-check-label" for="gridRadios2">
                      SEDAN
                      </label>
                      </div>
                      <div class="form-group col-md-2">
                      <input class="form-check-input" type="radio" name="j_mobil" value="CABIN">
                      <label class="form-check-label" for="gridRadios2">
                      CABIN
                      </label>
                      </div>
                      <div class="form-group col-md-2">
                      <input class="form-check-input" type="radio" name="j_mobil" value="MINIBUS">
                      <label class="form-check-label" for="gridRadios2">
                      MINIBUS
                      </label>
                      </div>
                      </div>
                      </div>';
                    } elseif ($obj->jenis_mobil=="CABIN") {
                      echo '<label for="inputEmail4">JENIS MOBIL</label>
                      <div class="form-row">
                      <div class="form-group col-md-1">
                      </div>
                      <div class="form-group col-md-2">
                      <input class="form-check-input" type="radio" name="j_mobil" value="SUV">
                      <label class="form-check-label" for="gridRadios2">
                      SUV
                      </label>
                      </div>
                      <div class="form-group  col-md-2">
                      <input class="form-check-input" type="radio" name="j_mobil" value="SEDAN">
                      <label class="form-check-label" for="gridRadios2">
                      SEDAN
                      </label>
                      </div>
                      <div class="form-group col-md-2">
                      <input class="form-check-input" type="radio" name="j_mobil" value="CABIN" checked>
                      <label class="form-check-label" for="gridRadios2">
                      CABIN
                      </label>
                      </div>
                      <div class="form-group col-md-2">
                      <input class="form-check-input" type="radio" name="j_mobil" value="MINIBUS">
                      <label class="form-check-label" for="gridRadios2">
                      MINIBUS
                      </label>
                      </div>
                      </div>
                      </div>';
                    } elseif ($obj->jenis_mobil=="MINIBUS") {
                      echo '<label for="inputEmail4">JENIS MOBIL</label>
                      <div class="form-row">
                      <div class="form-group col-md-1">
                      </div>
                      <div class="form-group col-md-2">
                      <input class="form-check-input" type="radio" name="j_mobil" value="SUV">
                      <label class="form-check-label" for="gridRadios2">
                      SUV
                      </label>
                      </div>
                      <div class="form-group  col-md-2">
                      <input class="form-check-input" type="radio" name="j_mobil" value="SEDAN">
                      <label class="form-check-label" for="gridRadios2">
                      SEDAN
                      </label>
                      </div>
                      <div class="form-group col-md-2">
                      <input class="form-check-input" type="radio" name="j_mobil" value="CABIN">
                      <label class="form-check-label" for="gridRadios2">
                      CABIN
                      </label>
                      </div>
                      <div class="form-group col-md-2">
                      <input class="form-check-input" type="radio" name="j_mobil" value="MINIBUS"  checked>
                      <label class="form-check-label" for="gridRadios2">
                      MINIBUS
                      </label>
                      </div>
                      </div>
                      </div>';
                    }
                    echo '
                    <!-- jarak -->
                    <div class="form-group col-md-10">
                    <label for="inputEmail4">HARGA SEWA</label>
                    <input type="number" name="harga_sewa" class="form-control" placeholder='.$obj->harga_sewa.'>
                    </div>
                    <div class="form-group col-md-10">
                    <label for="inputEmail4">DEKSRIPSI</label>
                    <input type="text" name="deskripsi" class="form-control" placeholder='.$obj->deskripsi.'>
                    </div>
                    <div class="form-group col-md-10">
                    <label for="inputEmail4">GAMBAR MOBIL</label>
                    <input type="file" name="fileToUpload" class="form-control" placeholder="Gambar">
                    </div>
                    <input type="hidden" name="id_mobil" value='.$obj->id_mobil.'>
                    <div class="form-group col-md-12">
                    <center>
                    <button name="submit" class="btn btn-primary btn-md" id="btn-chat">Kirim</button>
                    </center>
                    </div>
                    </div>
                    </form>';
                    ?>
                    <!-- jarak -->
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <footer class="footer">
          <div class="container-fluid">
            <nav>
              <p class="copyright text-center">
                ©
                <script>
                document.write(new Date().getFullYear())
                </script>
                <a href="http://www.creative-tim.com">Rental</a> Mobil
              </p>
            </nav>
          </div>
        </footer>
      </div>
    </div>
  </body>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Google Maps Plugin    -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!--  Chartist Plugin  -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <!-- <script src="assets/js/plugins/bootstrap-notify.js"></script> -->
  <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
  <script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
  <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/js/demo.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();

    demo.showNotification();

  });
</script>

</html>
