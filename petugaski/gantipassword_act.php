<?php 
include '../koneksi.php';
session_start();
$id = $_SESSION['id'];
$password = $_POST['password'];

$password1 = password_hash($password,PASSWORD_DEFAULT);

mysqli_query($koneksi, "UPDATE petugas_ki SET password_ki='$password1' WHERE id_ki='$id'")or die(mysqli_errno());

header("location:gantipassword.php?alert=sukses");