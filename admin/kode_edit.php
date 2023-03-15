<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Ubah Kode ST</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Kode ST</span></li>
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
                    <h3 class="panel-title">Ubah Kode ST</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="data_kode.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                $data = mysqli_query($koneksi, "SELECT * from tb_kode where id_kode='$id'");
                while($d = mysqli_fetch_array($data)){
                    ?>
                    <form method="post" action="kode_update.php" enctype="multipart/form-data">
                       <input type="hidden" name="id_kode" value="<?php echo $d['id_kode']?>">
                       <div class="form-group">
                            <label>Nama Kode:</label>
                            <input type="text" class="form-control" name="nama_kode" required="required" value="<?php 
                            echo $d['nama_kode'];
                            
                            ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label>Kegiatan 1:</label>
                            <input type="text" class="form-control" name="kegiatan1" value="<?php 
                            $isi_kegiatan1 = $d['kegiatan'];
                            $ganti = str_replace('-', '', $isi_kegiatan1);
                            echo trim($ganti);?>"
                            >
                        </div>
                        <div class="form-group">
                            <label>Kegiatan 2:</label>
                            <input type="text" class="form-control" name="kegiatan2" value="<?php
                            $isi_kegiatan2 =  $d['kegiatan2'];
                            $ganti2 = str_replace('-', '', $isi_kegiatan2);
                            echo trim($ganti2);?>"
                            >
                        </div>
                        <div class="form-group">
                            <label>Kegiatan 3:</label>
                            <input type="text" class="form-control" name="kegiatan3" value="<?php 
                            $isi_kegiatan3 =  $d['kegiatan3'];
                            $ganti3 = str_replace('-', '', $isi_kegiatan3);
                            echo trim($ganti3); ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label>Kegiatan 4:</label>
                            <input type="text" class="form-control" name="kegiatan4" value="<?php 
                            $isi_kegiatan4 = $d['kegiatan4'];
                            $ganti4 = str_replace('-', '', $isi_kegiatan4);
                            echo trim($ganti4); ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label>Kegiatan 5:</label>
                            <input type="text" class="form-control" name="kegiatan5" value="<?php 
                            $isi_kegiatan5 = $d['kegiatan5'];
                            $ganti5 = str_replace('-', '', $isi_kegiatan5);
                            echo trim($ganti5);?>"
                            >
                        </div>
                        <div class="form-group">
                            <label>Kegiatan 6:</label>
                            <input type="text" class="form-control" name="kegiatan6" value="<?php 
                             $isi_kegiatan6 = $d['kegiatan6'];
                             $ganti6 = str_replace('-', '', $isi_kegiatan6);
                             echo trim($ganti6);?>"
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