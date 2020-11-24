<?php 
include "koneksi.php";

// Jika Tombol Simpan ditekan
if (isset($_POST['submit'])){
// Cek Jika Input Masih ada yang Kosong
if (
		(!empty($_POST['no_induk'])) || 
		(!empty($_POST['nama'])) || 
		(!empty($_POST['kode_mapel'])) || 
		(!empty($_POST['tugas'])) || 
		(!empty($_POST['uts'])) || 
		(!empty($_POST['uas'])) ||
		(!empty($_POST['keterangan']))){
// Update Data
$sql = "UPDATE nilai SET no_induk= '".$_POST['no_induk']."', 
							nama = '".$_POST['nama']."', 
							kode_mapel = '".$_POST['kode_mapel']."', 
							tugas = '".$_POST['tugas']."', 
							uts = '".$_POST['uts']."', 
							uas = '".$_POST['uas']."', 
							keterangan = '".$_POST['keterangan']."' 
							WHERE no_induk = '".$_GET['no_induk']."'";
$simpan = mysql_query($sql);

if ($simpan) {
echo "<script>alert('Data Berhasil di Update'); window.location='frmnilai.php';</script>";
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
<title> Edit Data Nilai </title>
</head>
<body>
 
 <?php 
// Ambil data Berdasarkan ID
$sql = "SELECT * FROM nilai WHERE no_induk= '".$_GET['no_induk']."'";
$tampil = mysql_query($sql);
while ($data = mysql_fetch_array($tampil)){ ?>

<form name="form1" method="post" action="">
<table width="400" border="0">
<tr>
	<td>no_induk</td>
	<td><input type="text" name="no_induk" value="<?php echo $data['no_induk']; ?>"></td>
	</tr>
<tr>
	<td>nama</td>
	<td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
	</tr>
<tr>
	<td>kode_mapel</td><td><textarea name="kode_mapel" cols="30" rows="5"><?php echo $data['kode_mapel']; ?></textarea></td>
	</tr>
<tr>
	<td>tugas</td><td><textarea name="tugas" cols="30" rows="5"><?php echo $data['tugas']; ?></textarea></td>
	</tr>
<tr>
	<td>uts</td><td><textarea name="uts" cols="30" rows="5"><?php echo $data['uts']; ?></textarea></td>
	</tr>
<tr>
	<td>uas</td><td><textarea name="uas" cols="30" rows="5"><?php echo $data['uas']; ?></textarea></td>
	</tr>
<tr>
	<td>keterangan</td><td><textarea name="keterangan" cols="30" rows="5"><?php echo $data['keterangan']; ?></textarea></td>
	</tr>
	
</table>
<?php 
} 
?>
<tr><td colspan="2"><left>
<input type="submit" name="submit" value="Update"/>
</form>

</body>

</html>