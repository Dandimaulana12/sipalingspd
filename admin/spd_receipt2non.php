<?php
// memanggil library FPDF
require('../fpdf16/fpdf.php');
include '../koneksi.php';
 

$tujuan = $_POST["tujuan"];
$namakota = $_POST["namakota"];
$rupiah = $_POST["rupiah"];
$lama = $_POST["lama"];
$hari = $_POST["hari"];
$total = $_POST["total"];
$jumlah = $_POST["jumlah"];
$filter = $_POST['filter_datas'];


$idspd = $_POST['idd'];
function query($query){
	global $koneksi;
	$result = mysqli_query($koneksi,$query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row ;
	}
	return $rows;
}
$rincian = query("SELECT * from tabel_spd where spd_id='$idspd'")[0];
$picknospd = $rincian["no_spd"];
$picknama  = $rincian["nama"];
$pickjabatan  = $rincian["jabatan"];
$pickgol  = $rincian["golongan"];
$picknospd  = $rincian["no_spd"];
$picknost  = $rincian["no_st"];
$pickkota  = $rincian["kode_st"];
$pickkode  = $rincian["tujuan_st"];
$pickperihal  = $rincian["perihal"];
$picktglbrgkt  = $rincian["tgl_berangkat"];
$picktglplng  = $rincian["tgl_pulang"];

class pdf extends FPDF{
    function letak($gambar){
        //memasukkan gambar untuk header
        $this->Image($gambar,25,13,25,25);
        //menggeser posisi sekarang
        }
function judul($teks1, $teks2, $teks3, $teks4, $teks5,$teks6, $teks7, $teks8, $teks9){
    $this->Cell(25);
    $this->SetFont('Arial','B','13');
    $this->Cell(0,5,$teks1,0,1,'C');
    $this->Cell(25);
    $this->SetFont('Arial','B','11');
    $this->Cell(0,5,$teks2,0,1,'C');
    $this->Cell(25);
    $this->Cell(0,5,$teks3,0,1,'C');
    $this->Cell(25);
    $this->Cell(0,5,$teks4,0,1,'C');
    $this->Cell(25);
    $this->Cell(0,5,$teks5,0,1,'C');
    $this->Cell(25);
    $this->SetFont('Arial','','7');
    $this->Cell(0,4,$teks6,0,1,'C');
    $this->Cell(25);
    $this->Cell(0,4,$teks7,0,1,'C');
    $this->Cell(25);
    $this->Cell(0,4,$teks8,0,1,'C');
    $this->Cell(25);
    $this->Cell(0,4,$teks9,0,1,'C');
    }
function garis(){
        $this->SetLineWidth(1);
        $this->Line(25,52,185,52);
        $this->SetLineWidth(0);
        $this->Line(25,53,185,53);
        }
        function isi($teks1,$teks2,$teks3,$teks4,$teks5,$teks6,$teks7,$teks8,$teks9,$teks10,$teks11){
            $this->Cell(14,0);
            $this->SetFont('Arial','','12');
            $this->Cell(0,15,$teks1,0,1,'L');
            $this->Cell(13.7,-3);
            $this->SetFont('Arial','','12');
            $this->Cell(0,-5,$teks2,0,1,'L');
            $this->Cell(13.7,2);
            $this->SetFont('Arial','','12');
            $this->Cell(0,15,$teks3,0,1,'L');
            $this->Cell(14,-10);
            $this->SetFont('Arial','','12');
            $this->Cell(0,-5,$teks4,0,1,'L');
            $this->Cell(14,4);
            $this->SetFont('Arial','','12');
            $this->Cell(0,15,$teks5,0,1,'L');
            $this->Cell(14,4);
            $this->SetFont('Arial','','12');
            $this->Cell(0,-5,$teks6,0,1,'L');
            $this->Cell(14,4);
            $this->SetFont('Arial','','12');
            $this->Cell(0,15,$teks7,0,1,'L');
            $this->Cell(14.2,4);
            $this->SetFont('Arial','','12');
            $this->Cell(0,-5,$teks8,0,1,'L');
            $this->Cell(13.6,4);
            $this->SetFont('Arial','','12');
            $this->Cell(0,15,$teks9,0,1,'L');
            $this->Cell(13.6,4);
            $this->SetFont('Arial','','12');
            $this->Cell(0,-5,$teks10,0,1,'L');
            $this->Cell(14,4);
            $this->SetFont('Arial','','12');
            $this->Cell(0,15,$teks11,0,1,'L');
    }
    function isi2($teks1,$teks2,$teks3){
        $this->SetFont('Arial','','12');
        $this->Cell(10,10,$teks1,0,1,'L');
        $this->Cell(14,1);
        $this->SetFont('Arial','','12');
        $this->Cell(0,0,$teks2,0,1,'L');
        $this->Cell(14,1);
        $this->SetFont('Arial','','12');
        $this->Cell(0,11,$teks3,0,1,'L');
}
function pejabat($teks1,$teks2){
    $this->SetFont('Arial','','12');
    $this->Cell(0,1,$teks1,0,1,'L');
    $this->Cell(110,1);
    $this->SetFont('Arial','','12');
    $this->Cell(0,30,$teks2,0,1,'L');
}
function letakttd($gambar){
    //memasukkan gambar untuk header
    $this->Image($gambar,121.4,178,17,17);
    //menggeser posisi sekarang
    }
   
}

// intance object dan memberikan pengaturan halaman PDF
//instantisasi objek
$pdf=new pdf();

//Mulai dokumen
$pdf->AddPage('P', 'A4');
$pdf->SetAutoPageBreak(false);
//meletakkan gambar
$pdf->letak('bener2.png');
//meletakkan judul disamping logo diatas
$pdf->judul('KEMENTRIAN KEUANGAN REPUBLIK INDONESIA', 'DIREKTORAT JENDERAL PAJAK','KANTOR WILAYAH DIREKTORAT JENDERAL PAJAK KALIMANTAN','SELATAN DAN TENGAH','KANTOR PELAYANAN PAJAK PRATAMA TANJUNG','JL. MABUUN RAYA TERMINAL TANJUNG, KOMPLEK RUKO SWADHARMA LESTARI, TANJUNG 71571 ','TELEPON (0526) 2021250; FAKSIMILE (0526) 2021125; LAMAN www.pajak.go.id ','LAYANAN INFORMASI DAN PENGADUAN KRING PAJAK (021) 1500200','SUREL pengaduan@pajak.go.id, informasi@pajak.go.id');
//membuat garis ganda tebal dan tipis
$pdf->garis();
$pdf->isi('Nama Pegawai                  : '.$picknama,'Jabatan                              : '.$pickjabatan,'Golongan                           : '.$pickgol,'No. SPD                            : '.$picknospd,'No. ST                               : '.$picknost,'Kota Tujuan                       : '.$pickkota,'Kode ST                            : '.$pickkode,'Perihal ST                         : '.$pickperihal,'Tanggal Berangkat            : '.$picktglbrgkt,'Tanggal Pulang                 : '.$picktglplng,'Rincian Perhitungan SPD :');

$pdf->Cell(0,1,'',0,1);
$pdf->SetFont('Times','B',12);
$pdf->Cell(14.9,0);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(50,7,'Rincian' ,1,0,'C');
$pdf->Cell(75,7,'Jumlah',1,0,'C');
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',12);
$no1=1;
$no2=2;

$data = mysqli_query($koneksi,"SELECT  * FROM tabel_spd where spd_id='$idspd'");
$pdf->Cell(14.9,0);
  $pdf->Cell(10,6, $no1,1,0,'C');
  $pdf->Cell(50,6, $tujuan,1,0);
  $pdf->Cell(75,6, 'Rp '.number_format($namakota,0,'','.'),1,0,'R');
  $pdf->Cell(10,6,'',0,1);
  $pdf->SetFont('Times','',12);
  $pdf->Cell(14.9,0);
  $pdf->Cell(10,6, $no2,1,0,'C');
  $pdf->Cell(50,6, $lama,1,0);
  $pdf->Cell(75,6, $hari,1,0,'R');
  $pdf->Cell(10,6,'',0,1);
  $pdf->SetFont('Times','',12);
  $pdf->Cell(14.9,0);
  $pdf->Cell(60,6, $total,1,0,'C');
  $pdf->Cell(75,6, 'Rp '.number_format($jumlah,0,'','.'),1,0,'R');



$pdf->isi2('','Telah diperiksa dengan keterangan bahwa perjalanan tersebut atas perintahnya dan ','semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-singkatnya.');
$pdf->pejabat('','Pejabat Pembuat Komitmen');
//meletakkan gambar
$pdf->letakttd('scan.jpg');
$pdf->Cell(110,0);
$pdf->Cell(10,22,'Dony Romdoni','');
$pdf->Cell(10,6,'',0,1);
$pdf->SetFont('Times','',12);
$pdf->Cell(110,0);
$pdf->Cell(60,22,'NIP 19800731 200112 1 001','C');

  $pdf->Output('../rincian/'.$picknospd.'.pdf', 'F');
  $formatpdf = $picknospd.'.pdf';
  $tambah = mysqli_query($koneksi, "UPDATE tb_rincian SET file_rincian='$formatpdf' where id_spd='$idspd'" );

  $isi_filter = '';

	if($filter == "filter_menunggu"){
        $isi_filter =  'spd_uploadnon.php?id='.$idspd.'&filter='.$filter;
	}
	elseif($filter == "all_datas"){
        $isi_filter =  'spd_uploadnon.php?id='.$idspd.'&filter='.$filter;
			 
	}elseif($filter == "pilih_filter"){
	$isi_filter =  'spd_uploadnon.php?id='.$idspd.'&filter='.$filter;
				
	}
	else{
	$isi_filter =  'spd_uploadnon.php?id='.$idspd;
	}
    
  echo "<script> 
        alert('file tersimpan');
        document.location.href='$isi_filter';
         </script>";

?>