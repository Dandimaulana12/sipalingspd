<?php
include '../koneksi.php';
session_start();

$id = $_GET["id_alasan"];
$filter = $_GET['filter_datas'];

$alasan = $_GET["alasan"];
date_default_timezone_set('Asia/Jakarta');
$waktu = date('Y-m-d H:i:s');
$statusverif = "KI Menolak";
$status_file = "file_ditolak";
$update = mysqli_query($koneksi, "UPDATE tabel_spd set status_user='$alasan',keterangan='$alasan',stampki='$waktu',status_ki='$statusverif',status_file='$status_file' where spd_id='$id'")or die(mysqli_error($koneksi));

if ($update > 0) {
  if($filter == "filter_menunggu"){
  echo "<script> 
     alert('berhasil diubah');
     document.location.href='dataspdki.php?filter=$filter';
    </script>";
  }
  elseif($filter == "all_datas"){
      echo "<script> 
               alert('berhasil diubah');
               document.location.href='dataspdki.php?filter=$filter';
              </script>";
  }elseif($filter == "pilih_filter"){
      echo "<script> 
               alert('berhasil diubah');
               document.location.href='dataspdki.php?filter=$filter';
              </script>";
  }
  else{
      echo "<script> 
               alert('berhasil diubah');
               document.location.href='dataspdki.php';
              </script>";
  }
}
?>