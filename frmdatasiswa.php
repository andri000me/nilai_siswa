<?php 
include "koneksi.php";
if (isset($_POST['submit'])){
		$sql = "INSERT INTO data_siswa (
									noinduk, 
									nama, 
									agama, 
									jenis_kelamin, 
									alamat, 
									no_telepon) VALUES 
														(
														'".$_POST['noinduk']."', 
														'".$_POST['nama']."', 
														'".$_POST['agama']."', 
														'".$_POST['jenis_kelamin']."', 
														'".$_POST['alamat']."', 
														'".$_POST['no_tlpn']."'
														)";
		mysqli_query($koneksi,$sql);
	}
?>
<html>
	<head>
		<title> Data_Siswa </title>
			<basefont face="Arial">
				</head>
					<body>
						<fieldset style="width: 50%; margin: auto;">
							<legend>Input data siswa</legend>
								<form action="input_siswa.php" method="POST">
									<table width="540" border="0">
										<tr>
											<td width="351">noinduk</td>
											<td width="15">:</td>
											<td><input type="text" name="noinduk"></td>
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
											<td><textarea name="jenis_kelamin" cols="50" required></textarea></td>
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
		<h1 align="center">Tabel Siswa</h1>
			<table border="1">
				<thead>
					<tr>
						<th>noinduk</th>
						<th>Nama</th>
						<th>Agama</th>
						<th>Jenis Kelamin</th>
						<th>Status</th>
						<th>Alamat</th>
						<th>No Tlpn</th>
						<th>Action</th>
					</tr>
				</thead>
    
					<tbody>
<?php 
					// Tampilkan data dari Database
					$sql = "SELECT * FROM data_siswa";
					$tampil = mysqli_query($koneksi,$sql);
					$no =0;
					while ($tampilkan = mysqli_fetch_array($tampil))	
{ 
					$no++;
?>
				<tr>
					<td><?php echo $tampilkan['noinduk']; ?></td>
					<td><?php echo $tampilkan['nama']; ?></td>
					<td><?php echo $tampilkan['agama']; ?></td>
					<td> <?php echo $tampilkan['jenis_kelamin']; ?></td>
					<td> <?php echo $tampilkan['status']; ?></td>
					<td> <?php echo $tampilkan['alamat']; ?></td>
					<td> <?php echo $tampilkan['no_telepon']; ?></td>
					<td>	
						<a href="hapusguru.php?noinduk=<?php echo $tampilkan['noinduk']; ?>">
						<input type="button" onclick="return confirm('Anda Mau Hapus Data <?php echo $tampilkan['noinduk']; ?> ?');" value="Hapus"></a> | 
						<a href="editguru.php?noinduk=<?php echo $tampilkan['noinduk']; ?>"><input type="button" value="Edit"/>
						
					</td>
				</tr>

<?php
}
?>
				</tbody>
		</table>
