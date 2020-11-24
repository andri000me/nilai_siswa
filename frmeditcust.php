 <?php 
include "koneksi.php";

// Jika Tombol Simpan ditekan
if (isset($_POST['submit'])){
// Cek Jika Input Masih ada yang Kosong
if ((!empty($_POST['CUST_CODE'])) || (!empty($_POST['CUTS_NAME'])) || (!empty($_POST['ALMT_CMPY'])) || (!empty($_POST['ALMT_DELV']))){
// Update Data
$sql = "UPDATE tb_custxm SET CUST_CODE= '".$_POST['CUST_CODE']."', CUTS_NAME = '".$_POST['CUTS_NAME']."', ALMT_CMPY = '".$_POST['ALMT_CMPY']."', ALMT_DELV = '".$_POST['ALMT_DELV']."' WHERE CUST_CODE = '".$_GET['CUST_CODE']."'";
$simpan = mysql_query($sql);

if ($simpan) {
echo "<script>alert('Data Berhasil di Update'); window.location='frmcust.php';</script>";
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
		<title>Edit Customer</title>
	</head>
		<body>

<?php 
// Ambil data Berdasarkan Kode Customer
$sql = "SELECT * FROM tb_custxm WHERE CUST_CODE = '".$_GET['CUST_CODE']."'";
$tampil = mysql_query($sql);
while ($tampilkan = mysql_fetch_array($tampil)){ ?>

		<fieldset style="width: 50%; margin: auto;">
			<legend>Form Edit Customer</legend>
				<form name="form1" method="post" action="">
					<table width="540" border="0">
						<tr>
							<td width="351">Customer Code</td>
							<td width="15">:</td>
							<td><input type="text" name="CUST_CODE" value="<?php echo $tampilkan['CUST_CODE']; ?>"></td>
						</tr>
						<tr>
							<td width="351">Customer Name</td>
							<td width="15">:</td>
							<td><input type="text" name="CUTS_NAME" value="<?php echo $tampilkan['CUTS_NAME']; ?>"></td>
						</tr>
						<tr>
							<td width="351">Alamat Penerima</td>
							<td width="15">:</td>
							<td><textarea name="ALMT_CMPY" cols="50" required><?php echo $tampilkan['ALMT_CMPY']; ?></textarea></td>
						</tr>
						<tr>
							<td width="351">Alamat Pengirim</td>
							<td width="15">:</td>
							<td><textarea name="ALMT_DELV" cols="50" required><?php echo $tampilkan['ALMT_DELV']; ?></textarea></td>
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