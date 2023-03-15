<?php 
include '../koneksi.php';
session_start();

$kota  = $_POST['nama_kota'];
$rupiah  = $_POST['rupiah'];

	$insert = mysqli_query($koneksi, "INSERT into tb_kota values (NULL,'$kota','$rupiah')")or die(mysqli_error($koneksi));

    if ($insert) {
        header("location:data_kota.php?alert=sukses");
    }


