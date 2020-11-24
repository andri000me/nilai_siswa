<?php 
include "koneksi.php";
// Hapus Data Dari input_mata_pelajaran
$sql = "DELETE FROM mata_pelajaran WHERE kode_mapel = '".$_GET[kode_mapel]."'";
$hapus = mysql_query($sql);
// Tampilkan pesan jika data berhasil di hapus
if ($sql){
echo "<script>alert('Data Berhasil di Hapus'); window.location = 'input_mata_pelajaran.php';</script>";
} else {
echo "<script>alert('Gagal di Hapus'); window.location = 'input_mata_pelajaran.php';</script>";
}
?>