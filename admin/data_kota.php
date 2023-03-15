<?php include 'header.php'; ?>


<?php 
$error = ""; 
?>
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
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

<div class="container-fluid">



    <div class="panel">

        <div class="panel-heading">
            <h3 class="panel-title">Data arsip</h3>
            
        </div>
        <div class="panel-body">

            <div class="pull-right">
                <a href="tambah_kota.php" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Kota</a>
            </div>
            <br>
            <br>
            <br>
            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                <tr>
                        <th width="1%">No</th>
                        <th>Nama Kota</th>
                        <th>Jumlah (PNS)</th>
                        <th>Jumlah (Non-PNS)</th>
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
                    $spd = mysqli_query($koneksi,"SELECT * FROM tb_kota");

                    while ($p = mysqli_fetch_array($spd)){
                
                     
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $p['nama_kota'] ?></td>
                            <td><?php echo $p['rupiah'] ?></td>
                            <td><?php echo $p['rupiah_non'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">     
                                <a target="" href="hapus_kota.php?id=<?php echo $p['id_kota']; ?>" class="btn btn-default">Hapus</a>
                                <a target="" href="kota_edit.php?id=<?php echo $p['id_kota']; ?>" class="btn btn-default">Ubah</a>
                                    
                            </div>
                            </td>
                        </tr>
                        <?php 
                    }
                    ?>
                </tbody>
            </table>


        </div>

    </div>
</div>


<?php include 'footer.php'; ?>