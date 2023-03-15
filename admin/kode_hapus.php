<?php 
include '../koneksi.php';
$id = $_GET['id'];

function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row ;
    }
    return $rows;
}

$delete = mysqli_query($koneksi, "DELETE from tb_kode where id_kode='$id'");

if ($delete > 0) {
    header("location:data_kode.php?alert=sukses");
}


?>