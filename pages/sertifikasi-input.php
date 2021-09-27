<?php
session_start();

include'../koneksi.php';

$tgl = date('Y-m-d');

if(isset($_SESSION['sesi']) && !empty($_SESSION['sesi'])){
?>

<?php
include'header.php'; 
?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
           <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Jadwal Sertifikasi</h4>
                  <form class="forms-sample"  action="../proses/sertifikasi-input-proses.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Skema</label>
                      <input type="text" class="form-control" name="skema" placeholder="Skema">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Tanggal Sertifikasi</label>
                      <input type="date" name="tanggal" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Tempat</label>
                      <input type="text" class="form-control" placeholder="Tempat" name="tempat">
                    </div>
                    <button type="submit" name="simpan" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
        <!-- partial:partials/_footer.html -->
 <?php
include'footer.php'; 
?>
 <?php
} else {
  echo"<script>alert('Anda Harus Login Dahulu'); </script>";
  header('location:../login.php');
}
?>