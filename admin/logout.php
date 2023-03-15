<?php 
include '../koneksi.php';
session_start();
$user = $_SESSION['id'];
$waktu2 = $_SESSION['waktu'];
function query($query){
	global $koneksi;
	$result = mysqli_query($koneksi,$query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row ;
	}
	return $rows;
}
date_default_timezone_set('Asia/Jakarta');

$waktu = date('Y-m-d H:i:s'); 
$readidadm = query("SELECT * from admin_login where waktu_login='$waktu2'")[0];
$pickidadm = $readidadm['waktu_login'];
echo $pickidadm;
mysqli_query($koneksi,"UPDATE admin_login SET waktu_logout='$waktu' where waktu_login='$pickidadm'");
session_destroy();

header("location:../admin_login.php?alert=logout");
?>