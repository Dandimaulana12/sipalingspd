<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$waktu = date('Y-m-d H:i:s'); 
$petugas = $_POST['id'];
$kode  = $_POST['kode_npwp'];
$nama  = $_POST['nama_npwp'];


	$insert = mysqli_query($koneksi, "INSERT into tb_npwp values (NULL,'$waktu','$petugas','$kode','$nama')")or die(mysqli_error($koneksi));
    if ($insert) {
        $cfile = mkdir("../arsip/$kode");
        header("location:arsip_preview2.php?id=$petugas&&alertsukses");
    }


