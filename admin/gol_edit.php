<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Tambah Golongan</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Golongan</span></li>
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
                    <h3 class="panel-title">Tambah Golongan</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="data_gol.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                    <br>
                    <br>
                    <?php
                $id = $_GET['id'];    
                if (!is_numeric($id)){
                    echo "Yah.. Di Patch...<br>
                 Gak Jadi Ngehack + Mirror Deh,, Muehehehe...
                 <br>
                 Program BugBounty :<br>
                 /security<br>
                 
                 (Kalo Kamu Menemukan Bug/Celah Yang Dapat Berdampak Buruk Bagi System Kami,, Silahkan DiLaporkan Kepada Tim-IT Kami Ya.. Karena Kami Selalu Mengadakan Program BugBounty Hehehe :D )<br>
                 
                 Terimakasih Sebelumnya Yaa...
                 <br>
                 # ITsecurity - BL4CK.4TX ";
                    exit;
                 }            
                $data = mysqli_query($koneksi, "SELECT * from tb_golongan where id_gol='$id'");
                while($d = mysqli_fetch_array($data)){
                    ?>
                    <form method="post" action="gol_update.php" enctype="multipart/form-data">
                       <input type="hidden" name="id_gol" value="<?php echo $d['id_gol']?>">
                        <div class="form-group">
                            <label>Golongan:</label>
                            <input type="text" class="form-control" name="golongan" required="required" value="<?php echo $d['pangkat']?>"
                            >
                        </div>
                        
                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        
                        </div>

                    </form>
                    <?php
                    }
                   ?>
                    
                </div>
            </div>
        </div>
    </div>


</div>


<?php include 'footer.php'; ?>