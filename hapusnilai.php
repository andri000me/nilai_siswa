<?php 
include "koneksi.php";
// Hapus Data Dari nilai
$sql = "DELETE FROM nilai WHERE no_induk = '".$_GET['no_induk']."'";
$hapus = mysqli_query($koneksi,$sql);
// Tampilkan pesan jika data berhasil di hapus
if ($sql){
echo "<script>alert('Data Berhasil di Hapus'); window.location = 'frmnilai.php';</script>";
} else {
echo "<script>alert('Gagal di Hapus'); window.location = 'input_nilai.php';</script>";
}
?>