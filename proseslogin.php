<?php
	session_start();
	include 'koneksi.php';
	error_reporting (E_ALL ^ (E_NOTICE | E_WARNING)) ;
	$username = $_POST ['username'];
	$password = $_POST ['password'];
	$cekuser= mysqli_query ($koneksi,"SELECT * FROM user WHERE username='$username'
				AND password='$password' limit 0,1");
	$jumlah = mysqli_num_rows ($cekuser);
	$hasil = mysqli_fetch_array ($cekuser);
	if ($jumlah == 0) {
		echo "Username/Password Salah <br>";
			echo "<a href='index.php'>Kembali</a>";
		} else {
			$_SESSION['user'] = $hasil ['username'];
			header('location:menu.php');
		}
?>		