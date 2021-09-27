<?php
include'../koneksi.php'; //menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data

$id_peserta = $_GET['id'];

mysqli_query($db, "DELETE FROM peserta WHERE id_peserta ='$id_peserta'");

header("location:../pages/peserta.php");
?>