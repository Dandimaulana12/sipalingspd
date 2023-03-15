<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Upload NPWP</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">NPWP</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">


    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Upload NPWP</h3>
                </div>
                <div class="panel-body">

                <?php
                    $saya = $_GET['id'];
                    function query($query){
                        global $koneksi;
                        $result = mysqli_query($koneksi,$query);
                        $rows = [];
                        while ($row = mysqli_fetch_assoc($result)) {
                            $rows[] = $row ;
                        }
                        return $rows;
                        }
                    $petugas = query("SELECT * FROM petugas where petugas_id='$saya'")[0];
                    ?>
                    <div class="pull-right">            
                        <a href="arsip_preview2.php?id=<?php echo $petugas['petugas_id'];?>" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <br>
                    <br>
                    <form method="post" action="npwp_aksi.php" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $petugas['petugas_id'];?>">
                        <div class="form-group">
                            <label>Kode NPWP</label>
                            <input type="text" class="form-control" name="kode_npwp" required="required">
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama_npwp" required="required">
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Upload">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


</div>


<?php include 'footer.php'; ?>