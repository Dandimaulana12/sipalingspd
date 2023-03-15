<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = md5($_POST['password']);
$akses = $_POST['akses'];

function query($query){
	global $koneksi;
	$result = mysqli_query($koneksi,$query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row ;
	}
	return $rows;
}
$datapw = query("select * from petugas where petugas_username='$username'")[0];
$readpw =  $datapw['petugas_password'];
$dataki = query("SELECT * from petugas_ki where username_ki='$username'")[0];
$readki =  $dataki['password_ki'];

if($akses == "petugas"){
	$loginki = mysqli_query($koneksi, "SELECT * FROM petugas_ki WHERE username_ki='$username'");
	$cekki = mysqli_num_rows($loginki);
	
	if($cekki > 0){
	if (password_verify($password, $readki)) {
		session_start();
		$data1 = mysqli_fetch_assoc($loginki);
		$_SESSION['id'] = $data1['id_ki'];
		$_SESSION['nama'] = $data1['nama'];
		$_SESSION['username'] = $data1['username_ki'];
		$_SESSION['status'] = "petugas_login";
		header("location:petugaski/");
	}else{
		header("location:login.php?alert=gagali");
	}	
	}else{
		header("location:login.php?alert=gagalki");
	}

}else{

	$login = mysqli_query($koneksi, "SELECT * FROM petugas WHERE petugas_username='$username'");
	$cek = mysqli_num_rows($login);

	if($cek > 0){
	if (password_verify($password, $readpw)) {
		session_start();
		$data = mysqli_fetch_assoc($login);
		$_SESSION['id'] = $data['petugas_id'];
		$_SESSION['nama'] = $data['petugas_nama'];
		$_SESSION['username'] = $data['petugas_username'];
		$_SESSION['status'] = "petugas_login";
		header("location:petugas/");
	}else{
		header("location:login.php?alert=gagal");
	}	
	}else{
		header("location:login.php?alert=gagal");
	}

}


