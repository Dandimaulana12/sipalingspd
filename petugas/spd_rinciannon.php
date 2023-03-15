<?php
include '../koneksi.php';
session_start();

$idspd  = $_POST['idd'];
$tujuan = $_POST['tujuan'];
$hari = $_POST['hari'];
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
$rupiahnon = $pickrp["rupiah_non"];
$namakota = $pickrp["nama_kota"];

	$insert = mysqli_query($koneksi, "insert into tb_rincian values (NULL,'$idspd','$namakota','$rupiahnon','$hari','$file','$file','$file','$file')")or die(mysqli_error($koneksi));

    if ($insert) {
        header("location:spd_uploadnon.php?id=$idspd&&alert=sukses");
    }


?>