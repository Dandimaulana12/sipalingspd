<?php 
include '../koneksi.php';
$id = $_GET['idacc'];
$filter = $_GET['filter'];

function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row ;
    }
    return $rows;
}
$rincian = query("SELECT * from tb_rincian where id_spd='$id'")[0];
$pickfile = $rincian["file_rincian"];
date_default_timezone_set('Asia/Jakarta');
$waktu = date('Y-m-d H:i:s');
$flama = "../rincian/".$pickfile;
$fbaru = "../rincianuser/".$pickfile;
copy($flama,$fbaru);
$keterangan = "Selesai";
$statususer = "Pembayaran Berhasil";
$update = mysqli_query($koneksi, "UPDATE tabel_spd SET keterangan='$keterangan',status_user='$statususer',stampadmin='$waktu',status_admin='$keterangan' where spd_id='$id' ")or die(mysqli_error($koneksi));
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