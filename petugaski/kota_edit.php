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
                    <h3 class="panel-title">Edit Kota</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="petugas.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                    $data = mysqli_query($koneksi, "SELECT * from tb_kota where id_kota='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>
                    <form method="post" action="ubah_kota.php" enctype="multipart/form-data">
                       <input type="hidden" name="id_kota" value="<?php echo $d['id_kota']?>">
                        <div class="form-group">
                            <label>Nama Kota :</label>
                            <input type="text" class="form-control" name="nama_kota" required="required"
                             value="<?php echo $d['nama_kota']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Rupiah :</label>
                            <input type="text" class="form-control" name="rupiah" required="required" 
                            value="<?php echo $d['rupiah']; ?>"
                            >
                            <label>*note: jangan pake titik dan koma</label>
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