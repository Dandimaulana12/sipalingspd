<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];
$jabatan  = $_POST['jabatan'];
$golongan  = $_POST['golongan'];
$status  = $_POST['status'];
$username = $_POST['username'];
$password = $_POST['password'];

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
$password1 = password_hash($password,PASSWORD_DEFAULT);

	$namafile = $_FILES['foto']['name'];
	$ukuranfile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpname = $_FILES['foto']['tmp_name'];

	if ($error === 4) {
		echo "<script>alert('masukan gambar terlebih dahulu')</script>";
		return false;
	}
	$ekstensifileval = ['jpg','jpeg','png'];
	$ekstensifile = explode('.', $namafile);
	$ekstensifile = strtolower(end($ekstensifile));

	if (!in_array($ekstensifile, $ekstensifileval)){
		echo "<script> 
  			   alert('file yang anda bukan gambar!');
  		      </script>";
  		      return false;
}
move_uploaded_file($tmpname,'../gambar/user/'.$namafile);
$tambah = mysqli_query($koneksi, "insert into user values (NULL,'$nama','$jabatan','$pickpangkat','$status','$username','$password1','$namafile')");
if ($tambah){
    header("location:user.php?alert=sukses");
}else{
	header("location:user.php?alert=gagal");
}
