<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$jabatan  = $_POST['jabatan'];
$golongan  = $_POST['golongan'];
$status  = $_POST['status'];
$statusbaru = trim($status);
$username = $_POST['username'];
$pwd = $_POST['password'];
$password = md5($_POST['password']);

function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row ;
    }
    return $rows;
}
$parseidgol = query("SELECT * from tb_golongan where id_gol='$golongan'")[0];
$pickpangkat = $parseidgol["pangkat"];

$password1 = password_hash($pwd,PASSWORD_DEFAULT);
// cek gambar
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($pwd=="" && $filename==""){
	mysqli_query($koneksi, "update user set user_nama='$nama',jabatan='$jabatan',golongan='$pickpangkat',status='$statusbaru', user_username='$username' where user_id='$id'");
	header("location:user.php");
}elseif($pwd==""){
	if(!in_array($ext,$allowed) ) {
		header("location:user.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$filename);
		
		mysqli_query($koneksi, "update user set user_nama='$nama',jabatan='$jabatan',golongan='$pickpangkat',status='$statusbaru', user_username='$username', user_foto='$filename' where user_id='$id'");		
		header("location:user.php?alert=berhasil");
	}
}elseif($filename==""){
	mysqli_query($koneksi, "update user set user_nama='$nama',jabatan='$jabatan',golongan='$pickpangkat',status='$statusbaru',user_username='$username', user_password='$password1' where user_id='$id'");
	header("location:user.php");
}
elseif($pwd !="" && $filename !=""){
	if(!in_array($ext,$allowed) ) {
		header("location:user.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$filename);
		
		mysqli_query($koneksi, "update user set user_nama='$nama',jabatan='$jabatan',golongan='$pickpangkat',status='$statusbaru', user_username='$username', user_foto='$filename', user_password='$passwo	rd1' where user_id='$id'");		
		header("location:user.php?alert=berhasil");
	}
}

