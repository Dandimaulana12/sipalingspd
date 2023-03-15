<?php 
include '../koneksi.php';
session_start();

$idspd  = $_POST['idd'];
$tujuan = $_POST['tujuan'];
$hari = $_POST['hari'];
$kuitansi = $_POST['kuitansi'];
$riil = $_POST['riil'];
$file = "";


function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row ;
    }
    return $rows;
}

$pickrp = query("SELECT * from tb_kota where id_kota='$tujuan'")[0]; 
$rupiah = $pickrp["rupiah"];
$namakota = $pickrp["nama_kota"];

	$insert = mysqli_query($koneksi, "insert into tb_rincian values (NULL,'$idspd','$namakota','$rupiah','$hari','$kuitansi','$riil','$file')")or die(mysqli_error($koneksi));

    if ($insert) {
        header("location:spd_upload.php?id=$idspd&&alert=sukses");
    }


