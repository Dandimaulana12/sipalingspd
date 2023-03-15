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
                    <h3 class="panel-title">Tambah SPD (Non-PNS)</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                    <?php
                    $filter = $_GET['filter'];
                    ?>
                        <a href="<?php
                        if($filter == "filter_menunggu"){
                            echo 'dataspd.php?filter='.$filter;
                            }
                            elseif($filter == "all_datas"){
                                echo 'dataspd.php?filter='.$filter;
                                     
                            }elseif($filter == "pilih_filter"){
                                echo  'dataspd.php?filter='.$filter;
                                        
                            }
                            else{
                                echo 'dataspd.php';
                            }
                        ?>" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>

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
                     $tabelspd = mysqli_query($koneksi, "SELECT * from tb_rincian where id_spd='$id'");
                     $sumbaris = mysqli_num_rows($tabelspd);
                     
                    ?>
            
                    
                    <?php
                    } // end while
                    $datarincian = mysqli_query($koneksi, "SELECT * from tb_rincian where id_spd='$id'");
                    while($r = mysqli_fetch_array($datarincian)){ 
                    
                    ?>
                    <div name="form2" id="form22" style="display:none;">
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
                    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
      </script> 
                     <script  type="text/javascript">
$(document).ready(function() {
   
    $("#kelastj1").show();
    $("#kelastj2").hide();
    
});
      </script>  
                    <?php
                    function query($query){
                        global $koneksi;
                        $result = mysqli_query($koneksi,$query);
                        $rows = [];
                        while ($row = mysqli_fetch_assoc($result)) {
                            $rows[] = $row ;
                        }
                        return $rows;
                        }
                      ?>
                    
                    <form method="post" action="spd_rincian2non.php" enctype="multipart/form-data">
                       <input type="hidden" name="idd" value="<?php echo $r['id_spd']?>">
                       <input type="hidden" name="filter_datas" value="<?php echo $filter;?>">
                       <div class="form-group">
                            <label>Pilih Tujuan ST:</label>
                            <select class="form-control" name="kota" required="required"
                            >
                            <?php
                               $no = 1;
                               if(isset($_GET['cari'])){
                                   $cari = $_GET['cari'];
                                   $gol = mysqli_query($koneksi,"SELECT * FROM tb_kota where nama_kota like '%".$cari."%'
");                             
                                   $hasilrow = mysqli_num_rows($gol);
                                   if ($hasilrow < 1) {
                                    echo "<script> 
           alert('data tidak ditemukan');

            </script>";
                                } 

                                }else{
                                   $gol = mysqli_query($koneksi,"SELECT * FROM tb_kota
                                   ");
                               }
                                ?>
                             <option value="<?php
                             $readgol = $r['st_tujuan']; 
                             $parsegol = query("SELECT *from tb_kota where nama_kota='$readgol'")[0];
                             $pickidgol = $parsegol["id_kota"];
                             $pickpangkat = $parsegol["nama_kota"];

                             echo $pickidgol;
                             ?>"><?php 
                             if (isset($_GET['cari'])) {
                                $cari2 = $_GET['cari'];
                                $parsecari = query("SELECT * from tb_kota where nama_kota like '%".$cari2."%' ")[0];
                                $pickcarigol = $parsecari["nama_kota"];
                                echo $pickcarigol;
                             }else{
                             echo $pickpangkat;
                             }
                             ?></option>
                            
                             <?php
                             if (isset($_GET['cari'])) {
                                $allgol = mysqli_query($koneksi,"SELECT * FROM tb_kota where nama_kota not in ('$pickcarigol')");
                                   
                                while($gol1 = mysqli_fetch_array($allgol)){
                                    ?>
                                    <option value="<?php
                                    $idgol1 = $gol1["id_kota"];
                                    $golongan = $gol1["nama_kota"];
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
                             $allgol = mysqli_query($koneksi,"SELECT * FROM tb_kota where nama_kota not in ('$pickpangkat')");
                                   
                                while($gol1 = mysqli_fetch_array($allgol)){
                                    ?>
                                    <option value="<?php
                                    $idgol1 = $gol1["id_kota"];
                                    $golongan = $gol1["nama_kota"];
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
                            <label>Lama Hari :</label>
                            <input type="text" class="form-control" name="hari" required="required" value="<?php echo $r["lama_hari"]; ?>"
                            >
                        </div>
                        
                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        
                        </div>

                    </form>
             </div>
                    <?php
                    } //end while variabel r
                    
                    if($sumbaris > 0){
                        ?>
                        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
          </script>
                        <script  type="text/javascript">
          
          //guide book plc
          
          $(document).ready(function() {
            document.getElementById("form11").style.display = "none";
            document.getElementById("form22").style.display = "block";
          });
                </script>
                        <?php
                         } // end if sumbaris
                         ?>
             
                    
                    <?php

                    $rincian = mysqli_query($koneksi, "SELECT * from tb_rincian where id_spd='$id'");
                    while($readrincian = mysqli_fetch_array($rincian)){ 
                   ?>
                    <form method="POST" action="spd_receipt2non.php">
                       <input type="hidden" name="filter_datas" value="<?php echo $filter;?>">
                       <input type="hidden" name="idd" value="<?php echo $readrincian['id_spd']?>">
                       <fieldset> 
    <legend>Hasil</legend> 
    <table> 
        <thead> 
            <tr><td>List Biaya<br><br></td></tr> 
        <thead> 
        
        <tbody> 
        
            <tr> 
                <td><input type='text' value='Uang Harian' name='tujuan1' style="width:200px;"  disabled/></td> 
                <input type='hidden' value='Uang Harian' name='tujuan' style="width:200px;"  />
                <td>&nbsp;:Rp 
                <?php
                $readtujuan = $readrincian['st_tujuan'];
                @$readuang = query("SELECT * from tb_kota where nama_kota='$readtujuan'")[0];
                $pickuang = $readuang["rupiah_non"];
                ?>
                <input type='text' value='<?php echo number_format($pickuang,0,'','.');?>' name='namakota2' disabled/>    
                <input type='hidden' value='<?php echo $pickuang;?>' name='namakota'/>    
                <input type='hidden' value='<?php echo $readrincian['jumlah']?>' name='rupiah'  /></td> 
            
            </tr> 
            <tr> 
                <td><input type='text' value='Lama Hari' name='lama1' style="width:200px;" disabled/></td> 
                <input type='hidden' value='Lama Hari' name='lama' style="width:200px;"/>
                <td>&nbsp;:&emsp;&nbsp;&nbsp;<input type='text' value='<?php echo $readrincian['lama_hari']?>' name='hari2' disabled/></td> 
                &nbsp;:&nbsp;<input type='hidden' value='<?php echo $readrincian['lama_hari']?>' name='hari' /></td> 
            </tr> 
            -------------------------
            <tr> 
                <td><input type='text' value='Total' name='total' style="width:200px;" disabled/></td> 
                <input type='hidden' value='Total' name='total' style="width:200px;" />
                <td>&nbsp;:Rp <input type='text' value='<?php 
                $st = $readrincian['jumlah'];
                $jumlahhari = $readrincian['lama_hari'];
                $sumharist = $st * $jumlahhari;
                echo number_format($sumharist,0,'','.');
                ?>' name='jumlah2' disabled/></td> 
                <td><input type='hidden' value='<?php 
                echo $sumharist;
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