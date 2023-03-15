<?php 
include '../koneksi.php';
$tgl_awal = mysqli_real_escape_string($koneksi,$_POST["tgl_awal"]);
$tgl_akhir = mysqli_real_escape_string($koneksi,$_POST["tgl_akhir"]);


function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row ;
    }
    return $rows;
}

$picktgl = mysqli_query($koneksi,"SELECT * from tabel_spd where stampuser ");
$delete = mysqli_query($koneksi, "DELETE from tabel_spd where stampuser between '$tgl_awal' and '$tgl_akhir'");
if ($delete > 0) {
     header("location:dataspd.php?sukses");
}

?>