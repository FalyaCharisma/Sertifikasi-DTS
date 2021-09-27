<?php 

include'../koneksi.php'; 
    $id_skema = $_GET['id'];
    $q_tampil_jadwal = mysqli_query($db, "SELECT * FROM jadwal WHERE id_skema = '$id_skema'");
    $r_tampil_jadwal = mysqli_fetch_array($q_tampil_jadwal);
?>

<?php
include'header.php'; 
?>
   
      <div class="main-panel">
        <div class="content-wrapper">
           <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Jadwal Sertifikasi</h4>
                  <form class="forms-sample"  action="../proses/sertifikasi-edit-proses.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">ID Skema</label>
                      <input type="text" class="form-control" name="id_skema" value="<?php echo $r_tampil_jadwal['id_skema'];?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Skema</label>
                      <input type="text" class="form-control" name="skema" class="isian-formulir isian-formulir-border" value="<?php echo $r_tampil_jadwal['skema'];?>">
                    </div>
                      <div class="form-group">
                      <label for="exampleTextarea1">Tanggal</label>
                      <input type="date" name="tanggal" value="<?php echo $r_tampil_jadwal['tanggal'];?>" class="isian-formulir isian-formulir-border">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Tempat</label>
                      <input type="text" class="form-control" name="tempat" class="isian-formulir isian-formulir-border" value="<?php echo $r_tampil_jadwal['tempat'];?>">
                    </div>
                    <button type="submit" name="simpan" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>

<?php
include'footer.php'; 
?>
