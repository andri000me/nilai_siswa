<?php 
include "koneksi.php";
// Hapus Data Dari data_guru
$sql = "DELETE FROM data_siswa WHERE noinduk = '".$_GET['noinduk']."'";
$hapus = mysqli_query($koneksi,$sql);
// Tampilkan pesan jika data berhasil di hapus
if ($sql){
echo "<script>alert('Data Berhasil di Hapus'); window.location = 'input_siswa.php';</script>";
} else {
echo "<script>alert('Gagal di Hapus'); window.location = 'input_siswa.php';</script>";
}
?>