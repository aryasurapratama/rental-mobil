<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include '../database/config.php';

if(!isset($_SESSION["username"])){
  header("location:product.php");
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
  <style media="screen">
  .inputfile {
    width: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }
  .inputfile + label {
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    /* background-color: black; */
    display: inline-block;
  }
  </style>
  <!-- Title  -->
  <title>Profil</title>

  <!-- Favicon  -->
  <link rel="icon" href="img/core-img/favicon.ico">

  <!-- Core Style CSS -->
  <link rel="stylesheet" href="css/core-style.css">
  <link rel="stylesheet" href="style.css">

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
            <li class="active"><a href="profil.php">Profil</a></li>
            <li><a href="../backend/logout.php">Logout</a></li>';
          } else {
            echo '
            <li><a href="product.php">Product</a></li>
            <li><a href="#">Tentang</a></li>
            <li><a href="../register.php">Daftar Akun</a></li>
            <li><a href="../login.php">Login</a></li>';
          }?>

        </ul>
      </nav>
    </header>
    <!-- Header Area End -->

    <div class="cart-table-area section-padding-100">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-lg-8">
            <div class="cart-title mt-50">
              <h2>Profil</h2>
            </div>

            <div class="cart-table clearfix">
              <!-- jarak -->
              <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
              <div class="container">
                <div class="row flex-lg-nowrap">

                  <div class="col">
                    <div class="row">
                      <div class="col mb-3">
                        <div class="card">
                          <div class="card-body">
                            <div class="e-profile">
                              <div class="row">
                                <div class="col-12 col-sm-auto mb-3">
                                  <?php
                                  $id = $_SESSION['id_us'];
                                  $result = $mysqli->query("SELECT * FROM user WHERE id_user=".$id);
                                  $i = 1;
                                  if($result === FALSE){
                                    die(mysql_error());
                                  }

                                  if($result){
                                    $obj = $result->fetch_object();

                                    echo '<div class="mx-auto" style="width: 140px;">
                                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                    <img style="width:140px;height:140px;" src="../asset_gambar/'.$obj->gambar.'" alt="">
                                    </div>
                                    </div>
                                    </div>';

                                    echo '<div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">'.$obj->nama_user.'</h4>
                                    <p class="mb-0">'.$obj->username.'</p>
                                    <p class="mb-0">+'.$obj->no_hp.'</p>
                                    <div class="text-muted"><small>'.$obj->alamat.'</small></div>';
                                  }?>
                                  <!-- jarak -->
                                  <form class="" action="../backend/edit_profil.php" method="post" enctype="multipart/form-data">
                                    <div class="mt-2">
                                      <button style="height:40px;" class="btn btn-primary" type="button">
                                        <i class="fa fa-fw fa-camera"></i>
                                        <input type="file" name="fileToUpload" id="file" class="inputfile" />
                                        <label for="file">Ubah Foto</label>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                              </ul>
                              <div class="tab-content pt-3">
                                <div class="tab-pane active">
                                    <div class="row">
                                      <div class="col">
                                        <div class="row">
                                          <div class="col">
                                            <div class="form-group">
                                              <label>Nama Lengkap</label>
                                              <input class="form-control" type="text" name="name_lengkap" placeholder="Nama Lengkap">
                                            </div>
                                          </div>
                                          <div class="col">
                                            <div class="form-group">
                                              <label>Username</label>
                                              <input class="form-control" type="text" name="username" placeholder="Username">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col">
                                            <div class="form-group">
                                              <label>Email</label>
                                              <input class="form-control" type="email" name="email" placeholder="email@gmail.com">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col">
                                            <div class="form-group">
                                              <label>Nomor Handphone</label>
                                              <input class="form-control" type="text" name="hp" placeholder="628992888883">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-12 col-sm-6 mb-3">
                                        <div class="mb-2"><b>Change Password</b></div>
                                        <div class="row">
                                          <div class="col">
                                            <div class="form-group">
                                              <label>New Password</label>
                                              <input class="form-control" type="password" name="password_b" placeholder="Password Baru">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col">
                                            <div class="form-group">
                                              <label>Password <span class="d-none d-xl-inline">Lama</span></label>
                                              <input class="form-control" type="password" name="password_l" placeholder="Password Lama"></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col d-flex justify-content-end">
                                          <button class="btn btn-primary" type="submit">Edit Profil</button>
                                        </div>
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
                  <!-- jarak -->
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

      </body>

      </html>
