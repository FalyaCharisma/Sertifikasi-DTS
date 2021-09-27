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
                  <h4 class="card-title">Tambah Data Peserta</h4>
                  <form class="forms-sample"  action="../proses/peserta-input-proses.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Nama</label>
                      <input type="text" class="form-control" name="nama_peserta" placeholder="Nama">
                    </div>
                    <div class="form-group">
                      <tr>
                        <label class="exampleTextarea1">Jenis Kelamin</label><br>
                          <td class="form-control"><input type="radio" name="jenis_kelamin" value="L">L</td>
                      </tr>
                      <tr>
                        <td class="label-formulir"></td>
                        <td class="form-control"><input type="radio" name="jenis_kelamin" value="P">P</td>
                      </tr>
                    </div>
                       <div class="form-group">
                      <label for="exampleTextarea1">Alamat</label>
                      <textarea class="form-control" rows="4" name="alamat"></textarea>
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
