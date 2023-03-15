<?php
include '../koneksi.php';
require('../fpdf16/fpdf.php');
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

class PDF_receipt extends FPDF { 
    function __construct ($orientation = 'P', $unit = 'pt', $format = 'Letter', $margin = 40) { 
        $this->FPDF($orientation, $unit, $format); 
        $this->SetTopMargin($margin); 
        $this->SetLeftMargin($margin); 
        $this->SetRightMargin($margin); 
        $this->SetAutoPageBreak(true, $margin); 
    } 

    function Header() { 
        $this->SetFont('Arial', 'B', 20); 
        $this->SetFillColor(36, 96, 84); 
        $this->SetTextColor(225); 
        $this->Cell(0, 31, "Rincian SPD", 0, 1, 'C', true); 
    }
    
    function Footer() { 
        $this->SetFont('Arial', '', 12); 
        $this->SetTextColor(0); 
        $this->SetXY(0,-60); 
        $this->Cell(0, 20, "Copyright@dandi", 'T', 0, 'C'); 
    }
    function PriceTable($products, $prices) { 
        $this->SetFont('Arial', 'B', 12); 
        $this->SetTextColor(0); 
        $this->SetFillColor(36, 140, 129); 
        $this->SetLineWidth(1); 
        $this->Cell(427, 25, "File", 'LTR', 0, 'C', true); 
        $this->Cell(104.5, 25, "Jumlah", 'LTR', 1, 'C', true); 
     
        $this->SetFont('Arial', ''); 
        $this->SetFillColor(238); 
        $this->SetLineWidth(0.2); 
        $fill = false; 
     
        for ($i = 0; $i < count($products); $i++) { 
            $this->Cell(427, 20, $products[$i], 1, 0, 'L', $fill); 
            $this->Cell(104.5, 20, ' Rp' . $prices[$i], 1, 1, 'R', $fill); 
            $fill = !$fill; 
        } 
        $this->SetX(367); 
        $this->Cell(100, 20, "Total", 1); 
        $this->Cell(104.5, 20, '  Rp' . array_sum($prices), 1, 1, 'R'); 
    }
    
    
}

$pdf = new PDF_receipt(); 
$pdf->AddPage(); 
$pdf->SetFont('Arial', '', 12);
$pdf->PriceTable($_POST['product'], $_POST['price']);
$pdf->Output('../rincian/'.$picknospd.'.pdf', 'F');

echo "<script> 
        alert('file tersimpan');
        document.location.href='spd_upload.php?id=$idspd';
         </script>";

?>