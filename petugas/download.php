<?php 
include '../koneksi.php';
session_start();

function query($query){
	global $koneksi;
	$result = mysqli_query($koneksi,$query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row ;
	}
	return $rows;
}

$post = $_POST["files"];  
$id_spd = $_POST["idspd"];

$readdataspd = query("SELECT * from tabel_spd where spd_id='$id_spd'")[0];
$pickno_spd = $readdataspd["no_spd"];
$keterangan = "Proses Pengecekan";
 

    $file_folder = "../arsip/$pickno_spd/";// folder untuk load file

    if(extension_loaded('zip')) {   //memeriksa ekstensi zip

         if(isset($post) and count($post) > 0) {   //memeriksa file yang dipilih

             $zip = new ZipArchive(); // Load zip library  

              $zip_name = $pickno_spd.".zip";  // nama Zip  

              
              if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE) {   //Membuka file zip untuk memuat file

                   $error .= "* Maaf Download ZIP gagal"; 
                   

              } 

              foreach($post as $file){  

                   $zip->addFile($file_folder.$file); // Menambahkan files ke zip 

              } 

              $zip->close(); 

              if(file_exists($zip_name))  {  // Unduh Zip 

                   header('Content-type: application/zip'); 

                   header('Content-Disposition: attachment; filename="'.$zip_name.'"'); 

                   readfile($zip_name);  

                   unlink($zip_name);
                   
                   $senddata =  mysqli_query($koneksi, "UPDATE tabel_spd SET keterangan='$keterangan' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
                 
                    

              } 

         }else { 
        
              $error .= "* Tidak ada file yang di pilih"; 
        
         } 
     
    } else { 
    
         $error .= "* Zip ekstensi tidak ada"; 
    
    } 
    
   

?>