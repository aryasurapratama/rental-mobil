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
  <title>Pembayaran</title>

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

    <div class="cart-table-area section-padding-100">
        <div class="row">
            <div class="cart-title mt-100">
              <h2>Detail Pemesanan</h2>
            </div>

              <table class="table table-responsive">
                <thead>
                  <tr>
                    <th>Nama Mobil</th>
                    <th>Tanggal Pesan</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $id_user = $_SESSION['id_us'];
                  $result = $mysqli->query("SELECT * FROM tb_detail_sewa as ds INNER JOIN tb_sewa as s ON s.id_sewa=ds.id_sewa INNER JOIN mobil as m ON m.id_mobil=s.id_mobil INNER JOIN user as us ON us.id_user=s.id_user WHERE s.id_user='$id_user' AND ds.waktu_penggunaan='0000-00-00'");
                  $i = 1;
                  if($result === FALSE){
                    die(mysql_error());
                  }

                  if($result){
                    while($obj = $result->fetch_object()) {
                      echo	'<tr>';
                      echo 		'<td>'.$obj->nama_mobil.'</td>';
                      echo 		'<td>'.$obj->waktu_sewa.'</td>';
                      echo 		'<td>Rp.'.$obj->total_harga.'</td>';
                      echo 		'<td>
                      <a href="bayar.php?action=add&id='.$obj->id_sewa.'"><img style="width:20px;"src="img/payment-method.svg">BAYAR</a>
                      <a href="../backend/hapus_data_pesan.php?action=add&id='.$obj->id_sewa.'"><em class="fa fa-lg fa-trash">BATAL</em></a>
                      </td>';
                      echo 	'</tr>';
                    }
                  }
                  ?>
                  </tbody>
                </table>
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
