<?php include 'header.php'; ?>


<?php 
$error = ""; 
?>
<div class="breadcome-area">
    <div class="container-fluid" style="width:2010px;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading" >
                                <h4 style="margin-bottom: 0px">Data SPD</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">SPD</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="width:1980px;">



    <div class="panel" style="width:1980px;">

        <div class="panel-heading" style="width:1980px;">
            <h3 class="panel-title">Data SPD</h3>
            
        </div>
        <div class="form-group" style="position:absolute; left:230px;">
                            <label>Filter:</label>
                            <form action="" method="GET" id="filter_data">
                            <select class="form-control" style="width:400px;" name="filter" onchange="document.getElementById('filter_data').submit()"
                            >
                            <?php
                            // if(isset($_GET["filter"]) && !empty($_GET["filter"]) && $_GET["filter"] == "filter_menunggu"){
                            //     $selected = 'selected';
                            // }elseif(isset($_GET["filter"]) && !empty($_GET["filter"]) && $_GET["filter"] == "all_datas"){
                            //     $selected = 'selected';
                            // }
                            ?>
                             <option value="pilih_filter" <?php
                             if(isset($_GET["filter"]) && !empty($_GET["filter"]) && $_GET["filter"] == "pilih_filter"){
                                echo "selected";
                            }else{
                                echo "";
                            }?>>Pilih Filter</option>
                             <option value="all_datas" <?php
                             if(isset($_GET["filter"]) && !empty($_GET["filter"]) && $_GET["filter"] == "all_datas"){
                                echo "selected";
                            }else{
                                echo "";
                            }?>>Seluruh Data</option>
                             <option value="filter_menunggu" <?php
                             if(isset($_GET["filter"]) && !empty($_GET["filter"]) && $_GET["filter"] == "filter_menunggu"){
                                echo "selected";
                            }else{
                                echo "";
                            }?>>Menunggu Proses Pembayaran</option>
                             
                            </select>
                            </form>
        </div>
        <div class="panel-body" style="width:1980px;">

            <br>
            <br>
            <br>
            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                <tr>
                        <th width="1%">No</th>
                        <th class="text-center">Nama Pegawai</th>
                        <th class="text-center">Jabatan Pegawai</th>
                        <th class="text-center">Golongan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">no.SPD</th>
                        <th class="text-center">no.ST</th>
                        <th class="text-center">Kota Tujuan ST</th>
                        <th class="text-center">Kode ST</th>
                        <th class="text-center">Perihal ST</th>
                        <th class="text-center">Tanggal Berangkat</th>
                        <th class="text-center">Tanggal Pulang</th>
                        <th class="text-center">Teliti Dokumen</th>
                        <th class="text-center">Teliti Rincian Perhitungan SPD</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Rincian Perhitungan SPD</th>
                        <th class="text-center" width="20%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                   
                   $no = 1;
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
                    $null = "";
                    @$isi_filter = $_GET["filter"];
                    if(isset($_GET["filter"])){
                        if($isi_filter == "filter_menunggu"){
                        $spd = mysqli_query($koneksi, "SELECT * FROM tabel_spd WHERE status_file='selesai' and file1 != '' and file2 != '' and file3 != '' and status_admin='Menunggu Admin' order by spd_id ASC");
                    
                        }
                        elseif($isi_filter == "all_datas"){
                            $spd = mysqli_query($koneksi,"SELECT * FROM tabel_spd where status_file='selesai' and file1 != '$null' and file2 != '$null' and file3 != '$null'");
                        
                        }
                        elseif($isi_filter == "pilih_filter"){
                            echo "<script>
                            document.location.href='dataspd.php';
                           </script>";
                            $spd = mysqli_query($koneksi,"SELECT * FROM tabel_spd where status_file='selesai' and file1 != '$null' and file2 != '$null' and file3 != '$null'");
                        
                        }
                    }else{
                        $spd = mysqli_query($koneksi,"SELECT * FROM tabel_spd where status_file='selesai' and file1 != '$null' and file2 != '$null' and file3 != '$null'");
                    
                    }

                    while ($p = mysqli_fetch_array($spd)){
                    $pickidspd = $p["spd_id"];
                     
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td width="800"><?php echo $p['nama'] ?></td>
                            <td><?php echo $p['jabatan'] ?></td>
                            <td><?php echo $p['golongan'] ?></td>
                            <td><?php echo $p['status'] ?></td>
                            <td><?php echo $p['no_spd'] ?></td>
                            <td><?php echo $p['no_st'] ?></td>
                            <td><?php echo $p['tujuan_st'] ?></td>
                            <td><?php echo $p['kode_st'] ?></td>
                            <td width="1800"><?php echo $p['perihal'] ?></td>
                            <td><?php echo $p['tgl_berangkat'] ?></td>
                            <td><?php echo $p['tgl_pulang'] ?></td>
                            
                            <td class="text-center">
                            <div class="btn-group">
                                <a href="data_file.php?idspd=<?php echo $pickidspd;?>&filter=<?php echo $isi_filter;?>" class="btn btn-default">Lihat</a>
                            </div>

                            </td>
                            <td class="text-center">
                            <div class="btn-group">
                                <?php
                                $pickid_spd = $p["spd_id"];
                                @$readfilerincian = query("SELECT * from tb_rincian where id_spd='$pickid_spd'")[0];
                                @$pickfile = @$readfilerincian["file_rincian"];
                                
                                ?>
                                    <a target="_blank" class="btn btn-default" href="
                                    <?php 
                                    if(@$pickfile == ""){
                                         if($isi_filter == "filter_menunggu"){
                                            echo 'dataspd.php?file tidak ada&filter='.$isi_filter;
                                            }
                                            elseif($isi_filter == "all_datas"){
                                                echo 'dataspd.php?file tidak ada&filter='.$isi_filter;
                                     
                                            }elseif($isi_filter == "pilih_filter"){
                                             echo  'dataspd.php?file tidak ada&filter='.$isi_filter;
                                        
                                            }
                                            else{
                                                echo 'dataspd.php?file tidak ada';
                                            }
                                    }else{
                                    ?>../rincian/<?php echo @$pickfile;
                                    }?>"><i class="fa fa-download"></i></a>
                            </div>  
                            </td>
                            <td width="800">
                            <?php  
                            echo $hasilket = $p['keterangan'];
                           
                            ?>
                            </td>
                            <td class="text-center">
                            <div class="btn-group">
                                <?php
                                $pickgol = $p["status"];
                                if ($pickgol == "Non-PNS") {
                                ?>
                                    <a target="" class="btn btn-default" href="spd_uploadnon.php?id=<?php echo $p['spd_id']; ?>&filter=<?php echo $isi_filter;?>"><i class="fa fa-upload"></i></a>
                                <?php
                                } 
                                elseif ($pickgol == "PNS") {
                                ?>
                                    <a target="" class="btn btn-default" href="spd_upload.php?id=<?php echo $p['spd_id']; ?>&filter=<?php echo $isi_filter;?>"><i class="fa fa-upload"></i></a>
                                
                                <?php 
                                }?>
                            </div>
                            </td>
                            <td class="text-center" width="1000">
                            <div class="btn-group">     
                                <a target="" href="spd_edit.php?id=<?php echo $p['spd_id']; ?>&filter=<?php echo $isi_filter;?>" class="btn btn-default">Edit</a>
                                <a target="" href="spd_acc.php?idacc=<?php echo $p['spd_id']; ?>&data=data_all&filter=<?php echo $isi_filter;?>" class="btn btn-success btn-md">Acc</a>
                                <br>
                                <center>
                                <a href="#" type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal<?php echo $p['spd_id']; ?>">Tolak</a>
                                </center>
                            </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="myModal<?php echo $p['spd_id']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Update Status User</h4>
</div>
<div class="modal-body">
<form role="form" action="edittolak.php" method="get">

<?php
$id = $p['spd_id']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM tabel_spd WHERE spd_id='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>

<input type="hidden" name="id_alasan" value="<?php echo $row['spd_id']; ?>">
<input type="hidden" name="filter_datas" value="<?php echo $isi_filter;?>">

<div class="form-group">
<label>Alasan Menolak : </label>
<input type="text" name="alasan" class="form-control" value="">      
</div>

<div class="modal-footer">  
<button type="submit" class="btn btn-success">Kirim</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>

<?php 
}
//mysql_close($host);
?>        
</form>
</div>
</div>

</div>
</div>
                        <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
        &emsp;<a href="export.php"><button style="left:5px; bottom: 30px; position: relative;">Export to Excel</button></a>
        <br>
        <br>
        <form action="hapusdata.php" method="POST">
        
        <div class="form-group mt-4" style=" width: 200px; left:20px; bottom: 30px; position: relative;">
            <label>Dari Tanggal :</label>             
            <input type="datetime-local" class="form-control" name="tgl_awal" id="mulai">
        </div>
        <div class="form-group mt-4" style=" width: 200px; left:20px; bottom: 30px; position: relative; ">
            <label>Sampai Tanggal :</label>             
            <input type="datetime-local" class="form-control" name="tgl_akhir" id="mulai">
        </div>
        <div class="btn-group" style="left:20px; bottom: 30px; position: relative; ">     
        <button class="btn btn-success btn-md"> Hapus </button>    
                                    
        </div>
        </form>
        <br>
    </div>    
</div>

<!-- footer -->
<div class="footer-copyright-area mg-t-30" style="width:2010px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="footer-copy-right">
					<p>Copyright © <?php echo date('Y') ?>&nbsp;Seksi Pengawasan I KPP Pratama Tanjung.</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<script src="../assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/wow.min.js"></script>
<script src="../assets/js/jquery-price-slider.js"></script>
<script src="../assets/js/jquery.meanmenu.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/jquery.sticky.js"></script>
<script src="../assets/js/jquery.scrollUp.min.js"></script>
<script src="../assets/js/counterup/jquery.counterup.min.js"></script>
<script src="../assets/js/counterup/waypoints.min.js"></script>
<script src="../assets/js/counterup/counterup-active.js"></script>
<script src="../assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../assets/js/scrollbar/mCustomScrollbar-active.js"></script>
<script src="../assets/js/metisMenu/metisMenu.min.js"></script>
<script src="../assets/js/metisMenu/metisMenu-active.js"></script>
<script src="../assets/js/morrisjs/raphael-min.js"></script>
<script src="../assets/js/morrisjs/morris.js"></script>
<script src="../assets/js/morrisjs/morris-active.js"></script>
<script src="../assets/js/sparkline/jquery.sparkline.min.js"></script>
<script src="../assets/js/sparkline/jquery.charts-sparkline.js"></script>
<script src="../assets/js/sparkline/sparkline-active.js"></script>
<script src="../assets/js/calendar/moment.min.js"></script>
<script src="../assets/js/calendar/fullcalendar.min.js"></script>
<script src="../assets/js/calendar/fullcalendar-active.js"></script>
<script src="../assets/js/plugins.js"></script>
<script src="../assets/js/main.js"></script>

<script src="../assets/js/DataTables/datatables.js"></script>
<script src="../assets/js/pdf/jquery.media.js"></script>
<script src="../assets/js/pdf/pdf-active.js"></script>


<script type="text/javascript">
	$(document).ready( function () {
		$('.table-datatable').DataTable();


		Morris.Area({
			element: 'extra-area-chart',
			data: [

			<?php 
			$dateBegin = strtotime("first day of this month");  
			$dateEnd = strtotime("last day of this month");

			$awal = date("Y/m/d", $dateBegin);         
			$akhir = date("Y/m/d", $dateEnd);

			$arsip = mysqli_query($koneksi,"SELECT * FROM riwayat WHERE date(riwayat_waktu) >= '$awal' AND date(riwayat_waktu) <= '$akhir'");
			while($p = mysqli_fetch_array($arsip)){
				$tgl = date('Y/m/d',strtotime($p['riwayat_waktu']));
				$jumlah = mysqli_query($koneksi,"select * from riwayat where date(riwayat_waktu)='$tgl'");
				$j = mysqli_num_rows($jumlah);
				?>
				{
					period: '<?php echo date('Y-m-d',strtotime($p['riwayat_waktu'])) ?>',
					Unduh: <?php echo $j ?>,
				},
				<?php 
			}
			?>

			],
			xkey: 'period',
			ykeys: ['Unduh'],
			labels: ['Unduh'],
			xLabels: 'day',
			xLabelAngle: 45,
			pointSize: 3,
			fillOpacity: 0,
			pointStrokeColors:['#006DF0'],
			behaveLikeLine: true,
			gridLineColor: '#e0e0e0',
			lineWidth: 1,
			hideHover: 'auto',
			lineColors: ['#006DF0'],
			resize: true

		});
	});


</script>
</body>

</html>
