<?php
include '../koneksi.php';
session_start();

$id = $_GET["id_alasan"];
$alasan = $_GET["alasan"];
$filter = $_GET['filter_datas'];

$tolak = "Menolak";
$status_file = "file_ditolak";

$update = mysqli_query($koneksi, "UPDATE tabel_spd set status_admin='$tolak',status_user='$alasan',keterangan='$alasan',status_file='$status_file' where spd_id='$id'")or die(mysqli_error($koneksi));

if ($update > 0) {
  if($filter == "filter_menunggu"){
  echo "<script> 
     alert('berhasil diubah');
     document.location.href='dataspd.php?filter=$filter';
    </script>";
  }
  elseif($filter == "all_datas"){
      echo "<script> 
               alert('berhasil diubah');
               document.location.href='dataspd.php?filter=$filter';
              </script>";
  }elseif($filter == "pilih_filter"){
      echo "<script> 
               alert('berhasil diubah');
               document.location.href='dataspd.php?filter=$filter';
              </script>";
  }
  else{
      echo "<script> 
               alert('berhasil diubah');
               document.location.href='dataspd.php';
              </script>";
  }
}
?>