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
                                <h4 style="margin-bottom: 0px">Data Kode</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Kode</span></li>
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
            <h3 class="panel-title">Data Kode</h3>
            
        </div>
        <div class="panel-body">

            <div class="pull-right">
                <a href="tambah_kode.php" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Kode</a>
            </div>
            <br>
            <br>
            <br>
            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                <tr>
                        <th width="1%">No</th>
                        <th>Nama Kode</th>
                        <th>Kegiatan 1</th>
                        <th>Kegiatan 2</th>
                        <th>Kegiatan 3</th>
                        <th>Kegiatan 4</th>
                        <th>Kegiatan 5</th>
                        <th>Kegiatan 6</th>
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
                    $spd = mysqli_query($koneksi,"SELECT * FROM tb_kode");

                    while ($p = mysqli_fetch_array($spd)){
                
                     
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $p['nama_kode'] ?></td>
                            <td><?php echo $p['kegiatan'] ?></td>
                            <td><?php echo $p['kegiatan2'] ?></td>
                            <td><?php echo $p['kegiatan3'] ?></td>
                            <td><?php echo $p['kegiatan4'] ?></td>
                            <td><?php echo $p['kegiatan5'] ?></td>
                            <td><?php echo $p['kegiatan6'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">     
                                <a target="" href="kode_hapus.php?id=<?php echo $p['id_kode']; ?>" class="btn btn-default">Hapus</a>
                                <a target="" href="kode_edit.php?id=<?php echo $p['id_kode']; ?>" class="btn btn-default">Ubah</a>
                                    
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