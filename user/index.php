<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
include '../database/config.php';
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
  <title>Produk Mobil</title>

  <!-- Favicon  -->
  <link rel="icon" href="img/core-img/favicon.ico">

  <!-- Core Style CSS -->
  <link rel="stylesheet" href="css/core-style.css">
  <link rel="stylesheet" href="style.css">

</head>

<body>
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
          <li class="active"><a href="index.php">Home</a></li>
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
            <li><a href="../login.php">Login</a></li>';
          }?>

        </ul>
      </nav>
    </header>
    <!-- Header Area End -->

    <!-- Product Catagories Area Start -->
    <div class="products-catagories-area clearfix">
      <div class="amado-pro-catagory clearfix">
        <?php
        $result = $mysqli->query("SELECT * FROM mobil WHERE status=0");
        $i = 1;
        if($result === FALSE){
          die(mysql_error());
        }

        if($result){
          while($obj = $result->fetch_object()) {
            echo '<div class="single-products-catagory clearfix">
            <a href="pembayaran.php?action=add&id='.$obj->id_mobil.'" data-toggle="tooltip" data-placement="left" title="Sewa Mobil">
            <img src="../asset_gambar/'.$obj->gambar.'" alt="">
            <!-- Hover Content -->
            <div class="hover-content">
            <div class="line"></div>
            <p>Rp.'.$obj->harga_sewa.'/Hari</p>
            <h4>'.$obj->nama_mobil.'</h4>
            </div>
            </a>
            </div>';
          }
        }
        ?>

      </div>
    </div>
    <!-- Product Catagories Area End -->
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
