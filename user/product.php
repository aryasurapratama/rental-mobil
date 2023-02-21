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
  <title>Product Mobil</title>

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
      <nav class="amado-nav">
        <ul>
          <li><a href="index.php">Home</a></li>
          <?php   if(isset($_SESSION["username"])){
            echo ' <li class="active"><a href="product.php">Product</a></li>
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

    <div class="amado_product_area section-padding-100">
      <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <div class="product-topbar d-xl-flex align-items-end justify-content-between">
              <!-- Total Products -->
              <div class="total-products">
                <p>Showing 1-8 0f 25</p>
                <div class="view d-flex">
                  <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                </div>
              </div>
              <!-- Sorting -->
              <div class="product-sorting d-flex">
                <div class="sort-by-date d-flex align-items-center mr-15">
                  <p>Sort by</p>
                  <form action="#" method="get">
                    <select name="select" id="sortBydate">
                      <option value="value">Date</option>
                      <option value="value">Newest</option>
                      <option value="value">Popular</option>
                    </select>
                  </form>
                </div>
                <div class="view-product d-flex align-items-center">
                  <p>View</p>
                  <form action="#" method="get">
                    <select name="select" id="viewProduct">
                      <option value="value">12</option>
                      <option value="value">24</option>
                      <option value="value">48</option>
                      <option value="value">96</option>
                    </select>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="row">
            <!-- Single Product Area -->
            <?php
            $result = $mysqli->query("SELECT * FROM mobil WHERE status=0");
            $i = 1;
            if($result === FALSE){
              die(mysql_error());
            }
            if($result){
              while($obj = $result->fetch_object()) {

                echo '<div class="col-12 col-sm-6 col-md-12 col-xl-6">
                <div class="single-product-wrapper">
                <!-- Product Image -->
                <div class="product-img">
                <img src="../asset_gambar/'.$obj->gambar.'" alt="">
                <!-- Hover Thumb -->
                <img class="hover-img" src="../asset_gambar/'.$obj->gambar.'" alt="">
                </div>

                <!-- Product Description -->
                <div class="product-description d-flex align-items-center justify-content-between">
                <!-- Product Meta Data -->
                <div class="product-meta-data">
                <div class="line"></div>
                <p class="product-price">Rp.'.$obj->harga_sewa.'/Hari</p>
                <a href="product-details.html">
                <h6>'.$obj->nama_mobil.'</h6>
                </a>
                </div>
                <!-- Ratings & Cart -->
                <div class="ratings-cart text-right">
                <div class="cart">
                <a href="pembayaran.php?action=add&id='.$obj->id_mobil.'" data-toggle="tooltip" data-placement="left" title="Sewa Mobil"><img style="width:30px" src="img/core-img/sewa.png" alt=""></a>
                </div>
                </div>
                </div>
                </div>
                </div>';
              }
            }
            ?>
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
