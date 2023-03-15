<?php 
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

// $waktu = date('Y-m-d H:i:s'); 
// $petugas = $_SESSION['id'];
$id  = $_POST['id_kota'];
$nama_kota  = $_POST['nama_kota'];
$rupiah  = $_POST['rupiah'];

function query($query){
	global $koneksi;
	$result = mysqli_query($koneksi,$query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row ;
	}
	return $rows;
}

	$data = mysqli_query($koneksi, "UPDATE tb_kota set nama_kota='$nama_kota', rupiah='$rupiah' where id_kota='$id'")or die(mysqli_error($koneksi));
    if($data){
        header("location:data_kota.php?alert=sukses");
  }else{
    header("location:data_kota.php?alert=gagal");
  }


