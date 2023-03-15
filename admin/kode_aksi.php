<?php 
include '../koneksi.php';
session_start();

$nama_kode  = $_POST['nama_kode'];
$kegiatan1  = $_POST['kegiatan1'];
$kegiatan2  = $_POST['kegiatan2'];
$kegiatan3  = $_POST['kegiatan3'];
$kegiatan4  = $_POST['kegiatan4'];
$kegiatan5  = $_POST['kegiatan5'];
$kegiatan6  = $_POST['kegiatan6'];
$strip = "- ";

if($kegiatan1 == "" && $kegiatan2 != "" && $kegiatan3 != "" && $kegiatan4 != "" && $kegiatan5 != "" && $kegiatan6 != ""){
    $isi_kegiatan1 = $kegiatan1;
 }
 else if($kegiatan1 == "" && $kegiatan2 == "" && $kegiatan3 != "" && $kegiatan4 != "" && $kegiatan5 != "" && $kegiatan6 != ""){
     $isi_kegiatan1 = $kegiatan1;
     $isi_kegiatan2 = $kegiatan2;
 }
 else if($kegiatan1 == "" && $kegiatan2 == "" && $kegiatan3 == "" && $kegiatan4 != "" && $kegiatan5 != "" && $kegiatan6 != ""){
     $isi_kegiatan1 = $kegiatan1;
     $isi_kegiatan2 = $kegiatan2;
     $isi_kegiatan3 = $kegiatan3;
 }
 else if($kegiatan1 == "" && $kegiatan2 == "" && $kegiatan3 == "" && $kegiatan4 == "" && $kegiatan5 != "" && $kegiatan6 != ""){
     $isi_kegiatan1 = $kegiatan1;
     $isi_kegiatan2 = $kegiatan2;
     $isi_kegiatan3 = $kegiatan3;
     $isi_kegiatan4 = $kegiatan4;
 }
 else if($kegiatan1 == "" && $kegiatan2 == "" && $kegiatan3 == "" && $kegiatan4 == "" && $kegiatan5 == "" && $kegiatan6 != ""){
     $isi_kegiatan1 = $kegiatan1;
     $isi_kegiatan2 = $kegiatan2;
     $isi_kegiatan3 = $kegiatan3;
     $isi_kegiatan4 = $kegiatan4;
     $isi_kegiatan5 = $kegiatan5;
 }
 else if($kegiatan1 == "" && $kegiatan2 == "" && $kegiatan3 == "" && $kegiatan4 == "" && $kegiatan5 == "" && $kegiatan6 == ""){
     $isi_kegiatan1 = $kegiatan1;
     $isi_kegiatan2 = $kegiatan2;
     $isi_kegiatan3 = $kegiatan3;
     $isi_kegiatan4 = $kegiatan4;
     $isi_kegiatan5 = $kegiatan5;
     $isi_kegiatan6 = $kegiatan6;
 }
 // if jika tidak sama dengan kosong
 else if($kegiatan1 != "" && $kegiatan2 == "" && $kegiatan3 == "" && $kegiatan4 == "" && $kegiatan5 == "" && $kegiatan6 == ""){
     $isi_kegiatan1 = $strip.$kegiatan1;
 }
 else if($kegiatan1 != "" && $kegiatan2 != "" && $kegiatan3 == "" && $kegiatan4 == "" && $kegiatan5 == "" && $kegiatan6 == ""){
     $isi_kegiatan1 = $strip.$kegiatan1;
     $isi_kegiatan2 = $strip.$kegiatan2;
 }
 else if($kegiatan1 != "" && $kegiatan2 != "" && $kegiatan3 != "" && $kegiatan4 == "" && $kegiatan5 == "" && $kegiatan6 == ""){
     $isi_kegiatan1 = $strip.$kegiatan1;
     $isi_kegiatan2 = $strip.$kegiatan2;
     $isi_kegiatan3 = $strip.$kegiatan3;
 }
 else if($kegiatan1 != "" && $kegiatan2 != "" && $kegiatan3 != "" && $kegiatan4 != "" && $kegiatan5 == "" && $kegiatan6 == ""){
     $isi_kegiatan1 = $strip.$kegiatan1;
     $isi_kegiatan2 = $strip.$kegiatan2;
     $isi_kegiatan3 = $strip.$kegiatan3;
     $isi_kegiatan4 = $strip.$kegiatan4;
 }
 else if($kegiatan1 != "" && $kegiatan2 != "" && $kegiatan3 != "" && $kegiatan4 != "" && $kegiatan5 != "" && $kegiatan6 == ""){
     $isi_kegiatan1 = $strip.$kegiatan1;
     $isi_kegiatan2 = $strip.$kegiatan2;
     $isi_kegiatan3 = $strip.$kegiatan3;
     $isi_kegiatan4 = $strip.$kegiatan4;
     $isi_kegiatan5 = $strip.$kegiatan5;
 }
 else if($kegiatan1 != "" && $kegiatan2 != "" && $kegiatan3 != "" && $kegiatan4 != "" && $kegiatan5 != "" && $kegiatan6 != ""){
     $isi_kegiatan1 = $strip.$kegiatan1;
     $isi_kegiatan2 = $strip.$kegiatan2;
     $isi_kegiatan3 = $strip.$kegiatan3;
     $isi_kegiatan4 = $strip.$kegiatan4;
     $isi_kegiatan5 = $strip.$kegiatan5;
     $isi_kegiatan6 = $strip.$kegiatan6;
 }

	$insert = mysqli_query($koneksi, "INSERT into tb_kode values (NULL,'$nama_kode','$isi_kegiatan1','$isi_kegiatan2','$isi_kegiatan3','$isi_kegiatan4','$isi_kegiatan5','$isi_kegiatan6')")or die(mysqli_error($koneksi));

    if ($insert) {
        header("location:data_kode.php?alert=sukses");
    }