<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include '../database/config.php';
if(isset($_SESSION["username"])){
  header("location:../user/profil.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!-- Title  -->
  <title>Login</title>

  <!-- Favicon  -->
  <link rel="icon" href="img/core-img/favicon.ico">

  <!-- Core Style CSS -->
  <link rel="stylesheet" href="css/core-style.css">
  <link rel="stylesheet" href="style.css">
  <link href="../vendor/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
  <link href="../vendor/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <!-- Font special for pages-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

  <!-- Vendor CSS-->
  <link href="../vendor/vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="../vendor/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <!-- <link href="../vendor/css/main.css" rel="stylesheet" media="all"> -->

</head>

<body>
  <!-- Search Wrapper Area Start -->
  <div class="search-wrapper section-padding-100">
    <div class="search-close">
      <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="search-content">
            <form action="#" method="get">
              <input type="search" name="search" id="search" placeholder="Type your keyword...">
              <button type="submit"><img src="img/core-img/search.png" alt=""></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Search Wrapper Area End -->

  <!-- ##### Main Content Wrapper Start ##### -->
  <div class="main-content-wrapper d-flex clearfix">

    <!-- Mobile Nav (max width 767px)-->
    <div class="mobile-nav">
      <!-- Navbar Brand -->
      <div class="amado-navbar-brand">
        <a href="../index.php"><img src="img/core-img/logi.png" alt=""></a>
      </div>
      <!-- Navbar Toggler -->
      <div class="amado-navbar-toggler">
        <span></span><span></span><span></span>
      </div>
    </div>

    <!-- Header Area Start -->
    <header class="header-area clearfix">
      <!-- Close Icon -->
      <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
      </div>
      <!-- Logo -->
      <div class="logo">
        <a href="../index.php"><img style="height:150px;" src="img/core-img/logi.png" alt=""></a>
      </div>
      <!-- Amado Nav -->
      <nav class="amado-nav">
        <ul>
          <li><a href="index.php">Home</a></li>
          <?php   if(isset($_SESSION["username"])){
            echo ' <li><a href="product.php">Product</a></li>
            <li><a href="aksi_pemb.php">Pembayaran</a></li>
            <li><a href="detail_sewa.php">Detail Sewa</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="../backend/logout.php">Logout</a></li>';
          } else {
            echo '
            <li><a href="product.php">Product</a></li>
            <li><a href="#">Tentang</a></li>
            <li><a href="../register.php">Daftar Akun</a></li>
            <li class="active"><a href="../login.php">Login</a></li>';
          }?>

        </ul>
      </nav>
    </header>
    <!-- Header Area End -->

    <div class="cart-table-area section-padding-100">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-lg-8">
            <!-- <div class="cart-title mt-50">
            <h2>Detail Pemesanan</h2>
          </div> -->
          <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
            <div class="wrapper wrapper--w960">
              <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                  <h2 class="title">LOGIN</h2>
                  <form method="POST" action="../backend/edit_password.php">
                    <?php $id = $_GET['id'];
                    echo '<input  class="form-control" type="hidden" value="'.$id.'" name="id_us" required>';
                     ?>
                    <div class="form-row">
                      <div class="form-group col-md-10">
                        <label for="inputEmail4">PASSWORD BARU</label>
                        <input  class="form-control" type="password" placeholder="Password Baru" name="password" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-10">
                        <label for="inputEmail4">KONFIRMASI PASSWORD BARU</label>
                        <input class="form-control" type="password" placeholder="Konfirmasi Password Baru" name="password_baru" required>
                      </div>
                    </div>

                    <div class="p-t-30">
                      <button class="btn btn-success btn-md" type="submit">UBAH PASSWORD</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Main Content Wrapper End ##### -->

<!-- ##### Footer Area Start ##### -->
<footer class="footer_area clearfix">
  <div class="container">
    <div class="row align-items-center">
      <!-- Single Widget Area -->
      <div class="col-12 col-lg-4">
        <div class="single_widget_area">
          <!-- Logo -->
          <div class="footer-logo mr-50">
            <a href="index.html"><img style="margin-left:50px;width:100px" src="img/core-img/logi.png" alt=""></a>
          </div>
          <!-- Copywrite Text -->
          <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Nando Car Jogja
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
        <!-- Single Widget Area -->
        <div class="col-12 col-lg-8">
          <div class="single_widget_area">
            <!-- Footer Menu -->
            <div class="footer_menu">
              <nav class="navbar navbar-expand-lg justify-content-end">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="footerNavContent">
                  <p>Jl. Stadion, Karangsari, Wedomartani, Ngemplak, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55584<br>
                    Contact 1 : +628989662226<br>
                    Contact 2 : +6289602320202</p>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- ##### Footer Area End ##### -->

  <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
  <script src="js/jquery/jquery-2.2.4.min.js"></script>
  <!-- Popper js -->
  <script src="js/popper.min.js"></script>
  <!-- Bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Plugins js -->
  <script src="js/plugins.js"></script>
  <!-- Active js -->
  <script src="js/active.js"></script>

  <!-- Jquery JS-->
  <script src="../vendor/vendor/jquery/jquery.min.js"></script>
  <!-- Vendor JS-->
  <script src="../vendor/vendor/select2/select2.min.js"></script>
  <script src="../vendor/vendor/datepicker/moment.min.js"></script>
  <script src="../vendor/vendor/datepicker/daterangepicker.js"></script>

  <!-- Main JS-->
  <script src="../vendor/js/global.js"></script>


</body>

</html>
