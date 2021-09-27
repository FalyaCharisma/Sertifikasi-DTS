<?php
include'../koneksi.php'; //menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data

$id_skema = $_GET['id'];

mysqli_query($db, "DELETE FROM jadwal WHERE id_skema ='$id_skema'");

header("location:../pages/sertifikasi.php");
?>