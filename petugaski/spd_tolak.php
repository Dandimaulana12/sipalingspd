<?php 
include '../koneksi.php';
$id = $_GET['idtolak'];

function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row ;
    }
    return $rows;
}
$waktu = date('Y-m-d H:i:s');
$statusverif = "KI Menolak";
$keterangan = "Petugas KI Menolak Data SPD";
$update = mysqli_query($koneksi, "UPDATE tabel_spd SET keterangan='$keterangan',stampki='$waktu',status_ki='$statusverif' where spd_id='$id' ")or die(mysqli_error($koneksi));
if ($update > 0) {
    echo "<script> 
			 alert('berhasil diubah');
			 document.location.href='dataspdki.php';
			</script>";
}


?>