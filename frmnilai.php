<?php 
include "koneksi.php";
if (isset($_POST['submit'])){
		$sql = "INSERT INTO nilai (
									no_induk, 
									nama, 
									kode_mapel, 
									tugas, 
									uts, 
									uas, 
									keterangan) VALUES 
														(
														'".$_POST['no_induk']."', 
														'".$_POST['nama']."', 
														'".$_POST['kode_mapel']."', 
														'".$_POST['tugas']."', 
														'".$_POST['uts']."', 
														'".$_POST['uas']."', 
														'".$_POST['keterangan']."'
														)";
		mysqli_query($koneksi,$sql);
	}
?>
<html>
	<head>
		<title> Input Nilai </title>
			<basefont face="Arial">
				</head>
					<body>
						<fieldset style="width: 50%; margin: auto;">
							<legend>Input Nilai</legend>
								<form action="input_nilai.php" method="POST">
									<table width="540" border="0">
										<tr>
											<td width="351">No Induk</td>
											<td width="15">:</td>
											<td><input type="text" name="no_induk"></td>
										</tr>
										<tr>
											<td width="351">Nama</td>
											<td width="15">:</td>
											<td><input type="text" name="nama"></td>
										</tr>
										<tr>
											<td width="351">Kode Mapel</td>
											<td width="15">:</td>
											<td><textarea name="kode_mapel" cols="50" required></textarea></td>
										</tr>
										<tr>
											<td width="351">Tugas</td>
											<td width="15">:</td>
											<td><textarea name="tugas" cols="50" required></textarea></td>
										</tr>
										<tr>
											<td width="351">Uts</td>
											<td width="15">:</td>
											<td><textarea name="uts" cols="50" required></textarea></td>
										</tr>
										<tr>
											<td width="351">Uas</td>
											<td width="15">:</td>
											<td><textarea name="uas" cols="50" required></textarea></td>
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
		<h1 align="center">Tabel Nilai</h1>
			<table border="1">
				<thead>
					<tr>
						<th>No</th>
						<th>No Induk</th>
						<th>Nama</th>
						<th>Kode Mapel</th>
						<th>Tugas</th>
						<th>Uts</th>
						<th>Uas</th>
						<th>Keterangan</th>
						<th>Action</th>
					</tr>
				</thead>
    
					<tbody>
<?php 
					// Tampilkan data dari Database
					$sql = "SELECT * FROM nilai";
					$tampil = mysqli_query($koneksi,$sql);
					$no =0;
					while ($tampilkan = mysqli_fetch_array($tampil))	
{ 
					$no++;
?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $tampilkan['no_induk']; ?></td>
					<td><?php echo $tampilkan['nama']; ?></td>
					<td><?php echo $tampilkan['kode_mapel']; ?></td>
					<td> <?php echo $tampilkan['tugas']; ?></td>
					<td> <?php echo $tampilkan['uts']; ?></td>
					<td> <?php echo $tampilkan['uas']; ?></td>
					<td> <?php echo $tampilkan['keterangan']; ?></td>
					<td>	
						<a href="frmhapusnilai.php?no_induk=<?php echo $tampilkan['no_induk']; ?>">
						<input type="button" onclick="return confirm('Anda Mau Hapus Data <?php echo $tampilkan['no_induk']; ?> ?');" value="Hapus"></a> | 
						<a href="editnilai.php?no_induk=<?php echo $tampilkan['no_induk']; ?>"><input type="button" value="Edit"/>
						
					</td>
				</tr>

<?php
}
?>
				</tbody>
		</table>
