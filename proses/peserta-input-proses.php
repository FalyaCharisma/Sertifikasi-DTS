<?php
include'../koneksi.php'; //menyisipkan/mamanggil file koneksi.php untuk koneksi dengan database

$id_peserta = $_POST['id_peserta'];
$nama_peserta = $_POST['nama_peserta'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];

if(isset($_POST['simpan'])){
	$sql = "INSERT INTO peserta VALUES('$id_peserta', '$nama_peserta', '$jenis_kelamin','$alamat')";
	$query = mysqli_query($db, $sql);

	header("location:../pages/peserta.php");
}
?>