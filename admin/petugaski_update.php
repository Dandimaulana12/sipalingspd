<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$username = $_POST['username'];
$pwd = $_POST['password'];
$password = md5($_POST['password']);

// cek gambar
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$password1 = password_hash($pwd,PASSWORD_DEFAULT);
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($pwd=="" && $filename==""){
	mysqli_query($koneksi, "update petugas_ki set nama='$nama', username_ki='$username' where id_ki='$id'");
	header("location:ki_index.php");
}elseif($pwd==""){
	if(!in_array($ext,$allowed) ) {
		header("location:ki_index.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/petugas/'.$rand.'_'.$filename);
		$x = $rand.'_'.$filename;
		mysqli_query($koneksi, "update petugas_ki set nama='$nama', username_ki='$username', foto='$x' where id_ki='$id'");		
		header("location:ki_index.php?alert=berhasil");
	}
}elseif($filename==""){
	mysqli_query($koneksi, "update petugas_ki set nama='$nama', username_ki='$username', password_ki='$password1' where id_ki='$id'");
	header("location:ki_index.php");
}

