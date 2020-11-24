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