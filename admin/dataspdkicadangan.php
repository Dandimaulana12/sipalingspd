<?php include 'header.php'; ?>


<?php 
$error = ""; 
?>
<div class="breadcome-area">
    <div class="container-fluid" style="width:1600px;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading" >
                                <h4 style="margin-bottom: 0px">Data Arsip</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Arsip</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="width:1600px;">



    <div class="panel" >

        <div class="panel-heading" >
            <h3 class="panel-title">Data arsip</h3>
            
        </div>
        <div class="panel-body">

            <br>
            <br>
            <br>
            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                <tr>
                        <th width="1%">No</th>
                        <th class="text-center">Nama Pegawai</th>
                        <th class="text-center">Jabatan Pegawai</th>
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
                    $spd = mysqli_query($koneksi,"SELECT * FROM tabel_spd");

                    while ($p = mysqli_fetch_array($spd)){
                
                     
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $p['nama'] ?></td>
                            <td><?php echo $p['jabatan'] ?></td>
                            <td><?php echo $p['no_spd'] ?></td>
                            <td><?php echo $p['no_st'] ?></td>
                            <td><?php echo $p['tujuan_st'] ?></td>
                            <td><?php echo $p['kode_st'] ?></td>
                            <td><?php echo $p['perihal'] ?></td>
                            <td><?php echo $p['tgl_berangkat'] ?></td>
                            <td><?php echo $p['tgl_pulang'] ?></td>
                            
                            <td>
                            <form name="zips" method="post" action="download.php"> 
                            <input type="hidden" name="idspd" value="<?php echo $p['spd_id']?>"/>
                            
                            <input type="checkbox" name="files[]" value="<?php echo $p['file1'] ?>"/>
                            <a target="_blank" href="../arsip/<?php echo $p['no_spd']?>/<?php echo $p['file1'] ?>"><?php echo $p['file1']?></a>
                            <br>
                            <input type="checkbox" name="files[]" value="<?php echo $p['file2'] ?>"/>
                            <a target="_blank" href="../arsip/<?php echo $p['no_spd']?>/<?php echo $p['file2'] ?>"><?php echo $p['file2']?></a>
                            <br>
                            <input type="checkbox" name="files[]" value="<?php echo $p['file3'] ?>"/>
                            <a target="_blank" href="../arsip/<?php echo $p['no_spd']?>/<?php echo $p['file3'] ?>"><?php echo $p['file3']?></a>
                            <br>
                            <input type="checkbox" name="files[]" value="<?php echo $p['file4'] ?>"/>
                            <a target="_blank" href="../arsip/<?php echo $p['no_spd']?>/<?php echo $p['file4'] ?>"><?php echo $p['file4']?></a>
                            <br>
                            <input type="checkbox" name="files[]" value="<?php echo $p['file5'] ?>"/>
                            <a target="_blank" href="../arsip/<?php echo $p['no_spd']?>/<?php echo $p['file5'] ?>"><?php echo $p['file5']?></a>
                            <br>
                            <input type="checkbox" name="files[]" value="<?php echo $p['file6'] ?>"/>
                            <a target="_blank" href="../arsip/<?php echo $p['no_spd']?>/<?php echo $p['file6'] ?>"><?php echo $p['file6']?></a>
                            <br>
                            <script>
                            </script>
                            <input type="submit" value="unduh" />
                           
                            

                            </form>
                            </td>
                            <td class="text-center">
                            <div class="btn-group">
                                <?php
                                $pickid_spd = $p["spd_id"];
                                @$readfilerincian = query("SELECT * from tb_rincian where id_spd='$pickid_spd'")[0];
                                @$pickfile = @$readfilerincian["file_rincian"];
                                
                                ?>
                                    <a target="" class="btn btn-default" href="spd_download.php?filename=<?php 
                                   
                                        echo $pickfile;
                                    ?>"><i class="fa fa-download"></i></a>
                            </div>  
                            </td>
                            <td>
                            <?php  
                            echo $hasilket = $p['keterangan'];
                           
                            ?>
                            </td>
                            <td class="text-center">
                            <div class="btn-group">
                                <?php
                                $pickgol = $p["golongan"];
                                if ($pickgol == "Non-PNS") {
                                ?>
                                    <a target="" class="btn btn-default" href="spd_uploadnon.php?id=<?php echo $p['spd_id']; ?>"><i class="fa fa-upload"></i></a>
                                <?php
                                } 
                                elseif ($pickgol == "PNS") {
                                ?>
                                    <a target="" class="btn btn-default" href="spd_upload.php?id=<?php echo $p['spd_id']; ?>"><i class="fa fa-upload"></i></a>
                                
                                <?php 
                                }?>
                            </div>
                            </td>
                            <td class="text-center">
                            <div class="btn-group">     
                                <a target="" href="spd_acc.php?idacc=<?php echo $p['spd_id']; ?>" class="btn btn-success btn-md">Acc</a>
                                <a href="#" type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal<?php echo $p['spd_id']; ?>">Tolak</a>
                                    
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

    </div>
</div>

&emsp;<a href="export.php"><button>Export to Excel</button></a><br />
<?php include 'footer.php'; ?>
