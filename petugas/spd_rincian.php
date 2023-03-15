<?php
include '../koneksi.php';
session_start();

$idspd  = $_POST['idd'];
$tujuan = $_POST['tujuan'];
$hari = $_POST['hari'];
$dbpr2 = $_POST['dbpr'];
$dbpr = preg_replace('/[.]/','',$dbpr2);
$dpr2 = $_POST['dpr'];
$dpr = preg_replace('/[.]/','',$dpr2);
$lain2 = $_POST['lain'];
$lain = preg_replace('/[.]/','',$lain2);
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

	$insert = mysqli_query($koneksi, "insert into tb_rincian values (NULL,'$idspd','$namakota','$rupiah','$hari','$dbpr','$dpr','$lain','$file')")or die(mysqli_error($koneksi));

    if ($insert) {
        header("location:spd_upload.php?id=$idspd&&alert=sukses");
    }


?>