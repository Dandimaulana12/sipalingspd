<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Tambah SPD</h4>
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

<div class="container-fluid">


    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Tambah SPD</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="petugas.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                    <br>
                    <br>
                    <form method="post" action="kota_aksi.php" enctype="multipart/form-data">
                       <input type="hidden" name="idd" value="<?php echo $d['spd_id']?>">
                        <div class="form-group">
                            <label>Nama Kota :</label>
                            <input type="text" class="form-control" name="nama_kota" required="required"
                            >
                        </div>
                        <div class="form-group">
                            <label>Jumlah(Untuk PNS) :</label>
                            <input type="text" class="form-control" name="rupiah" required="required" value="0"
                            >
                            <label>*note: jangan pake titik dan koma</label>
                        </div>
                        <div class="form-group">
                            <label>Jumlah(Untuk Non-PNS):</label>
                            <input type="text" class="form-control" name="rupiahnon" required="required" value="0"
                            >
                            <label>*note: jangan pake titik dan koma</label>
                        </div>
                        
                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        
                        </div>

                    </form>
                   
                    
                </div>
            </div>
        </div>
    </div>


</div>


<?php include 'footer.php'; ?>