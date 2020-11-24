 <?php 
include "koneksi.php";

// Jika Tombol Simpan ditekan
if (isset($_POST['submit'])){
// Cek Jika Input Masih ada yang Kosong
if ((!empty($_POST['kode_mapel'])) || (!empty($_POST['nama'])) || (!empty($_POST['keterangan']))){
// Update Data
$sql = "UPDATE mata_pelajaran SET 
								kode_mapel= '".$_POST['kode_mapel']."', 
								nama = '".$_POST['nama']."', 
								keterangan = '".$_POST['keterangan']."' 
								WHERE kode_mapel = '".$_GET['kode_mapel']."'";
$simpan = mysql_query($sql);

if ($simpan) {
echo "<script>alert('Data Berhasil di Update'); window.location='input_mata_pelajaran.php';</script>";
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
		<title>Edit matapelajaran</title>
	</head>
		<body>

<?php 
// Ambil data Berdasarkan Kode Customer
$sql = "SELECT * FROM mata_pelajaran WHERE kode_mapel = '".$_GET['kode_mapel']."'";
$tampil = mysql_query($sql);
while ($tampilkan = mysql_fetch_array($tampil))
{ 
?>

		<fieldset style="width: 50%; margin: auto;">
			<legend>Form Editmatapelajaran</legend>
				<form name="form1" method="post" action="">
					<table width="540" border="0">
						<tr>
							<td width="351">kode_mapel</td>
							<td width="15">:</td>
							<td><input type="text" name="kode_mapel" value="<?php echo $tampilkan['kode_mapel']; ?>"></td>
						</tr>
						<tr>
							<td width="351">Nama</td>
							<td width="15">:</td>
							<td><input type="text" name="nama" value="<?php echo $tampilkan['nama']; ?>"></td>
						</tr>
						<tr>
							<td width="351">Keterangan</td>
							<td width="15">:</td>
							<td><textarea name="keterangan" cols="50" required><?php echo $tampilkan['keterangan']; ?></textarea></td>
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