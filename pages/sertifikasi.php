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
                  <h4 class="card-title">Jadwal Sertifikasi</h4>
                  <a href="sertifikasi-input.php" class="card-title"><h6>Tambah Jadwal Sertifikasi</h6></a>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>ID Skema</th>
                          <th>Skema</th>
                          <th>Tanggal Sertifikasi</th>
                          <th>Tempat</th>
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
                                $sql = "SELECT * FROM jadwal WHERE skema LIKE '%$pencarian%'
                                    OR id_skema LIKE '%$pencarian%'
                                    OR tanggal LIKE '%$pencarian%'
                                    OR tempat LIKE '%$pencarian%'";
                                $query = $sql;
                                $queryJml = $sql;

                              } else {
                                $query = "SELECT * FROM jadwal LIMIT $posisi, $batas";
                                $queryJml = "SELECT * FROM jadwal";
                                $no = $posisi * 1;
                              }
                            }
                            else{
                              $query = "SELECT * FROM jadwal LIMIT $posisi, $batas";
                              $queryJml = "SELECT * FROM jadwal";
                              $no = $posisi * 1;
                            }

                            //select from tbanggota
                            $q_tampil_jadwal = mysqli_query($db, $query);

                              if(mysqli_num_rows($q_tampil_jadwal)> 0){

                                  /*looping data anggota sesuai yang ada di database */
                                  while ($r_tampil_jadwal=mysqli_fetch_array($q_tampil_jadwal)) {
                                
                                ?>
                                <tr>
                                  <td><?php echo $r_tampil_jadwal['id_skema']; ?></td>
                                  <td><?php echo $r_tampil_jadwal['skema']; ?></td>
                                  <td><?php echo $r_tampil_jadwal['tanggal']; ?></td>
                                  <td><?php echo $r_tampil_jadwal['tempat']; ?></td>
                                  <td>
                                    <div class="tombol-opsi-container"><a href="sertifikasi-edit.php?id=<?php echo $r_tampil_jadwal['id_skema'];?>" class="tombol">Edit</a>
                                    </div>
                                    <div class="tombol-opsi-container"><a href="../proses/sertifikasi-hapus.php?id=<?php echo $r_tampil_jadwal['id_skema'];?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol">Hapus</a>
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
                                echo "<a href=\"?p=pendaftaran&hal=$i\">$i</a>";
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