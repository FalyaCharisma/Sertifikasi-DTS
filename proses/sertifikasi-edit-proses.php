<?php
include'../koneksi.php'; 

$id_skema = $_POST['id_skema'];
$skema = $_POST['skema'];
$tanggal = $_POST['tanggal'];
$tempat = $_POST['tempat'];


if(isset($_POST['simpan'])){ //cek jika ada form yang disubmit
	
	mysqli_query($db, "UPDATE jadwal
						SET skema='$skema', tanggal='$tanggal', tempat='$tempat'
						WHERE id_skema = '$id_skema'");

	header("location:../pages/sertifikasi.php");
}
?>