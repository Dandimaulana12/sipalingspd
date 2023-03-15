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
date_default_timezone_set('Asia/Jakarta');
$waktu = date('Y-m-d H:i:s');
$status_ki = "KI ACC";
$statusverif = "Menunggu Verificator";
$keterangan = "diteruskan ke Kepegawaian";
$proseski = "diteruskan ke Kepegawaian";
$update = mysqli_query($koneksi, "UPDATE tabel_spd SET keterangan='$keterangan',status_user='$proseski',stampki='$waktu',status_ki='$status_ki',status_verif='$statusverif' where spd_id='$id'")or die(mysqli_error($koneksi));
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