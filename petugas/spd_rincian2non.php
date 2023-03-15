<?php
include '../koneksi.php';
session_start();

$idspd  = $_POST['idd'];
$kota = $_POST['kota'];
$hari = $_POST['hari'];
$file = "";
$filter = $_POST['filter_datas'];


function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row ;
    }
    return $rows;
}
$readrincian = query("SELECT * from tb_kota where id_kota='$kota'")[0];
$pickkota = $readrincian["nama_kota"];
$pickrupiah = $readrincian["rupiah_non"];
    $update = mysqli_query($koneksi, "UPDATE tb_rincian SET st_tujuan='$pickkota',jumlah='$pickrupiah',lama_hari='$hari' where id_spd='$idspd'");
   $isi_filter = '';

    if($filter == "filter_menunggu"){
    $isi_filter = 'spd_uploadnon.php?id='.$idspd.'&alert=sukses&filter='.$filter;
    }
    elseif($filter == "all_datas"){
    $isi_filter = 'spd_uploadnon.php?id='.$idspd.'&alert=sukses&filter='.$filter;
             
    }elseif($filter == "pilih_filter"){
    $isi_filter = 'spd_uploadnon.php?id='.$idspd.'&alert=sukses&filter='.$filter;
                
    }
    else{
    $isi_filter =  'spd_uploadnon.php?id='.$idspd.'&alert=sukses';
    }
    
    
    if($update > 0){
        header("location:$isi_filter");
    }

?>