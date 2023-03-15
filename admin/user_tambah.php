<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Tambah User</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">User</span></li>
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
                    <h3 class="panel-title">Tambah User</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="petugas.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                    <br>
                    <br>
                    <form action="">
                    <label>Cari Golongan:</label>
                    <input type="text" name="cari">
                    <input type="submit" value="Cari">
                    <br>
                    <?php 
                    if(isset($_GET['cari'])){
                	$cari = $_GET['cari'];
                	echo "<b>Hasil pencarian : ".$cari."</b>";
                    }
                    ?>
                    </form>
                    <form method="post" action="user_aksi.php" enctype="multipart/form-data">
                    <div class="form-group">
                            <label>Golongan :</label>
                            <select class="form-control" name="golongan" required="required"
                            >
                            <?php
                               $no = 1;
                               if(isset($_GET['cari'])){
                                   $cari = $_GET['cari'];
                                   $gol = mysqli_query($koneksi,"SELECT * FROM tb_golongan where pangkat  like '%".$cari."%'
");                             
                                   $hasilrow = mysqli_num_rows($gol);
                                   if ($hasilrow < 1) {
                                    echo "<script> 
           alert('data tidak ditemukan');

            </script>";
                                } 

                                }else{
                                   $gol = mysqli_query($koneksi,"SELECT * FROM tb_golongan
                                   ");
                               }
                                ?>
                             <option value="Pilih Golongan">Pilih Golongan</option>
                                   
                             <?php
                                while($gol1 = mysqli_fetch_array($gol)){
                                    ?>
                                    <option value="<?php echo $gol1['id_gol']; 
                                    $readid = $gol1["id_gol"];
                                    global $readid; ?>"><?php echo $gol1['pangkat']; ?></option>
            
                                    <?php 
                                }              
                                ?>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label>Nama :</label>
                            <input type="text" class="form-control" name="nama" required="required">
                        </div>
                        <div class="form-group">
                            <label>Jabatan :</label>
                            <input type="text" class="form-control" name="jabatan" required="required">
                        </div>
                        
                        <div class="form-group">
                            <label>Status :</label>
                            <select class="form-control"  name="status">
                                <option value="PNS">PNS</option>
                                <option value="Non-PNS">Non-PNS</option>
                            </select>  
                        </div>

                        <div class="form-group">
                            <label>Username :</label>
                            <input type="text" class="form-control" name="username" required="required">
                        </div>

                        <div class="form-group">
                            <label>Password :</label>
                            <input type="password" class="form-control" name="password" required="required">
                        </div>

                        <div class="form-group">
                            <label>Foto :</label>
                            <input type="file" name="foto">
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