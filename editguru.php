 <?php 
include "koneksi.php";

// Jika Tombol Simpan ditekan
if (isset($_POST['submit'])){
// Cek Jika Input Masih ada yang Kosong
if ((!empty($_POST['nip'])) || (!empty($_POST['nama'])) || (!empty($_POST['jk'])) || (!empty($_POST['status']))|| (!empty($_POST['alamat']))|| (!empty($_POST['no_tlpn']))){
// Update Data
$sql = "UPDATE data_guru SET 
								nip= '".$_POST['nip']."', 
								nama = '".$_POST['nama']."', 
								agama = '".$_POST['agama']."', 
								jk = '".$_POST['jk']."', 
								alamat = '".$_POST['alamat']."', 
								no_tlpn = '".$_POST['no_tlpn']."' 
								WHERE nip = '".$_GET['nip']."'";
$simpan = mysql_query($sql);

if ($simpan) {
echo "<script>alert('Data Berhasil di Update'); window.location='input_guru.php';</script>";
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
		<title>Edit Guru</title>
	</head>
		<body>

<?php 
// Ambil data Berdasarkan Kode Customer
$sql = "SELECT * FROM data_guru WHERE nip = '".$_GET['nip']."'";
$tampil = mysql_query($sql);
while ($tampilkan = mysql_fetch_array($tampil)){ ?>

		<fieldset style="width: 50%; margin: auto;">
			<legend>Form Edit guru</legend>
				<form name="form1" method="post" action="">
					<table width="540" border="0">
						<tr>
							<td width="351">NIP</td>
							<td width="15">:</td>
							<td><input type="text" name="nip" value="<?php echo $tampilkan['nip']; ?>"></td>
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
							<td width="351">Jk</td>
							<td width="15">:</td>
							<td><textarea name="jk" cols="50" required><?php echo $tampilkan['jk']; ?></textarea></td>
						</tr>
						<tr>
							<td width="351">Status</td>
							<td width="15">:</td>
							<td><textarea name="status" cols="50" required><?php echo $tampilkan['status']; ?></textarea></td>
						</tr>
						<tr>
							<td width="351">Alamat</td>
							<td width="15">:</td>
							<td><textarea name="alamat" cols="50" required><?php echo $tampilkan['alamat']; ?></textarea></td>
						</tr>
						<tr>
							<td width="351">No_Tlpn</td>
							<td width="15">:</td>
							<td><textarea name="no_tlpn" cols="50" required><?php echo $tampilkan['no_tlpn']; ?></textarea></td>
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