<?php 
include "koneksi.php";
if (isset($_POST['submit'])){
		$sql = "INSERT INTO mata_pelajaran (
									kode_mapel, 
									nama, 
									keterangan) VALUES 
														(
														'".$_POST['kode_mapel']."', 
														'".$_POST['nama']."', 
														'".$_POST['keterangan']."' 
														)";
		mysql_query($sql);
	}
?>
<html>
	<head>
		<title> Input Mata_Pelajaran </title>
			<basefont face="Arial">
				</head>
					<body>
						<fieldset style="width: 50%; margin: auto;">
							<legend>input_mata_pelajaran</legend>
								<form action="input_mata_pelajaran.php" method="POST">
									<table width="540" border="0">
										<tr>
											<td width="351">Kode_mapel</td>
											<td width="15">:</td>
											<td><input type="text" name="kode_mapel"></td>
										</tr>
										<tr>
											<td width="351">Nama</td>
											<td width="15">:</td>
											<td><input type="text" name="nama"></td>
										</tr>
										<tr>
											<td width="351">Keterangan</td>
											<td width="15">:</td>
											<td><textarea name="keterangan" cols="50" required></textarea></td>
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
		<h1 align="center">mata_pelajaran</h1>
			<table border="1">
				<thead>
					<tr>
						<th>kode_mapel</th>
						<th>Nama</th>
						<th>Keterangan</th>
						<th> action</th>
					</tr>
				</thead>
    
					<tbody>
<?php 
					// Tampilkan data dari Database
					$sql = "SELECT * FROM mata_pelajaran";
					$tampil = mysql_query($sql);
					$no =0;
					while ($tampilkan = mysql_fetch_array($tampil))	
{ 
					$no++;
?>
				<tr>
					<td><?php echo $tampilkan['kode_mapel']; ?></td>
					<td><?php echo $tampilkan['nama']; ?></td>
					<td><?php echo $tampilkan['keterangan']; ?></td>
					<td>	
						<a href="hapusmatapelajaran.php?kode_mapel=<?php echo $tampilkan['kode_mapel']; ?>">
						<input type="button" onclick="return confirm('Anda Mau Hapus Data <?php echo $tampilkan['kode_mapel']; ?> ?');" value="Hapus"></a> | 
						<a href="editmatapelajaran.php?kode_mapel=<?php echo $tampilkan['kode_mapel']; ?>"><input type="button" value="Edit"/>
						
					</td>
				</tr>

<?php
}
?>
				</tbody>
		</table>
