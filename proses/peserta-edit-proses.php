<?php
include'../koneksi.php'; 

$id_peserta = $_POST['id_peserta'];
$nama_peserta = $_POST['nama_peserta'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];

if(isset($_POST['simpan'])){ //cek jika ada form yang disubmit
	
	mysqli_query($db, "UPDATE peserta
						SET nama_peserta='$nama_peserta', jenis_kelamin='$jenis_kelamin', alamat='$alamat'
						WHERE id_peserta = '$id_peserta'");

	header("location:../pages/peserta.php");
}
?>