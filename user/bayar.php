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

  <!-- Title  -->
  <title>Amado - Furniture Ecommerce Template | Product Details</title>

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
            <li class="active"><a href="aksi_pemb.php">Pembayaran</a></li>
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

    <!-- Product Details Area Start -->
    <div class="single-product-area section-padding-100 clearfix">
      <div class="container-fluid">
        <div class="cart-title mt-10">
          <h2>Pembayaran</h2>
        </div>

        <div class="row">
          <div class="col-12 col-lg-7">
            <div class="single_product_thumb">
              <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <a class="gallery_img">
                      <?php
                      $id_sewa = $_GET['id'];
                      $result = $mysqli->query("SELECT ds.*, s.*, m.gambar as gm, m.nama_mobil as nama_mobil FROM tb_detail_sewa as ds INNER JOIN tb_sewa as s ON s.id_sewa=ds.id_sewa INNER JOIN mobil as m ON m.id_mobil=s.id_mobil INNER JOIN user as us ON us.id_user=s.id_user WHERE ds.id_sewa=".$id_sewa);
                      $i = 1;
                      if($result === FALSE){
                        die(mysql_error());
                      }
                      $obj = $result->fetch_object();

                      echo '<img class="d-block w-100" src="../asset_gambar/'.$obj->gm.'" alt="First slide">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-5">
          <div class="single_product_desc">
          <!-- Product Meta Data -->
          <div class="product-meta-data">
          <div class="line"></div>
          <p class="product-price">'.$obj->nama_mobil.'</p>
          <a href="#">
          <h6>Rp.'.$obj->total_harga.'</h6>
          </a>
          <p>Lama sewa '.$obj->banyak_hari.'/Hari</p>
          <p style="text-align:justify;text-justify:inter-word;">Pembayaran dilakukan dengan cara mentransfer sesuai harga diatas ke nomor rekening 6677828889/BNI A/N IVAN dan upload bukti bayar.</p>
          </div>';


          echo '<br>
          <!-- Add to Cart Form -->
          <form class="cart clearfix" action="../backend/insert_pembayaran.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_detail_sewa" value="'.$obj->id_detail_sewa.'">
          ';
          ?>
            <div class="col">
              <div class="form-group">
                <label>Nama Penyewa</label>
                <input class="form-control" type="text" name="name_lengkap" placeholder="Nama Lengkap" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label>Tanggal Pakai</label>
                <input class="form-control" type="date" name="date_pakai" placeholder="Nama Lengkap" required>
              </div>
              <div class="col">
                <div class="form-group">
                  <label>Foto KTP</label>
                  <input class="form-control" type="file" name="fileToUpload" placeholder="Foto Ktp" required>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label>Bukti Bayar</label>
                  <input class="form-control" type="file" name="fileToUpload2" placeholder="Bukti Bayar" required>
                </div>
              </div>
            </div>
            <button type="submit" name="addtocart" value="5" class="btn amado-btn">BAYAR</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- Product Details Area End -->
</div>
<!-- ##### Main Content Wrapper End ##### -->

<!-- ##### Newsletter Area Start ##### -->
<section class="newsletter-area section-padding-100-0">
  <div class="container">
    <div class="row align-items-center">
      <!-- Newsletter Text -->
      <div class="col-12 col-lg-6 col-xl-7">
        <div class="newsletter-text mb-100">
          <h2>Subscribe for a <span>25% Discount</span></h2>
          <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
        </div>
      </div>
      <!-- Newsletter Form -->
      <div class="col-12 col-lg-6 col-xl-5">
        <div class="newsletter-form mb-100">
          <form action="#" method="post">
            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
            <input type="submit" value="Subscribe">
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ##### Newsletter Area End ##### -->

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
