<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

// $waktu = date('Y-m-d H:i:s'); 
// $petugas = $_SESSION['id'];
$id_gol  = $_POST['id_gol'];
$golongan  = $_POST['golongan'];

function query($query){
	global $koneksi;
	$result = mysqli_query($koneksi,$query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row ;
	}
	return $rows;
}

	$data = mysqli_query($koneksi, "UPDATE tb_golongan set pangkat='$golongan' where id_gol='$id_gol'")or die(mysqli_error($koneksi));
    if($data){
        header("location:data_gol.php?alert=sukses");
  }else{
    header("location:data_gol.php?alert=gagal");
  }


