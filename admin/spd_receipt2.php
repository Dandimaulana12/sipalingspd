<?php
// memanggil library FPDF
require('../fpdf16/fpdf.php');
include '../koneksi.php';
 

$tujuan = $_POST["tujuan"];
$namakota = $_POST["namakota"];
$rupiah = $_POST["rupiah"];
$lama = $_POST["lama"];
$hari = $_POST["hari"];
$dbpr = $_POST["dbpr"];
$jdbpr = $_POST["jdbpr"];
$dpr = $_POST["dpr"];
$jdpr = $_POST["jdpr"];
$lain = $_POST["lain"];
$jlain = $_POST["jlain"];
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

// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'Rincian Biaya SPD',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(50,7,'Rincian' ,1,0,'C');
$pdf->Cell(75,7,'Jumlah',1,0,'C');
 
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no1=1;
$no2=2;
$no3=3;
$no4=4;
$no5=5;
$no6=6;

$data = mysqli_query($koneksi,"SELECT  * FROM tabel_spd where spd_id='$idspd'");
 $pdf->Cell(10,6, $no1,1,0,'C');
  $pdf->Cell(50,6, $tujuan,1,0);
  $pdf->Cell(75,6, $namakota,1,0);
  $pdf->Cell(10,6,'',0,1);
  $pdf->SetFont('Times','',10);
  $pdf->Cell(10,6, $no2,1,0,'C');
  $pdf->Cell(50,6, $lama,1,0);
  $pdf->Cell(75,6, $hari,1,0);
  $pdf->Cell(10,6,'',0,1);
  $pdf->SetFont('Times','',10);
  $pdf->Cell(10,6, $no3,1,0,'C');
  $pdf->Cell(50,6, $dbpr,1,0);
  $pdf->Cell(75,6, $jdbpr,1,0);
  $pdf->Cell(10,6,'',0,1);
  $pdf->SetFont('Times','',10);
  $pdf->Cell(10,6, $no4,1,0,'C');
  $pdf->Cell(50,6, $dpr,1,0);
  $pdf->Cell(75,6, $jdbpr,1,0);
  $pdf->Cell(10,6,'',0,1);
  $pdf->SetFont('Times','',10);
  $pdf->Cell(10,6, $no5,1,0,'C');
  $pdf->Cell(50,6, $lain,1,0);
  $pdf->Cell(75,6, $jlain,1,0);
  $pdf->Cell(10,6,'',0,1);
  $pdf->SetFont('Times','',10);
  $pdf->Cell(60,6, $total,1,0,'C');
  $pdf->Cell(75,6, $jumlah,1,0);


  $pdf->Output('../rincian/'.$picknospd.'.pdf', 'F');
  $formatpdf = $picknospd.'.pdf';
  $tambah = mysqli_query($koneksi, "UPDATE tb_rincian SET file_rincian='$formatpdf'" );

  echo "<script> 
        alert('file tersimpan');
        document.location.href='spd_upload.php?id=$idspd';
         </script>";


?>