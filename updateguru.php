<?php
include 'koneksi.php';

if (isset($_POST)) {
    $sql = "UPDATE data_guru SET nama = '$_POST[nama]',
                                     agama = '$_POST[agama]',
									 jk = '$_POST[jk]',
									 status = '$_POST[status]',
									 alamat = '$_POST[alamat]',
                                     no_tlpn  = '$_POST[no_tlpn]'
                                 WHERE nip = '$_POST[nip]' ";
    $dbh->exec($sql);
}

header("location:data_guru.php");
?>