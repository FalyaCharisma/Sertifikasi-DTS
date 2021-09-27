<?php
session_start();

include'koneksi.php';

$tgl = date('Y-m-d');

if(isset($_SESSION['sesi']) && !empty($_SESSION['sesi'])){
?>
<?php include "header.php" ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Selamat Datang Peserta Sertifikasi BNSP LSP 2021</h3>
                  <h6 class="font-weight-normal mb-0">Kompeten Profesional Inovatif</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/1.jpg">
                </div>
              </div>
            </div>
          </div>
        <!-- content-wrapper ends -->

 <?php include "footer.php" ?>
<?php
} else {
  echo"<script>alert('Anda Harus Login Dahulu'); </script>";
  header('location:login.php');
}
?>
