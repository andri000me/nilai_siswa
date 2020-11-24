<?php 
include "koneksi.php";
if (isset($_POST['submit'])){
		$sql = "INSERT INTO data_guru (
									nip, 
									nama, 
									agama, 
									jk, 
									status, 
									alamat, 
									no_tlpn) VALUES 
														(
														'".$_POST['nip']."', 
														'".$_POST['nama']."', 
														'".$_POST['agama']."', 
														'".$_POST['jk']."', 
														'".$_POST['status']."', 
														'".$_POST['alamat']."', 
														'".$_POST['no_tlpn']."'
														)";
		mysql_query($sql);
	}
?>
<html>
	<head>
		<title> Input Guru </title>
			<basefont face="Arial">
				</head>
					<body>
						<fieldset style="width: 50%; margin: auto;">
							<legend>Input Guru</legend>
								<form action="input_guru.php" method="POST">
									<table width="540" border="0">
										<tr>
											<td width="351">NIP</td>
											<td width="15">:</td>
											<td><input type="text" name="nip"></td>
										</tr>
										<tr>
											<td width="351">Nama</td>
											<td width="15">:</td>
											<td><input type="text" name="nama"></td>
										</tr>
										<tr>
											<td width="351">Agama</td>
											<td width="15">:</td>
											<td><textarea name="agama" cols="50" required></textarea></td>
										</tr>
										<tr>
											<td width="351">Jenis Kelamin</td>
											<td width="15">:</td>
											<td><textarea name="jk" cols="50" required></textarea></td>
										</tr>
										<tr>
											<td width="351">Status</td>
											<td width="15">:</td>
											<td><textarea name="status" cols="50" required></textarea></td>
										</tr>
										<tr>
											<td width="351">Alamat</td>
											<td width="15">:</td>
											<td><textarea name="alamat" cols="50" required></textarea></td>
										</tr>
										<tr>
											<td width="351">No Telepon</td>
											<td width="15">:</td>
											<td><textarea name="no_tlpn" cols="50" required></textarea></td>
										</tr>
										<tr>
											<td>
												<input type="submit" name="submit" value="Simpan"/>
												<input type="reset" name="batal" value="Batal">
												<a href="cari.php"><input type="button" value="Cari"/>
											</td>
										</tr>
									</table>
								</form>
							</fieldset>
	<style>
    tbody > tr:nth-child(2n+1) > td, tbody > tr:nth-child(2n+1) > th {
        background-color: #white;
    }
    table{
        width: 70%;
        margin: auto;
        border-collapse: collapse;
        box-shadow: darkgrey 3px;
    }
    thead tr {
        background-color: #36c2ff;
    }
	</style>
		<h1 align="center">Tabel Guru</h1>
			<table border="1">
				<thead>
					<tr>
						<th>Nip</th>
						<th>Nama</th>
						<th>Agama</th>
						<th>Jenis Kelamin</th>
						<th>Status</th>
						<th>Alamat</th>
						<th>No Telepon</th>
						<th>Action</th>
					</tr>
				</thead>
    
					<tbody>
<?php 
					// Tampilkan data dari Database
					$sql = "SELECT * FROM data_guru";
					$tampil = mysql_query($sql);
					$no =0;
					while ($tampilkan = mysql_fetch_array($tampil))	
{ 
					$no++;
?>
				<tr>
					<td><?php echo $tampilkan['nip']; ?></td>
					<td><?php echo $tampilkan['nama']; ?></td>
					<td><?php echo $tampilkan['agama']; ?></td>
					<td> <?php echo $tampilkan['jk']; ?></td>
					<td> <?php echo $tampilkan['status']; ?></td>
					<td> <?php echo $tampilkan['alamat']; ?></td>
					<td> <?php echo $tampilkan['no_tlpn']; ?></td>
					<td>	
						<a href="hapusguru.php?nip=<?php echo $tampilkan['nip']; ?>">
						<input type="button" onclick="return confirm('Anda Mau Hapus Data <?php echo $tampilkan['nip']; ?> ?');" value="Hapus"></a> | 
						<a href="editguru.php?nip=<?php echo $tampilkan['nip']; ?>"><input type="button" value="Edit"/>
						
					</td>
				</tr>

<?php
}
?>
				</tbody>
		</table>
