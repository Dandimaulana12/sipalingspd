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
                     $data = mysqli_query($koneksi, "SELECT * from tabel_spd where spd_id='$id'");
                     while($d = mysqli_fetch_array($data)){ 
                    ?>
                    <form action="">
                    <label>Cari Kota:</label>
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="text" name="cari">
                    <input type="submit" value="Cari">
                    <br>
                    <?php 
                    if(isset($_GET['cari'])){
                	$cari = $_GET['cari']; 
                    $idd = $_GET['id'];
                	echo "<b>Hasil pencarian : ".$cari."</b>";
                    }
                    ?>
                    </form>
                    <form method="post" action="spd_rincian.php" enctype="multipart/form-data">
                       <input type="hidden" name="idd" value="<?php echo $d['spd_id']?>">
                        <div class="form-group">
                            <label>Tujuan ST :</label>
                        
                            <select class="form-control" name="tujuan" required="required">
                            <?php
                               $no = 1;
                               if(isset($_GET['cari'])){
                                   $cari = $_GET['cari'];
                                   $kategori = mysqli_query($koneksi,"SELECT * FROM tb_kota where nama_kota  like '%".$cari."%'
");                             
                                   $hasilrow = mysqli_num_rows($kategori);
                                   if ($hasilrow < 1) {
                                    echo "<script> 
           alert('data tidak ditemukan');

            </script>";
                                } 

                                }else{
                                   $kategori = mysqli_query($koneksi,"SELECT * FROM tb_kota
                                   ");
                               }
                                ?>
                                <?php 
                                
                                $no = 1;
                                
                                while($k = mysqli_fetch_array($kategori)){
                                    ?>
                                    <option value="<?php echo $k['id_kota']; ?>"><?php echo $k['nama_kota']; ?> - Rp <?php echo $k['rupiah']; ?></option>
                                    <?php 
                                }
                                ?>
                            </select>
                    </div>
                        <div class="form-group">
                            <label>Jumlah Hari :</label>
                            <input type="text" class="form-control" name="hari" required="required" value="0"
                            >
                        </div>
                        <div class="form-group">
                            <label>pengeluaran kuitansi :</label>
                            <input type="text" class="form-control" name="kuitansi" required="required" value="0"
                            >
                        </div>
                        <div class="form-group">
                            <label>daftar pengeluaran riil :</label>
                            <input type="text" class="form-control" name="riil" required="required" value="0"
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
                    <?php
                    $rincian = mysqli_query($koneksi, "SELECT * from tb_rincian where id_spd='$id'");
                    while($readrincian = mysqli_fetch_array($rincian)){ 
                   ?>
                    <form method="POST" action="spd_receipt.php">
                       <input type="hidden" name="idd" value="<?php echo $readrincian['id_spd']?>">
                       <fieldset> 
    <legend>Hasil</legend> 
    <table> 
        <thead> 
            <tr><td>Daftar File</td><td>&nbsp;Price</td></tr> 
        <thead> 
        <tbody> 
            <tr> 
                <td><input type='text' value='Tujuan ST' name='namakota'  /></td> 
                <td>&nbsp;: <input type='text' value='<?php echo $readrincian['st_tujuan']?>' name='price[]'  /></td> 
            </tr> 
            <tr> 
                <td><input type='text' value='Jumlah Hari' name='product[]' /></td> 
                <td>&nbsp;:&nbsp;<input type='text' value='<?php echo $readrincian['jumlah_hari']?>' name='price[]' /></td> 
            </tr> 
            <tr> 
                <td><input type='text' value='Pengeluaran Kuitansi' name='product[]' /></td> 
                <td>&nbsp;Rp <input type='text' value='<?php echo $readrincian['kuitansi']?>' name='price[]' /></td> 
            </tr> 
            <tr> 
                <td><input type='text' value='Daftar Pengeluaran Riil' name='product[]' /></td> 
                <td>&nbsp;Rp <input type='text' value='<?php echo $readrincian['riil']?>' name='price[]' /></td> 
            </tr>
            -------------------------
            <tr> 
                <td><input type='text' value='Total' name='total' /></td> 
                <td>&nbsp;Rp <input type='text' value='<?php 
                $st = $readrincian['st_tujuan'];
                $kuitansi = $readrincian['kuitansi'];
                $jumlahhari = $readrincian['jumlah_hari'];
                $riil = $readrincian['riil'];
                $sumharist = $st * $jumlahhari;
                $jumlah = $sumharist + $riil + $kuitansi ;
                echo $jumlah;
                ?>' name='jumlah' /></td> 
            </tr> 
        </tbody> 
    </table> 
</fieldset>
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