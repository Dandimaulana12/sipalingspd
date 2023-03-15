<?php
include '../koneksi.php';
session_start();

$idspd  = $_POST['id2'];
$kota = $_POST['kota'];
$hari = $_POST['hari'];
$hotel2 = $_POST['hotel2'];
$hotel = preg_replace('/[.]/','',$hotel2);
$pesawat_pergi2 = $_POST['pesawat_pergi2'];
$pesawat_pergi = preg_replace('/[.]/','',$pesawat_pergi2);
$pesawat_pulang2 = $_POST['pesawat_pulang2'];
$pesawat_pulang = preg_replace('/[.]/','',$pesawat_pulang2);
$kereta2 = $_POST['pesawat_pergi2'];
$kereta = preg_replace('/[.]/','',$kereta2);
$bensin_ada2 = $_POST['bensin_ada2'];
$bensin_ada = preg_replace('/[.]/','',$bensin_ada2);
$taksi_ada2 = $_POST['taksi_ada2'];
$taksi_ada = preg_replace('/[.]/','',$taksi_ada2);
$travel_ada2 = $_POST['travel_ada2'];
$travel_ada = preg_replace('/[.]/','',$travel_ada2);
$bensin_tidak2 = $_POST['bensin_tidak2'];
$bensin_tidak = preg_replace('/[.]/','',$bensin_tidak2);
$taksi_tidak2 = $_POST['taksi_tidak2'];
$taksi_tidak = preg_replace('/[.]/','',$taksi_tidak2);
$travel_tidak2 = $_POST['travel_tidak2'];
$travel_tidak = preg_replace('/[.]/','',$travel_tidak2);
$pengeluaran2 = $_POST['pengeluaran2'];
$pengeluaran = preg_replace('/[.]/','',$pengeluaran2);

$filter = $_POST['filter_datas'];

$total_dbpd = $hotel + $pesawat_pergi +$pesawat_pulang+$bensin_ada + $taksi_ada+$travel_ada+ $kereta;
$total_dpr = $bensin_tidak +$taksi_tidak+$travel_tidak+$pengeluaran;
$file = "";

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
$pickrupiah = $readrincian["rupiah"];

    $update = mysqli_query($koneksi, "UPDATE tb_rincian SET st_tujuan='$pickkota',jumlah='$pickrupiah',lama_hari='$hari',hotel ='$hotel',pesawat_pergi='$pesawat_pergi',pesawat_pulang='$pesawat_pulang',
    kereta='$kereta',bensin_ada ='$bensin_ada',taksi_ada='$taksi_ada',travel_ada = '$travel_ada',dbpr='$total_dbpd', 
    bensin_tidak='$bensin_tidak',taksi_tidak='$taksi_tidak',travel_tidak='$travel_tidak',pengeluaran='$pengeluaran',dpr= '$total_dpr' where id_spd='$idspd' ");
$isi_filter = '';

if($filter == "filter_menunggu"){
$isi_filter = 'spd_upload.php?id='.$idspd.'&alert=sukses&filter='.$filter;
}
elseif($filter == "all_datas"){
$isi_filter = 'spd_upload.php?id='.$idspd.'&alert=sukses&filter='.$filter;
         
}elseif($filter == "pilih_filter"){
$isi_filter = 'spd_upload.php?id='.$idspd.'&alert=sukses&filter='.$filter;
            
}
else{
$isi_filter =  'spd_upload.php?id='.$idspd.'&alert=sukses';
}


if($update > 0){
    header("location:$isi_filter");
}
?>