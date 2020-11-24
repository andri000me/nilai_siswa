<?php 
include "koneksi.php";
?>
<html>
<head>
		<title>data sekolah</title>
		<basefont face="Times New Rowman">
</head>
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
						<th>no.induk</th>
						<th>nama</th>
						<th>kode_mapel</th>
						<th>tugas</th>
						<th>uts</th>
						<th>uas</th>
						<th>Keterangan</th>
						<th>Action</th>
					</tr>
				</thead>
    
					<tbody>
<?php 
					// Tampilkan data dari Database
					$sql = "SELECT * FROM nilai";
					$tampil = mysql_query($sql);
					$no =0;
					while ($tampilkan = mysql_fetch_array($tampil))	
{ 
					$no++;
?>
				<tr>
					<td><?php echo $tampilkan['no.induk']; ?></td>
					<td><?php echo $tampilkan['nama']; ?></td>
					<td><?php echo $tampilkan['kode_mapel']; ?></td>
					<td> <?php echo $tampilkan['tugas']; ?></td>
					<td> <?php echo $tampilkan['uts']; ?></td>
					<td> <?php echo $tampilkan['uas']; ?></td>
					<td> <?php echo $tampilkan['keterangan']; ?></td>
					<td>	
						<a href="hapusguru.php?no.induk=<?php echo $tampilkan['no.induk']; ?>">
						<input type="button" onclick="return confirm('Anda Mau Hapus Data <?php echo $tampilkan['no.induk']; ?> ?');" value="Hapus"></a> | 
						<a href="editguru.php?no.induk=<?php echo $tampilkan['no.induk']; ?>"><input type="button" value="Edit"/>
						
					</td>
				</tr>

<?php
}
?>
				</tbody>
		</table>