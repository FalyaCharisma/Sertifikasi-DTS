<?php
session_start();
$_SESSION['sesi'] = NULL;

include "koneksi.php";
	if( isset($_POST['submit']))
	{
		$username = isset($_POST['username']) ? $_POST['username'] : "";
		$password = isset($_POST['password']) ? $_POST['password'] : "";
		$qry = mysqli_query($db, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
		$sesi = mysqli_num_rows($qry);

		if ($sesi == 1){
			$data_admin = mysqli_fetch_array($qry);
			$_SESSION['id_admin'] = $data_admin['id_admin'];
			$_SESSION['sesi'] = $data_admin['nama_admin'];

			echo "<script>alert('Anda berhasil Log In'); </script>";
			echo "<meta http-equiv='refresh' content='0; url=index.php?user=$sesi'>";
		}
		else
		{
			echo "<meta http-equiv='refresh' content='0; url=login.php'>";
			echo "<script>alert('Anda Gagal Log In'); </script>";
		}
	}
?>