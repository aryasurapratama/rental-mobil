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
  <title>Admin list data</title>
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
        <li>
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
        <li class="nav-item active">
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
        <div class="card">
          <div class="card-header">
            <!-- jarak -->
            <!-- jarak -->
            <div class="row">
              <div class="col-lg-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Pemesan</th>
                      <th scope="col">Nama Mobil</th>
                      <th scope="col">Tanggal Pakai</th>
                      <th scope="col">Tanggal Bayar</th>
                      <th scope="col">Bukti Bayar</th>
                      <th scope="col">Foto KTP</th>
                      <th scope="col">Status</th>
                      <!-- <th scope="col">Hapus</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $result = $mysqli->query("SELECT * FROM tb_sewa as s INNER JOIN mobil as m ON s.id_mobil=m.id_mobil INNER JOIN user as us ON us.id_user=s.id_user INNER JOIN tb_detail_sewa as tbs ON tbs.id_sewa=s.id_sewa INNER JOIN pembayaran as p ON p.id_detail_sewa=tbs.id_detail_sewa WHERE p.status='KONFIRMASI'");
                    $i = 1;
                    if($result === FALSE){
                      die(mysql_error());
                    }

                    if($result){
                      while($obj = $result->fetch_object()) {
                        echo	'<tr>';
                        echo		'<th scope="row">'.$i++.'</th>';
                        echo 		'<td>'.$obj->nama_user.'</td>';
                        echo 		'<td>'.$obj->nama_mobil.'</td>';
                        echo 		'<td>'.$obj->waktu_penggunaan.'</td>';
                        echo 		'<td>'.$obj->tanggal_bayar.'</td>';
                        echo 		'<td><img style="width:100px;" src="../asset_bukti_bayar/'.$obj->bukti_bayar.'"/></td>';
                        echo 		'<td><img style="width:100px;" src="../asset_ktp/'.$obj->bukti_ktp.'"/></td>';
                        echo 		'<td>
                                  TERKONFIRMASI
                                </td>';
                        echo 	'</tr>';
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div><!--/.row-->
            <!-- jarak -->
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
