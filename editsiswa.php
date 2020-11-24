 <?php 
include "koneksi.php";

// Jika Tombol Simpan ditekan
if (isset($_POST['submit'])){
// Cek Jika Input Masih ada yang Kosong
if ((!empty($_POST['noinduk'])) || (!empty($_POST['nama'])) || (!empty($_POST['agama'])) || (!empty($_POST['jenis_kelamin']))|| (!empty($_POST['alamat']))|| (!empty($_POST['no_tlpn']))){
// Update Data
$sql = "UPDATE data_siswa SET 
								noinduk= '".$_POST['noinduk']."', 
								nama = '".$_POST['nama']."', 
								agama = '".$_POST['agama']."', 
								jenis_kelamin = '".$_POST['jenis_kelamin']."', 
								alamat = '".$_POST['alamat']."', 
								no_telepon = '".$_POST['no_tlpn']."' 
								WHERE noinduk = '".$_GET['noinduk']."'";
$simpan = mysqli_query($koneksi,$sql);

if ($simpan) {
echo "<script>alert('Data Berhasil di Update'); window.location='input_siswa.php';</script>";
} else { 
echo "<script>alert('Gagal Di Update');</script>";
}
// Jika Inputan Masih ada yang Kosong
} else {
echo "<script>alert('Input Masih ada yang Kosong'); history-go(-1);</script>";
}
}

?>

<html>
	<head>
		<title>Edit Siswa</title>
	</head>
		<body>

<?php 
// Ambil data Berdasarkan Kode Customer
$sql = "SELECT * FROM data_siswa WHERE noinduk = '".$_GET['noinduk']."'";
$tampil = mysqli_query($koneksi,$sql);
while ($tampilkan = mysqli_fetch_array($tampil))
{ 
?>

		<fieldset style="width: 50%; margin: auto;">
			<legend>Form Edit siswa</legend>
				<form name="form1" method="post" action="">
					<table width="540" border="0">
						<tr>
							<td width="351">noinduk</td>
							<td width="15">:</td>
							<td><input type="text" name="noinduk" value="<?php echo $tampilkan['noinduk']; ?>"></td>
						</tr>
						<tr>
							<td width="351">Nama</td>
							<td width="15">:</td>
							<td><input type="text" name="nama" value="<?php echo $tampilkan['nama']; ?>"></td>
						</tr>
						<tr>
							<td width="351">Agama</td>
							<td width="15">:</td>
							<td><textarea name="agama" cols="50" required><?php echo $tampilkan['agama']; ?></textarea></td>
						</tr>
						<tr>
							<td width="351">Jenis_kelamin</td>
							<td width="15">:</td>
							<td><textarea name="jenis_kelamin" cols="50" required><?php echo $tampilkan['jenis_kelamin']; ?></textarea></td>
						</tr>
						<tr>
							<td width="351">Alamat</td>
							<td width="15">:</td>
							<td><textarea name="alamat" cols="50" required><?php echo $tampilkan['alamat']; ?></textarea></td>
						</tr>
						<tr>
							<td width="351">No_Tlpn</td>
							<td width="15">:</td>
							<td><textarea name="no_tlpn" cols="50" required><?php echo $tampilkan['no_telepon']; ?></textarea></td>
						</tr>
					</table>
<?php 
} 
?>
						<tr><td colspan="2"><left>
							<input type="submit" name="submit" value="Update"/>
								</left></td></tr>
				</fieldset>
			</form>
		</body>
</html>