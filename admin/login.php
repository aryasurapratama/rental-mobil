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
  <title>Login Admin</title>

  <!-- Favicon  -->
  <link rel="icon" href="../user/img/core-img/favicon.ico">

  <!-- Core Style CSS -->
  <link rel="stylesheet" href="../user/css/core-style.css">
  <link rel="stylesheet" href="../user/style.css">
  <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
  <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <!-- Font special for pages-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

  <!-- Vendor CSS-->
  <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="../vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <!-- <link href="../vendor/css/main.css" rel="stylesheet" media="all"> -->

</head>

<body>
  <!-- Search Wrapper Area Start -->
  <div class="search-wrapper section-padding-100">
    <div class="search-close">
      <i class="fa fa-close" aria-hidden="true"></i>
    </div>

  </div>
  <!-- Search Wrapper Area End -->

  <!-- ##### Main Content Wrapper Start ##### -->
  <div class="main-content-wrapper d-flex clearfix">

    <!-- Mobile Nav (max width 767px)-->
    <div class="mobile-nav">
      <!-- Navbar Brand -->
      <div class="amado-navbar-brand">
        <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
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
        <a href="index.html"><img src="user/img/core-img/logo.png" alt=""></a>
      </div>
      <!-- Amado Nav -->
      <nav class="amado-nav">

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
          <div class="page-wrapper bg-red p-t-180 p-b-90 font-robo">
            <div class="wrapper wrapper--w960">
              <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                  <center><h2 class="title">LOGIN ADMIN</h2></center><br>
                  <form method="POST" action="backend_admin/verify.php">
                    <div class="form-row">
                      <div class="form-group col-md-10">
                        <label style="margin-left:50px;" for="inputEmail4">USERNAME</label>
                        <input  style="margin-left:50px;" class="form-control" type="text" placeholder="Username" name="username" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-10">
                        <label style="margin-left:50px;" for="inputEmail4">PASSWORD</label>
                        <input style="margin-left:50px;" class="form-control" type="password" placeholder="Password" name="password" required>
                      </div>
                    </div>
                    <center>
                    <div class="p-t-30">
                      <button class="btn btn-success btn-md" type="submit">LOGIN</button>
                      <br><a href="lupa_password.php">Lupa password?</a>
                    </div>
                  </center>
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
  <!-- ##### Footer Area End ##### -->

  <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
  <script src="../user/js/jquery/jquery-2.2.4.min.js"></script>
  <!-- Popper js -->
  <script src="../user/js/popper.min.js"></script>
  <!-- Bootstrap js -->
  <script src="../user/js/bootstrap.min.js"></script>
  <!-- Plugins js -->
  <script src="../user/js/plugins.js"></script>
  <!-- Active js -->
  <script src="../user/js/active.js"></script>

  <!-- Jquery JS-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <!-- Vendor JS-->
  <script src="../vendor/select2/select2.min.js"></script>
  <script src="../vendor/datepicker/moment.min.js"></script>
  <script src="../vendor/datepicker/daterangepicker.js"></script>

  <!-- Main JS-->
  <script src="../vendor/js/global.js"></script>


</body>

</html>
