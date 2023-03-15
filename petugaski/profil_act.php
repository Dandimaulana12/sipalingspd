<?php 
include '../koneksi.php';
session_start();

$id = $_SESSION['id'];

$username  = $_POST['username'];
$nama  = $_POST['nama'];

$rand = rand();

$allowed =  array('gif','png','jpg','jpeg');

$filename = $_FILES['foto']['name'];

if($filename == ""){

	mysqli_query($koneksi, "update petugas_ki set nama='$nama', username_ki='$username' where id_ki='$id'")or die(mysqli_error($koneksi));
	header("location:profil.php?alert=sukses");

}else{

	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(in_array($ext,$allowed) ) {

		// hapus file lama
		$lama = mysqli_query($koneksi,"select * from petugas_ki where id_ki='$id'");
		$l = mysqli_fetch_assoc($lama);
		$nama_file_lama = $l['petugas_foto'];
		unlink("../gambar/petugas/".$nama_file_lama);

		// upload file baru
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/petugas/'.$rand.'_'.$filename);
		$nama_file = $rand.'_'.$filename;
		mysqli_query($koneksi, "update petugas_ki set nama='$nama', username_ki='$username', foto='$nama_file' where id_ki='$id'")or die(mysqli_error($koneksi));
		header("location:profil.php?alert=sukses");

	}else{

		header("location:profil.php?alert=gagal");
	}

}

