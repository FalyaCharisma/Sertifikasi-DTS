<?php
include'../koneksi.php'; //menyisipkan/mamanggil file koneksi.php untuk koneksi dengan database

$id_skema = $_POST['id_skema'];
$skema = $_POST['skema'];
$tanggal = $_POST['tanggal'];
$tempat = $_POST['tempat'];

if(isset($_POST['simpan'])){

	$sql = "INSERT INTO jadwal VALUES('$id_skema', '$skema', '$tanggal', '$tempat')";
	$query = mysqli_query($db, $sql);

	header("location:../index.php?p=sertifikasi");
}
?>