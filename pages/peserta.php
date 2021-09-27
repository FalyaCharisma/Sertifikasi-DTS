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
                  <h4 class="card-title">Peserta Sertifikasi</h4>
                  <a href="peserta-input.php" class="card-title"><h6>Tambah Peserta Sertifikasi</h6></a>
                  <a target="_blank" href="cetak.php"><img src="../images/printer.png" height="35px"></a>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>ID Peserta</th>
                          <th>Nama Lengkap</th>
                          <th>Jenis Kelamin</th>
                          <th>Alamat</th>
                          <th>Tindakan</th>
                        </tr>
                      </thead>
                          <tbody>
                            <?php
                            $batas=5;
                            extract($_GET);
                            if(empty($hal)){
                              $posisi = 0;
                              $hal = 1;
                              $nomor = 1;
                            } else {
                              $posisi = ($hal-1) * $batas;
                              $nomor = $posisi+1;
                            }

                            if($_SERVER['REQUEST_METHOD'] == "POST"){
                              $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
                              if($pencarian != ""){
                                $sql = "SELECT * FROM peserta WHERE nama_peserta LIKE '%$pencarian%'
                                    OR id_peserta LIKE '%$pencarian%'
                                    OR jenis_kelamin LIKE '%$pencarian%'
                                    OR alamat LIKE '%$pencarian%'";
                                $query = $sql;
                                $queryJml = $sql;

                              } else {
                                $query = "SELECT * FROM peserta LIMIT $posisi, $batas";
                                $queryJml = "SELECT * FROM peserta";
                                $no = $posisi * 1;
                              }
                            }
                            else{
                              $query = "SELECT * FROM peserta LIMIT $posisi, $batas";
                              $queryJml = "SELECT * FROM peserta";
                              $no = $posisi * 1;
                            }

                            //select from tbanggota
                            $q_tampil_peserta = mysqli_query($db, $query);

                              if(mysqli_num_rows($q_tampil_peserta)> 0){

                                  /*looping data anggota sesuai yang ada di database */
                                  while ($r_tampil_peserta=mysqli_fetch_array($q_tampil_peserta)) {
                                
                                ?>
                                <tr>
                                  <td><?php echo $r_tampil_peserta['id_peserta']; ?></td>
                                  <td><?php echo $r_tampil_peserta['nama_peserta']; ?></td>
                                  <td><?php echo $r_tampil_peserta['jenis_kelamin']; ?></td>
                                  <td><?php echo $r_tampil_peserta['alamat']; ?></td>
                                  <td>
                                    <div class="tombol-opsi-container"><a href="peserta-edit.php?id=<?php echo $r_tampil_peserta['id_peserta'];?>" class="tombol">Edit</a>
                                    </div>
                                    <div class="tombol-opsi-container"><a href="../proses/peserta-hapus.php?id=<?php echo $r_tampil_peserta['id_peserta'];?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol">Hapus</a>
                                    </div>
                                  </td>
                                </tr>
                                <?php 
                                    $nomor++;
                              } //selesai looping while 
                            }
                            else{
                              echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
                            }
                            ?>
                          </tbody>
                    </table>
                      <?php
                        if(isset($_POST['pencarian'])){
                          if($_POST['pencarian']!=' '){
                            echo "<div style=\"float:left;\">";
                            $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
                            echo "Data Hasil Pencarian: <b>$jml</b>";
                          }
                        } else {
                        ?>
                          <div style="float: left;">
                            <?php
                              $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
                              echo "Jumlah Data : $jml";
                            ?>
                          </div>
                          <div style="float: right;">
                            <br>
                            <?php 
                            $jml_hal = ceil($jml / $batas);
                            for($i = 1; $i <= $jml_hal; $i++){
                              if($i != $hal){
                                echo "<a href=\"?p=peserta&hal=$i\">$i</a>";
                              } else {
                                echo "<a class=\"active\">$i</a>";
                              }
                            }
                            ?>
                          </div>
                        <?php
                        }
                        ?>
                  </div>
                </div>
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