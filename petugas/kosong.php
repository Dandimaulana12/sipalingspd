<?php
$isi = $_GET["isi"];
$id  = $_GET["id"];
if($isi == "kosong"){
    echo "<script> 
    alert('File Belum Diupload');
    document.location.href='spd_upload.php?id=$id';
     </script>";
}

?>