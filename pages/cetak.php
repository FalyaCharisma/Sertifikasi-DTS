<?php
include'../koneksi.php'; 
require("../vendor/autoload.php");


?>

<html>
<link rel="stylesheet" type="text/css" href="../style.css">
<body>
<h3>Data Peserta Sertifikasi</h3>
<div id="content">
	<table border="1" id="tabel-tampil">
		<thead>
			<tr>
				<th>ID Peserta</th>
				<th>Nama Lengkap</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$nomor = 1;
				$query = "SELECT * FROM peserta ORDER BY id_peserta DESC";
				$q_tampil_peserta = mysqli_query($db, $query);

				if(mysqli_num_rows($q_tampil_peserta)>0){
					//looping semua data tabel tbanggota
					while ($r_tampil_peserta=mysqli_fetch_array($q_tampil_peserta)) {
						?>
						<tr>
							<td><?php echo $r_tampil_peserta['id_peserta']; ?></td>
							<td><?php echo $r_tampil_peserta['nama_peserta']; ?></td>
							<td><?php echo $r_tampil_peserta['jenis_kelamin']; ?></td>
							<td><?php echo $r_tampil_peserta['alamat']; ?></td>
						</tr>
						<?php
								$nomor++;
					} // end looping
				} //end if
			?>
		</tbody>
	</table>
</div>
</body>
</html>
<?php 

$html = ob_get_clean(); 
use Dompdf\Dompdf; 
require_once '../vendor/autoload.php'; 
$dompdf = new Dompdf(); 
$dompdf->loadHtml($html); 
$dompdf->setPaper('A4', 'portrait'); 
$dompdf->render(); 
$dompdf->stream(); 
?>