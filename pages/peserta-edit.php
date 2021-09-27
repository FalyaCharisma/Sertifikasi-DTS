<?php
session_start();

include'../koneksi.php';

$tgl = date('Y-m-d');

if(isset($_SESSION['sesi']) && !empty($_SESSION['sesi'])){
?>

<?php 

include'../koneksi.php'; 
    $id_peserta = $_GET['id'];
    $q_tampil_peserta = mysqli_query($db, "SELECT * FROM peserta WHERE id_peserta = '$id_peserta'");
    $r_tampil_peserta = mysqli_fetch_array($q_tampil_peserta);
?>

<?php
include'header.php'; 
?>
      <div class="main-panel">
        <div class="content-wrapper">
           <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Data Peserta</h4>
                  <form class="forms-sample"  action="../proses/peserta-edit-proses.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">ID Peserta</label>
                      <input type="text" class="form-control" name="id_peserta" value="<?php echo $r_tampil_peserta['id_peserta'];?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama_peserta" class="isian-formulir isian-formulir-border" value="<?php echo $r_tampil_peserta['nama_peserta'];?>">
                    <div class="form-group">
                      <tr>
                        <label class="exampleTextarea1">Jenis Kelamin</label><br>
                          <?php 
                            if ($r_tampil_peserta['jenis_kelamin']=="P") {
                                echo "<td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='P' checked>P</label></td>
                                  </tr>
                                 </td>
                                 <td class='isian-formulir'><input type='radio' name='jenis_kelamin'>L</label></td>
                                  </tr>
                                 </td>";
                            } elseif ($r_tampil_peserta['jenis_kelamin']=="L") {
                                  echo "<td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='L' checked>L</label></td>
                                  </tr>
                                 </td>
                                <td class='isian-formulir'><input type='radio' name='jenis_kelamin'>P</label></td>
                                  </tr>
                                 </td>
                                 ";
                              }
                          ?>
                </td>
                 </div>
                      <div class="form-group">
                      <label for="exampleTextarea1">Alamat</label>
                      <textarea class="form-control" rows="4" name="alamat"><?php echo $r_tampil_peserta['alamat'];?></textarea>
                    </div>
                    
                    <button type="submit" name="simpan" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </tr>
        </div>

<?php
include'footer.php'; 
?>
 <?php
} else {
  echo"<script>alert('Anda Harus Login Dahulu'); </script>";
  header('location:../login.php');
}
?>