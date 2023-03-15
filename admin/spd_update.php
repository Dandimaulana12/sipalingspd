<?php 
include '../koneksi.php';
session_start();
$no_spd  = $_POST['no_spd1'];
$no_st = $_POST['no_st'];
$kode_lama = $_POST['kode_lama'];
$hasilkode = $_POST['hasil_kode'];
$kota = $_POST['kota'];
$berangkat = $_POST['tgl_berangkat'];
$pulang = $_POST['tgl_pulang'];
$perihal = $_POST['perihal'];
$id_spd = $_POST['id_spd'];
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

$user = $_SESSION['id'];
$readdataspd = query("SELECT * from tabel_spd where spd_id='$id_spd' ")[0];
$picknospd1 = $readdataspd["no_spd"];
$pickkodest = $readdataspd["kode_st"];
$pickuser = $readdataspd["status_user"];
$pickki = $readdataspd["status_ki"];
$pickverif = $readdataspd["status_verif"];
$pickadmin = $readdataspd["status_admin"];
$statususer = "Menunggu Verifikasi";
$statuski = "Menunggu KI";
$datakota = query("SELECT * from tb_kota where id_kota='$kota' ")[0];
$tujuan = $datakota["nama_kota"];
$isi_filter = '';

	if($filter == "filter_menunggu"){
	$isi_filter = 'dataspd.php?alert=sukses&filter='.$filter;
	}
	elseif($filter == "all_datas"){
	$isi_filter =  'dataspd.php?alert=sukses&filter='.$filter;
			 
	}elseif($filter == "pilih_filter"){
	$isi_filter =  'dataspd.php?alert=sukses&filter='.$filter;
				
	}
	else{
	$isi_filter =  'dataspd.php?alert=sukses';
	}
// admin
if($pickadmin == "Menolak"){
    $update1 = mysqli_query($koneksi, "UPDATE tabel_spd set keterangan='$statususer',status_user='$statususer',status_ki='$statuski' where no_spd= '$picknospd1'")or die(mysqli_error($koneksi));
    if ($update1 > 0) {
		if($pickkodest == $kode_lama ){
			$updatekode_st = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
			header("location:$isi_filter");
		}else if($pickkodest != $kode_lama){
			$updatekode_st1 = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
			header("location:$isi_filter");
		}
    }
    }
	 // admin
	 elseif($pickuser == "Menunggu Admin"){
		$update1111 = mysqli_query($koneksi, "UPDATE tabel_spd set keterangan='$statususer',status_user='$statususer',status_ki='$statuski' where no_spd= '$picknospd1'")or die(mysqli_error($koneksi));
		if ($update1111 > 0) {
			if($pickkodest == $kode_lama ){
				$updatekode_st = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
				header("location:$isi_filter");
			}else if($pickkodest != $kode_lama){
				$updatekode_st1 = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
				header("location:$isi_filter");
			}
		}
	}
    // petugas KI
    elseif($pickki == "KI Menolak"){
        $update11 = mysqli_query($koneksi, "UPDATE tabel_spd set keterangan='$statususer',status_user='$statususer',status_ki='$statuski' where no_spd= '$picknospd1'")or die(mysqli_error($koneksi));
        if ($update11 > 0) {
			if($pickkodest == $kode_lama ){
				$updatekode_st = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
				header("location:$isi_filter");
			}else if($pickkodest != $kode_lama){
				$updatekode_st1 = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
				header("location:$isi_filter");
			}
        }
        }
	 // petugas KI
	 elseif($pickki == "KI ACC"){
        $update11 = mysqli_query($koneksi, "UPDATE tabel_spd set keterangan='$statususer',status_user='$statususer',status_ki='$statuski' where no_spd= '$picknospd1'")or die(mysqli_error($koneksi));
        if ($update11 > 0) {
			if($pickkodest == $kode_lama ){
				$updatekode_st = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
				header("location:$isi_filter");
			}else if($pickkodest != $kode_lama){
				$updatekode_st1 = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
				header("location:$isi_filter");
			}
        }
     }
	  // petugas KI
	  elseif($pickki == "Menunggu KI"){
        $update11 = mysqli_query($koneksi, "UPDATE tabel_spd set keterangan='$statususer',status_user='$statususer',status_ki='$statuski' where no_spd= '$picknospd1'")or die(mysqli_error($koneksi));
        if ($update11 > 0) {
			if($pickkodest == $kode_lama ){
				$updatekode_st = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
				header("location:$isi_filter");
			}else if($pickkodest != $kode_lama){
				$updatekode_st1 = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
				header("location:$isi_filter");
			}
        }
        }
        // kepegawaian
        elseif($pickverif == "Verif Menolak"){
            $update111 = mysqli_query($koneksi, "UPDATE tabel_spd set keterangan='$statususer',status_user='$statususer',status_ki='$statuski' where no_spd= '$picknospd1'")or die(mysqli_error($koneksi));
            if ($update111 > 0) {
				if($pickkodest == $kode_lama ){
					$updatekode_st = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
					header("location:$isi_filter");
				}else if($pickkodest != $kode_lama){
					$updatekode_st1 = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
					header("location:$isi_filter");
				}
            }
            }
		    // kepegawaian
			elseif($pickverif == "Verif ACC"){
				$update111 = mysqli_query($koneksi, "UPDATE tabel_spd set keterangan='$statususer',status_user='$statususer',status_ki='$statuski' where no_spd= '$picknospd1'")or die(mysqli_error($koneksi));
				if ($update111 > 0) {
					if($pickkodest == $kode_lama ){
						$updatekode_st = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
						header("location:$isi_filter");
					}else if($pickkodest != $kode_lama){
						$updatekode_st1 = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
						header("location:$isi_filter");
					}
				}
				}
			    // kepegawaian
				elseif($pickverif == "Menunggu Verificator"){
					$update111 = mysqli_query($koneksi, "UPDATE tabel_spd set keterangan='$statususer',status_user='$statususer',status_ki='$statuski' where no_spd= '$picknospd1'")or die(mysqli_error($koneksi));
					if ($update111 > 0) {
						if($pickkodest == $kode_lama ){
							$updatekode_st = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
							header("location:$isi_filter");
						}else if($pickkodest != $kode_lama){
							$updatekode_st1 = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
							header("location:$isi_filter");
						}
					}
					}
            // user
            elseif($pickuser == "Menunggu Verifikasi"){
                $update1111 = mysqli_query($koneksi, "UPDATE tabel_spd set keterangan='$statususer',status_user='$statususer',status_ki='$statuski' where no_spd= '$picknospd1'")or die(mysqli_error($koneksi));
                if ($update1111 > 0) {
					if($pickkodest == $kode_lama ){
						$updatekode_st = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
						header("location:$isi_filter");
					}else if($pickkodest != $kode_lama){
						$updatekode_st1 = mysqli_query($koneksi, "UPDATE tabel_spd SET no_spd='$no_spd',no_st='$no_st',kode_st='$hasilkode',tujuan_st='$tujuan',tgl_berangkat='$berangkat',tgl_pulang='$pulang',perihal='$perihal' where spd_id='$id_spd'")or die(mysqli_error($koneksi));
						header("location:$isi_filter");
					}
                }
            }
