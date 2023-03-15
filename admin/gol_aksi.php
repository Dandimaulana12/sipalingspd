<?php 
include '../koneksi.php';
session_start();

$golongan  = $_POST['golongan'];

	$insert = mysqli_query($koneksi, "INSERT into tb_golongan values (NULL,'$golongan')")or die(mysqli_error($koneksi));

    if ($insert) {
        header("location:data_gol.php?alert=sukses");
    }


