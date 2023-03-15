<?php include 'header.php'; ?>


<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Edit User</h4>
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
                    <h3 class="panel-title">Edit User</h3>
                </div>
                <div class="panel-body">
                    <div class="pull-right">            
                        <a href="user.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <br>
                    <br>

                    <?php 
                    $id = $_GET['id'];  
                    if (!is_numeric($id)) {
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
                     function query($query){
                        global $koneksi;
                        $result = mysqli_query($koneksi,$query);
                        $rows = [];
                        while ($row = mysqli_fetch_assoc($result)) {
                            $rows[] = $row ;
                        }
                        return $rows;
                    }  
                    $data = mysqli_query($koneksi, "select * from user where user_id='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>
 <br>
                    <form action="">
                    <label>Cari Golongan:</label>
                    <input type="hidden" name="id" value="<?php echo $d['user_id']; ?>">
                    <input type="text" name="cari">
                    <input type="submit" value="Cari">
                    <br>
                    <?php 
                    if(isset($_GET['cari'])){
                	$cari = $_GET['cari'];
                    global $cari;
                	echo "<b>Hasil pencarian : ".$cari."</b>";
                    }
                    ?>
                    </form>
                        <form method="post" action="user_update.php" enctype="multipart/form-data">
                            
                        
                        <div class="form-group">
                            <label>Pilih golongan:</label>
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
                             <option value="<?php
                             $readgol = $d['golongan']; 
                             $parsegol = query("SELECT *from tb_golongan where pangkat='$readgol'")[0];
                             $pickidgol = $parsegol["id_gol"];
                             $pickpangkat = $parsegol["pangkat"];

                             echo $pickidgol;
                             ?>"><?php 
                             if (isset($_GET['cari'])) {
                                $cari2 = $_GET['cari'];
                                $parsecari = query("SELECT * from tb_golongan where pangkat like '%".$cari2."%' ")[0];
                                $pickcarigol = $parsecari["pangkat"];
                                echo $pickcarigol;
                             }else{
                             echo $pickpangkat;
                             }
                             ?></option>
                            
                             <?php
                             if (isset($_GET['cari'])) {
                                $allgol = mysqli_query($koneksi,"SELECT * FROM tb_golongan where pangkat not in ('$pickcarigol')");
                                   
                                while($gol1 = mysqli_fetch_array($allgol)){
                                    ?>
                                    <option value="<?php
                                    $idgol1 = $gol1["id_gol"];
                                    $golongan = $gol1["pangkat"];
                                    if($readgol == $pickpangkat){
                                         echo $idgol1;
                                    }
                                    ?>">
                                    <?php 
                                    if($readgol == $pickpangkat){
                                        echo $golongan;
                                    }

                                    ?>
                                    </option>
                                   
                                    <?php 
                                }  
                             }else{
                             $allgol = mysqli_query($koneksi,"SELECT * FROM tb_golongan where pangkat not in ('$pickpangkat')");
                                   
                                while($gol1 = mysqli_fetch_array($allgol)){
                                    ?>
                                    <option value="<?php
                                    $idgol1 = $gol1["id_gol"];
                                    $golongan = $gol1["pangkat"];
                                    if($readgol == $pickpangkat){
                                         echo $idgol1;
                                    }
                                    ?>">
                                    <?php 
                                    if($readgol == $pickpangkat){
                                        echo $golongan;
                                    }

                                    ?>
                                    </option>
                                   
                                    <?php 
                                }  
                            }            
                                ?>
                            </select>   
                        </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="hidden" name="id" value="<?php echo $d['user_id']; ?>">
                                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['user_nama']; ?>">
                            </div>
        
                            <div class="form-group">
                                <label>Jabatan :</label>
                                <input type="text" class="form-control" name="jabatan" required="required" value="<?php echo $d['jabatan']; ?>">
                            </div>
                            
                        <div class="form-group">
                            <label>Pilih status:</label>
                            <select class="form-control" name="status" required="required"
                            >
                             <option value="<?php
                             $readstatus = $d['status'];
                             echo $readstatus;
                             ?>"><?php echo $readstatus; ?></option>
                            
                                    <option value="
                                    <?php 
                                    if ($readstatus == "PNS") {
                                    $pns = "PNS";
                                    $nonpns = "Non-PNS";
                                    echo $nonpns;
                                    
                                    }elseif ($readstatus == "Non-PNS") {
                                        $pns = "PNS";
                                        $nonpns = "Non-PNS";
                                        echo $pns;
                                        
                                        }
                                     ?>
                                    ">
                                    <?php 
                                    if ($readstatus == "PNS") {
                                    $pns = "PNS";
                                    $nonpns = "Non-PNS";
                                    echo $nonpns;
                                    
                                    }elseif ($readstatus == "Non-PNS") {
                                        $pns = "PNS";
                                        $nonpns = "Non-PNS";
                                        echo $pns;
                                        
                                        }
                                     ?>
                                    </option>
                            </select>   
                        </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" required="required" value="<?php echo $d['user_username']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                                <small>Kosongkan jika tidak ingin mengubah password.</small>
                            </div>

                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto">
                                <p>Nama File: <?= $d["user_foto"]; ?></p>
                                <small>Kosongkan jika tidak ingin mengubah foto.</small>
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