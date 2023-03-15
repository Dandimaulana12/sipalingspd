<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

$password2 = md5($_POST['password']);


function query($query){
	global $koneksi;
	$result = mysqli_query($koneksi,$query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row ;
	}
	return $rows;
}

$login = mysqli_query($koneksi, "SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$password2'");
$cek = mysqli_num_rows($login);

if($cek > 0){
    session_start();
    $data = mysqli_fetch_assoc($login);

    $_SESSION['id'] = $data['admin_id'];
    $_SESSION['nama'] = $data['admin_nama'];
    $_SESSION['username'] = $data['admin_username'];
    $_SESSION['status'] = "admin_login";

    $id = $_SESSION['id'];
    $nama = $_SESSION['nama'];
    $user = $_SESSION['username'];
    date_default_timezone_set('Asia/Jakarta');
    $waktu1 = '0000-00-00 00:00:00';
    $waktu = date('Y-m-d H:i:s'); 
    $_SESSION['waktu'] = $waktu;
    mysqli_query($koneksi, "INSERT into admin_login values (NULL,'$id','$nama','$user','$waktu','$waktu1')")or die(mysqli_error($koneksi));

    header("location:admin/");
}

?>