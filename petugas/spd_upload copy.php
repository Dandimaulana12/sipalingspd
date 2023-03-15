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
                    <h3 class="panel-title">Tambah SPD(PNS)</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="dataspd.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
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
            <div name="form1" id="form11" style="display: block;">
                   
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
                                    <option value="<?php echo $k['id_kota']; ?>"><?php echo $k['nama_kota']; ?></option>
                                    <?php 
                                }
                                ?>
                            </select>
                    </div>
               
                        <div class="form-group">
                            <label>Lama Hari :</label>
                            <input type="text" class="form-control" name="hari" required="required" value="0"
                            >
                        </div>
                        <div class="form-group">
                            <label>Daftar Biaya Pengeluaran Dinas(DBPR) :</label>
                            <input type="text" class="form-control" name="dbpr" required="required" value="0" id="titik"
                            >
                        </div>
                        <script type="text/javascript">
		
		                    var rupiah = document.getElementById('titik');
		                    rupiah.addEventListener('keyup', function(e){
			                    // tambahkan 'Rp.' pada saat form di ketik
			                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			                    rupiah.value = formatRupiah(this.value);
		                    });
 
		                    /* Fungsi formatRupiah */
		                    function formatRupiah(angka, prefix){
			                    var number_string = angka.replace(/[^,\d]/g, '').toString(),
			                    split   		= number_string.split(','),
			                    sisa     		= split[0].length % 3,
			                    rupiah     		= split[0].substr(0, sisa),
			                    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
                            
			                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
			                    if(ribuan){
				                    separator = sisa ? '.' : '';
				                    rupiah += separator + ribuan.join('.');
			                    }
 
			                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			                    return prefix == undefined ? rupiah : (rupiah ?rupiah : '');
		                    }
	                    </script>
                        <div class="form-group">
                            <label>Daftar Pengeluaran Riil(DPR) :</label>
                            <input type="text" class="form-control" name="dpr" required="required" value="0" id="titik2"
                            >
                        </div>
                        <script type="text/javascript">
		
		                    var rupiah2 = document.getElementById('titik2');
		                    rupiah2.addEventListener('keyup', function(e){
			                    // tambahkan 'Rp.' pada saat form di ketik
			                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			                    rupiah2.value = formatRupiah(this.value);
		                    });
 
		                    /* Fungsi formatRupiah */
		                    function formatRupiah(angka2, prefix2){
			                    var number_string2 = angka2.replace(/[^,\d]/g, '').toString(),
			                    split2   		= number_string2.split(','),
			                    sisa2     		= split2[0].length % 3,
			                    rupiah2     		= split2[0].substr(0, sisa2),
			                    ribuan2     		= split2[0].substr(sisa2).match(/\d{3}/gi);
                            
			                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
			                    if(ribuan2){
				                    separator2 = sisa2 ? '.' : '';
				                    rupiah2 += separator2 + ribuan2.join('.');
			                    }
 
			                    rupiah2 = split2[1] != undefined ? rupiah2 + ',' + split2[1] : rupiah2;
			                    return prefix2 == undefined ? rupiah2 : (rupiah2 ?rupiah2 : '');
		                    }
	                    </script>
                        <div class="form-group">
                            <label>Pengeluaran lain-lain yang dapat diperhitungkan :</label>
                            <input type="text" class="form-control" name="lain" required="required" value="0" id="titik3"
                            >
                        </div>
                        <script type="text/javascript">
		
		                    var rupiah3 = document.getElementById('titik3');
		                    rupiah3.addEventListener('keyup', function(e){
			                    // tambahkan 'Rp.' pada saat form di ketik
			                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			                    rupiah3.value = formatRupiah(this.value);
		                    });
 
		                    /* Fungsi formatRupiah */
		                    function formatRupiah(angka3, prefix3){
			                    var number_string3 = angka3.replace(/[^,\d]/g, '').toString(),
			                    split3   		= number_string3.split(','),
			                    sisa3     		= split3[0].length % 3,
			                    rupiah3     		= split3[0].substr(0, sisa3),
			                    ribuan3     		= split3[0].substr(sisa3).match(/\d{3}/gi);
                            
			                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
			                    if(ribuan3){
				                    separator3 = sisa3 ? '.' : '';
				                    rupiah3 += separator3 + ribuan3.join('.');
			                    }
 
			                    rupiah3 = split3[1] != undefined ? rupiah3 + ',' + split3[1] : rupiah3;
			                    return prefix3 == undefined ? rupiah3 : (rupiah3 ?rupiah3 : '');
		                    }
	                    </script>

                        
                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        
                        </div>

                    </form>
             </div> 
                    
                    <?php
                    } // end while
                    $datarincian = mysqli_query($koneksi, "SELECT * from tb_rincian where id_spd='$id'");
                    while($r = mysqli_fetch_array($datarincian)){ 
                    
                    ?>
                    <div name="form2" id="form22" style="display:none;">
                    
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
                        if(isset($_POST["kota"])){
                            
                        $pickidkot = $_POST["kota"];
                        $readnama = query("SELECT * from tb_kota where id_kota='$pickidkot'")[0];
                        $picknamakota = $readnama["nama_kota"];
                        $pickrupiah = $readnama["rupiah"];
                        global $picknamakota;
                        global $pickrupiah;
                        ?>
                        
                        <?php

                        }
                    ?>
                    
                    <form method="post" action="spd_rincian2.php" enctype="multipart/form-data">
                       <input type="hidden" name="idd" value="<?php echo $r['id_spd']?>">
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
                            <label>Daftar Biaya Pengeluaran Dinas(DBPR) :</label>
                            <input type="text" class="form-control" name="dbpr" required="required" value="<?php echo number_format($r["dbpr"],0,'','.'); ?>" id="titik4"
                            >
                        </div>
                        <script type="text/javascript">
		
		                    var rupiah4 = document.getElementById('titik4');
		                    rupiah4.addEventListener('keyup', function(e){
			                    // tambahkan 'Rp.' pada saat form di ketik
			                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			                    rupiah4.value = formatRupiah(this.value);
		                    });
 
		                    /* Fungsi formatRupiah */
		                    function formatRupiah(angka4, prefix4){
			                    var number_string4 = angka4.replace(/[^,\d]/g, '').toString(),
			                    split4   		= number_string4.split(','),
			                    sisa4     		= split4[0].length % 3,
			                    rupiah4     		= split4[0].substr(0, sisa4),
			                    ribuan4     		= split4[0].substr(sisa4).match(/\d{3}/gi);
                            
			                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
			                    if(ribuan4){
				                    separator4 = sisa4 ? '.' : '';
				                    rupiah4 += separator4 + ribuan4.join('.');
			                    }
 
			                    rupiah4 = split4[1] != undefined ? rupiah4 + ',' + split4[1] : rupiah4;
			                    return prefix4 == undefined ? rupiah4 : (rupiah4 ?rupiah4 : '');
		                    }
	                    </script>
                        
                        <div class="form-group">
                            <label>Daftar Pengeluaran Riil(DPR) :</label>
                            <input type="text" class="form-control" name="dpr" required="required" value="<?php echo number_format($r["dpr"],0,'','.'); ?>" id="titik5"
                            >
                        </div>
                        <script type="text/javascript">
		
		                    var rupiah5 = document.getElementById('titik5');
		                    rupiah5.addEventListener('keyup', function(e){
			                    // tambahkan 'Rp.' pada saat form di ketik
			                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			                    rupiah5.value = formatRupiah(this.value);
		                    });
 
		                    /* Fungsi formatRupiah */
		                    function formatRupiah(angka5, prefix5){
			                    var number_string5 = angka5.replace(/[^,\d]/g, '').toString(),
			                    split5   		= number_string5.split(','),
			                    sisa5     		= split5[0].length % 3,
			                    rupiah5     		= split5[0].substr(0, sisa5),
			                    ribuan5     		= split5[0].substr(sisa5).match(/\d{3}/gi);
                            
			                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
			                    if(ribuan5){
				                    separator5 = sisa5 ? '.' : '';
				                    rupiah5 += separator5 + ribuan5.join('.');
			                    }
 
			                    rupiah5 = split5[1] != undefined ? rupiah5 + ',' + split5[1] : rupiah5;
			                    return prefix5 == undefined ? rupiah5 : (rupiah5 ?rupiah5 : '');
		                    }
	                    </script>
                        <div class="form-group">
                            <label>Pengeluaran lain-lain yang dapat diperhitungkan :</label>
                            <input type="text" class="form-control" name="lain" required="required" value="<?php echo number_format($r["lainnya"],0,'','.'); ?>" id="titik6"
                            >
                        </div>
                        <script type="text/javascript">
		
		                    var rupiah6 = document.getElementById('titik6');
		                    rupiah6.addEventListener('keyup', function(e){
			                    // tambahkan 'Rp.' pada saat form di ketik
			                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			                    rupiah6.value = formatRupiah(this.value);
		                    });
 
		                    /* Fungsi formatRupiah */
		                    function formatRupiah(angka6, prefix6){
			                    var number_string6 = angka6.replace(/[^,\d]/g, '').toString(),
			                    split6   		= number_string6.split(','),
			                    sisa6     		= split6[0].length % 3,
			                    rupiah6     		= split6[0].substr(0, sisa6),
			                    ribuan6     		= split6[0].substr(sisa6).match(/\d{3}/gi);
                            
			                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
			                    if(ribuan6){
				                    separator6 = sisa6 ? '.' : '';
				                    rupiah6 += separator6 + ribuan6.join('.');
			                    }
 
			                    rupiah6 = split6[1] != undefined ? rupiah6 + ',' + split6[1] : rupiah6;
			                    return prefix6 == undefined ? rupiah6 : (rupiah6 ?rupiah6 : '');
		                    }
	                    </script>
                        
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
                    <form method="POST" action="spd_receipt2baru.php">
                       <input type="hidden" name="idd" value="<?php echo $readrincian['id_spd']?>">
                       <fieldset> 
    <legend>Hasil</legend> 
    <table> 
        <thead> 
            <tr><td>List Biaya<br><br></td></tr> 
        <thead> 
        
        <tbody> 
        
            <tr> 
                <td><input type='text' value='Uang Harian:' name='tujuan2' style="width:200px;" disabled/></td> 
                <input type='hidden' value='Uang Harian:' name='tujuan' style="width:200px;"  /></td> 
                <td>&nbsp;:Rp  
                <?php 
                $readtujuan = $readrincian['st_tujuan'];
                $readuang = query("SELECT * from tb_kota where nama_kota='$readtujuan'")[0];
                $pickuang = $readuang["rupiah"];
                $readlama = $readrincian["lama_hari"];
                $hitung = $pickuang * $readlama;
                ?>
                <input type='text' value='<?php echo number_format($pickuang,0,'','.')?>' name='namakota2' disabled/>    
                <input type='hidden' value='<?php echo $pickuang;?>' name='namakota'/>    
                
                <input type='hidden' value='<?php echo $pickuang; ?>' name='rupiah'  /></td> 
            
            </tr> 
            
            <tr> 
                <td><input type='text' value='Lama Hari' name='lama1' style="width:200px;" disabled/></td> 
                <input type='hidden' value='Lama Hari' name='lama' style="width:200px;"/>
                <td>&nbsp;:&emsp;&nbsp;&nbsp;<input type='text' value='<?php echo $readrincian['lama_hari']?>' name='hari2' disabled/></td> 
                <input type='hidden' value='<?php echo $readrincian['lama_hari']?>' name='hari' />
            </tr> 
            <tr> 
                <td><input type='text' value='Jumlah Uang Harian' name='nama_jumlah2' style="width:200px;" disabled/></td> 
                <input type='hidden' value='Jumlah Uang Harian' name='nama_jumlah' style="width:200px;"/>
                <td>&nbsp;:Rp <input type='text' value='<?php echo number_format($hitung,0,'','.')  ?>' name='jumlah_uang2' disabled/></td> 
                <td>&nbsp;&nbsp;<input type='hidden' value='<?php echo $hitung; ?>' name='jumlah_uang' /></td> 
            </tr>
            <tr> 
                <td><input type='text' value='Jumlah DBPR' name='dbpr1' style="width:200px;" disabled/></td> 
                <input type='hidden' value='Jumlah DBPR' name='dbpr' style="width:200px;" />
                <td>&nbsp;:Rp <input type='text' value='<?php echo number_format($readrincian['dbpr'],0,'','.')?>' name='jdbpr2' disabled/></td> 
                <td>&nbsp;<input type='hidden' value='<?php echo $readrincian['dbpr'];?>' name='jdbpr' /></td> 
            
            </tr> 
            <tr> 
                <td><input type='text' value='Jumlah DPR' name='dpr1' style="width:200px;" disabled/></td> 
                <input type='hidden' value='Jumlah DPR' name='dpr' style="width:200px;" /> 
                <td>&nbsp;:Rp <input type='text' value='<?php echo number_format($readrincian['dpr'],0,'','.')?>' name='jdpr2' disabled/></td> 
                <td>&nbsp;<input type='hidden' value='<?php echo $readrincian['dpr'];?>' name='jdpr' /></td> 
            </tr>
            <tr> 
                <td><input type='text' value='Jumlah Pengeluaran Lain' name='lain1' style="width:200px;" disabled/></td> 
                <input type='hidden' value='Jumlah Pengeluaran Lain' name='lain' style="width:200px;" /></td> 
                <td>&nbsp;:Rp <input type='text' value='<?php echo number_format($readrincian['lainnya'],0,'','.')?>' name='jlain2' disabled/></td> 
                <td>&nbsp;<input type='hidden' value='<?php echo $readrincian['lainnya'];?>' name='jlain' /></td> 
            </tr>
            -------------------------
            <tr> 
                <td><input type='text' value='Total' name='total1' style="width:200px;" disabled/></td> 
                <input type='hidden' value='Total' name='total' style="width:200px;" />
                <td>&nbsp;:Rp <input type='text' value='<?php 
                $st = $readrincian['jumlah'];
                $jumlahhari = $readrincian['lama_hari'];
                $dbpr = $readrincian['dbpr'];
                $dpr = $readrincian['dpr'];
                $lainnya = $readrincian['lainnya'];
                $sumharist = $st * $jumlahhari;
                @$jumlah = $sumharist + $dbpr + $dpr +$lainnya ;
                echo number_format($jumlah,0,'','.');

                ?>' name='jumlah2' disabled/><input type='hidden' value='<?php 
                
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