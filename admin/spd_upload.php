<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Tambah Rincian Biaya SPD</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Rincian SPD</span></li>
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
                    <h3 class="panel-title">Rincian Biaya SPD</h3>
                </div>
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
                    ?>
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
              
                <!--  start div insert -->
                <?php
                $pickrincian = mysqli_query($koneksi, "SELECT * from tb_rincian where id_spd='$id'");
                $cekdata = mysqli_num_rows($pickrincian);
                
                ?>

                <div style="display: none;" id="insert">
                <hr>
                <h5 style="text-align: center;">User Belum Menginput DBPD atau DPR</h5>
                
                </div> 
                <!-- end div insert -->
                <!-- startdiv update -->
                <div style="display: none;" id="update">
                <?php
                // start while
                while($data = mysqli_fetch_array($pickrincian)){
                $pickrincian_user = mysqli_query($koneksi,"SELECT * from tb_rincian where id_spd ='$id'");
                
                ?>
                <form action="spd_rincian2.php" method="POST">
                <input type="hidden" value="<?php echo $id; ?>" name="id2">
                <input type="hidden" name="filter_datas" value="<?php echo $filter;?>">
                <div class="form-group">
                            <label>Pilih Tujuan ST:</label>
                            <select class="form-control" name="kota" required="required"
                            >
                            <?php
                            $tb_kota = mysqli_query($koneksi, "SELECT * from tb_kota");
                            $tb_rincian = query("SELECT * from tb_rincian where id_spd='$id'")[0];
                            $st_tujuan = $tb_rincian["st_tujuan"];
                            if($st_tujuan == ""){
                            while($kota = mysqli_fetch_array($tb_kota)){
                            ?>
                            <option value="<?php echo $kota["id_kota"]; ?>"><?php echo $kota["nama_kota"];?></option> 
                            <?php
                            }
                            } 
                            else{
                            $allkota = mysqli_query($koneksi,"SELECT * FROM tb_kota where nama_kota not in ('$st_tujuan')");
                                   
                            $datakota = query("SELECT * from tb_kota where nama_kota='$st_tujuan'")[0];
                            $pickidkota = $datakota["id_kota"];
                            ?>
                            <option value="<?php echo $pickidkota;?>"><?php echo $data["st_tujuan"] ?></option>
                            <?php 
                            while($kota2 = mysqli_fetch_array($allkota)){
                            ?>
                            <option value="<?php echo $kota2["id_kota"]; ?>"><?php echo $kota2["nama_kota"]?></option>
                            <?php
                            }
                            }
                            ?>
                            </select>  
                            
                        </div>
                        <div class="form-group">
                            <label>Lama Hari :</label>
                            <input type="text" class="form-control" name="hari" required="required" value="<?php echo $data["lama_hari"]; ?>"
                            >
                        </div>
                        
                        <hr>
                <h5 style="text-align: center;">DBPD(Pengeluaran didukung bukti nota/kuitansi)</h5>
                <?php
                //start dbpd user
                while($user = mysqli_fetch_array($pickrincian_user)){
                ?>
                <table id="table" class="table table-bordered">
                <thead>
                        
                <tr>
                        <th width="1%">No</th>
                        <th class="text-center" >Uraian Pengeluaran</th>
                        <th class="text-center" >Nominal(Rupiah)</th>
                </tr>
                </thead>
                <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Hotel/Penginapan</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="hotel2" value="<?php echo number_format($user["hotel"],0,'','.'); ?>" id="titik9"/></td>
                            <script type="text/javascript">
		
                            var rupiah9 = document.getElementById('titik9');
                            rupiah9.addEventListener('keyup', function(e){
                                // tambahkan 'Rp.' pada saat form di ketik
                                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                                rupiah9.value = formatRupiah9(this.value);
                            });

                            /* Fungsi formatRupiah */
                            function formatRupiah9(angka9, prefix9){
                                var number_string9 = angka9.replace(/[^,\d]/g, '').toString(),
                                split9   		= number_string9.split(','),
                                sisa9     		= split9[0].length % 3,
                                rupiah9     		= split9[0].substr(0, sisa9),
                                ribuan9     		= split9[0].substr(sisa9).match(/\d{3}/gi);

                                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                if(ribuan9){
                                    separator9 = sisa9 ? '.' : '';
                                    rupiah9 += separator9 + ribuan9.join('.');
                                }

                                rupiah9 = split9[1] != undefined ? rupiah9 + ',' + split9[1] : rupiah9;
                                return prefix9 == undefined ? rupiah9 : (rupiah9 ?rupiah9 : '');
                            }
                        </script>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Tiket Pesawat Pergi</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="pesawat_pergi2" value="<?php echo number_format($user["pesawat_pergi"],0,'','.'); ?>" id="titik10" /></td>
                            <script type="text/javascript">
		
                            var rupiah10 = document.getElementById('titik10');
                            rupiah10.addEventListener('keyup', function(e){
                             // tambahkan 'Rp.' pada saat form di ketik
                                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                              rupiah10.value = formatRupiah10(this.value);
                            });

                             /* Fungsi formatRupiah */
                             function formatRupiah10(angka10, prefix10){
                             var number_string10 = angka10.replace(/[^,\d]/g, '').toString(),
                             split10   		= number_string10.split(','),
                             sisa10     		= split10[0].length % 3,
                             rupiah10     		= split10[0].substr(0, sisa10),
                             ribuan10     		= split10[0].substr(sisa10).match(/\d{3}/gi);

                            // tambahkan titik jika yang di input sudah menjadi angka ribuan
                             if(ribuan10){
                                  separator10 = sisa10 ? '.' : '';
                                  rupiah10 += separator10 + ribuan10.join('.');
                              }

                              rupiah10 = split10[1] != undefined ? rupiah10 + ',' + split10[1] : rupiah10;
                              return prefix10 == undefined ? rupiah10 : (rupiah10 ?rupiah10 : '');
                           }
                        </script>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Tiket Pesawat Pulang</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="pesawat_pulang2" value="<?php echo number_format($user["pesawat_pulang"],0,'','.'); ?>" id="titik11" /></td>
                            <script type="text/javascript">
		
                                var rupiah11 = document.getElementById('titik11');
                                rupiah11.addEventListener('keyup', function(e){
                                    // tambahkan 'Rp.' pada saat form di ketik
                                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                                    rupiah11.value = formatRupiah11(this.value);
                                });
                            
                                /* Fungsi formatRupiah */
                                function formatRupiah11(angka11, prefix11){
                                  var number_string11 = angka11.replace(/[^,\d]/g, '').toString(),
                                 split11   		= number_string11.split(','),
                                    sisa11     		= split11[0].length % 3,
                                    rupiah11     		= split11[0].substr(0, sisa11),
                                    ribuan11     		= split11[0].substr(sisa11).match(/\d{3}/gi);
        
                                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                    if(ribuan11){
                                      separator11 = sisa11 ? '.' : '';
                                     rupiah11 += separator11 + ribuan11.join('.');
                                 }

                                rupiah11 = split11[1] != undefined ? rupiah11 + ',' + split11[1] : rupiah11;
                                return prefix11 == undefined ? rupiah11 : (rupiah3 ?rupiah11 : '');
                                }
                        </script>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>Tiket Kereta</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="kereta2" value="<?php echo number_format($user["kereta"],0,'','.'); ?>" id="titik12"/></td>
                            <script type="text/javascript">
		
                             var rupiah12 = document.getElementById('titik12');
                                rupiah12.addEventListener('keyup', function(e){
                                 // tambahkan 'Rp.' pada saat form di ketik
                                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                                    rupiah12.value = formatRupiah12(this.value);
                             });

                             /* Fungsi formatRupiah */
                                function formatRupiah12(angka12, prefix12){
                                 var number_string12 = angka12.replace(/[^,\d]/g, '').toString(),
                                 split12   		= number_string12.split(','),
                                 sisa12     		= split12[0].length % 3,
                                 rupiah12     		= split12[0].substr(0, sisa12),
                                 ribuan12     		= split12[0].substr(sisa12).match(/\d{3}/gi);

                                 // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                 if(ribuan12){
                                        separator12 = sisa12 ? '.' : '';
                                        rupiah12 += separator12 + ribuan12.join('.');
                                 }

                                    rupiah12 = split12[1] != undefined ? rupiah12 + ',' + split12[1] : rupiah12;
                                    return prefix12 == undefined ? rupiah12 : (rupiah12 ?rupiah12 : '');
                             }
                         </script>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td>Bensin(Jika Ada Bukti)</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="bensin_ada2" value="<?php echo number_format($user["bensin_ada"],0,'','.'); ?>" id="titik13"/></td>
                            <script type="text/javascript">
		
                            var rupiah13 = document.getElementById('titik13');
                            rupiah13.addEventListener('keyup', function(e){
                             // tambahkan 'Rp.' pada saat form di ketik
                                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                             rupiah13.value = formatRupiah13(this.value);
                          });

                         /* Fungsi formatRupiah */
                            function formatRupiah13(angka13, prefix13){
                              var number_string13 = angka13.replace(/[^,\d]/g, '').toString(),
                             split13   		= number_string13.split(','),
                              sisa13     		= split13[0].length % 3,
                              rupiah13     		= split13[0].substr(0, sisa13),
                              ribuan13     		= split13[0].substr(sisa13).match(/\d{3}/gi);

                             // tambahkan titik jika yang di input sudah menjadi angka ribuan
                             if(ribuan13){
                                   separator13 = sisa13 ? '.' : '';
                                    rupiah13 += separator13 + ribuan13.join('.');
                             }

                                rupiah13 = split13[1] != undefined ? rupiah13 + ',' + split13[1] : rupiah13;
                                return prefix13 == undefined ? rupiah13 : (rupiah13 ?rupiah13 : '');
                            }
                        </script>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td>Taksi(Jika Ada Bukti)</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="taksi_ada2" value="<?php echo number_format($user["taksi_ada"],0,'','.'); ?>" id="titik14"/></td>
                        <script type="text/javascript">
		
		                    var rupiah14 = document.getElementById('titik14');
		                    rupiah14.addEventListener('keyup', function(e){
			                    // tambahkan 'Rp.' pada saat form di ketik
			                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			                    rupiah14.value = formatRupiah14(this.value);
		                    });
 
		                    /* Fungsi formatRupiah */
		                    function formatRupiah14(angka14, prefix14){
			                    var number_string14 = angka14.replace(/[^,\d]/g, '').toString(),
			                    split14   		= number_string14.split(','),
			                    sisa14     		= split14[0].length % 3,
			                    rupiah14     		= split14[0].substr(0, sisa14),
			                    ribuan14     		= split14[0].substr(sisa14).match(/\d{3}/gi);
                            
			                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
			                    if(ribuan14){
				                    separator14 = sisa14 ? '.' : '';
				                    rupiah14 += separator14 + ribuan14.join('.');
			                    }
 
			                    rupiah14 = split14[1] != undefined ? rupiah14 + ',' + split14[1] : rupiah14;
			                    return prefix14 == undefined ? rupiah14 : (rupiah14 ?rupiah14 : '');
		                    }
	                    </script>
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            <td>Travel(Jika Ada Bukti)</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="travel_ada2" value="<?php echo number_format($user["travel_ada"],0,'','.'); ?>" id="titik15"/></td>
                            <script type="text/javascript">
		
		                    var rupiah15 = document.getElementById('titik15');
		                    rupiah15.addEventListener('keyup', function(e){
			                    // tambahkan 'Rp.' pada saat form di ketik
			                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			                    rupiah15.value = formatRupiah15(this.value);
		                    });
 
		                    /* Fungsi formatRupiah */
		                    function formatRupiah15(angka15, prefix15){
			                    var number_string15 = angka15.replace(/[^,\d]/g, '').toString(),
			                    split15   		= number_string15.split(','),
			                    sisa15     		= split15[0].length % 3,
			                    rupiah15     		= split15[0].substr(0, sisa15),
			                    ribuan15     		= split15[0].substr(sisa15).match(/\d{3}/gi);
                            
			                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
			                    if(ribuan15){
				                    separator15 = sisa15 ? '.' : '';
				                    rupiah15 += separator15 + ribuan15.join('.');
			                    }
 
			                    rupiah15 = split15[1] != undefined ? rupiah15 + ',' + split15[1] : rupiah15;
			                    return prefix15 == undefined ? rupiah15 : (rupiah15 ?rupiah15 : '');
		                    }
	                        </script>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Total DBPD</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="total_dbpd2" disabled value="<?php echo number_format($user["dbpr"],0,'','.'); ?>" />
                        
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="total_dbpd2" value="<?php echo number_format($user["dbpr"],0,'','.'); ?>" />
                        </td>
                     
                        </tr>
                </tbody>
                </table>
                <?php
                
                ?>
                <!-- start table dpr update -->
                <h5 style="text-align: center;">DPR(Pengeluaran tidak didukung bukti nota/kuitansi)</h5>

                <table id="table" class="table table-bordered">
                <thead>
                        
                <tr>
                        <th width="1%">No</th>
                        <th class="text-center" >Uraian Pengeluaran</th>
                        <th class="text-center" >Nominal(Rupiah)</th>
                </tr>
                </thead>
                <tbody>
                        
                        <tr>
                            <td class="text-center">1</td>
                            <td>Bensin(Jika Tidak Ada Bukti)</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="bensin_tidak2" value="<?php echo number_format($user["bensin_tidak"],0,'','.'); ?>" 
                            id="titik20"/></td>
                            <script type="text/javascript">
		
                            var rupiah20 = document.getElementById('titik20');
                            rupiah20.addEventListener('keyup', function(e){
                             // tambahkan 'Rp.' pada saat form di ketik
                                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                             rupiah20.value = formatRupiah20(this.value);
                          });

                         /* Fungsi formatRupiah */
                            function formatRupiah20(angka20, prefix20){
                              var number_string20 = angka20.replace(/[^,\d]/g, '').toString(),
                              split20   		= number_string20.split(','),
                              sisa20     		= split20[0].length % 3,
                              rupiah20     		= split20[0].substr(0, sisa20),
                              ribuan20     		= split20[0].substr(sisa20).match(/\d{3}/gi);

                             // tambahkan titik jika yang di input sudah menjadi angka ribuan
                             if(ribuan20){
                                   separator20 = sisa20 ? '.' : '';
                                    rupiah20 += separator20 + ribuan20.join('.');
                             }

                                rupiah20 = split20[1] != undefined ? rupiah20 + ',' + split20[1] : rupiah20;
                                return prefix20 == undefined ? rupiah20 : (rupiah20 ? rupiah20 : '');
                            }
                        </script>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Taksi(Jika Tidakk Ada Bukti)</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="taksi_tidak2" value="<?php echo number_format($user["taksi_tidak"],0,'','.'); ?>" 
                            id="titik21"/></td>
                        <script type="text/javascript">
		
		                    var rupiah21 = document.getElementById('titik21');
		                    rupiah21.addEventListener('keyup', function(e){
			                    // tambahkan 'Rp.' pada saat form di ketik
			                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			                    rupiah21.value = formatRupiah21(this.value);
		                    });
 
		                    /* Fungsi formatRupiah */
		                    function formatRupiah21(angka21, prefix21){
			                    var number_string21 = angka21.replace(/[^,\d]/g, '').toString(),
			                    split21   		= number_string21.split(','),
			                    sisa21     		= split21[0].length % 3,
			                    rupiah21     		= split21[0].substr(0, sisa21),
			                    ribuan21     		= split21[0].substr(sisa21).match(/\d{3}/gi);
                            
			                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
			                    if(ribuan21){
				                    separator21 = sisa21 ? '.' : '';
				                    rupiah21 += separator21 + ribuan21.join('.');
			                    }
 
			                    rupiah21 = split21[1] != undefined ? rupiah21 + ',' + split21[1] : rupiah21;
			                    return prefix21 == undefined ? rupiah21 : (rupiah21 ?rupiah21 : '');
		                    }
	                    </script>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Travel(Jika Tidak Ada Bukti)</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="travel_tidak2" value="<?php echo number_format($user["travel_tidak"],0,'','.'); ?>" 
                            id="titik22"/></td>
                            <script type="text/javascript">
		
		                    var rupiah22 = document.getElementById('titik22');
		                    rupiah22.addEventListener('keyup', function(e){
			                    // tambahkan 'Rp.' pada saat form di ketik
			                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			                    rupiah22.value = formatRupiah22(this.value);
		                    });
 
		                    /* Fungsi formatRupiah */
		                    function formatRupiah22(angka22, prefix22){
			                    var number_string22 = angka22.replace(/[^,\d]/g, '').toString(),
			                    split22   		= number_string22.split(','),
			                    sisa22     		= split22[0].length % 3,
			                    rupiah22     		= split22[0].substr(0, sisa22),
			                    ribuan22     		= split22[0].substr(sisa22).match(/\d{3}/gi);
                            
			                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
			                    if(ribuan22){
				                    separator22 = sisa22 ? '.' : '';
				                    rupiah22 += separator22 + ribuan22.join('.');
			                    }
 
			                    rupiah22 = split22[1] != undefined ? rupiah22 + ',' + split22[1] : rupiah22;
			                    return prefix22 == undefined ? rupiah22 : (rupiah15 ?rupiah22 : '');
		                    }
	                        </script>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>Pengeluaran Lainnya</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="pengeluaran2" value="<?php echo number_format($user["pengeluaran"],0,'','.'); ?>" id="titik9"/></td>
                            <script type="text/javascript">
		
                            var rupiah9 = document.getElementById('titik9');
                            rupiah9.addEventListener('keyup', function(e){
                                // tambahkan 'Rp.' pada saat form di ketik
                                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                                rupiah9.value = formatRupiah(this.value);
                            });

                            /* Fungsi formatRupiah */
                            function formatRupiah(angka9, prefix9){
                                var number_string9 = angka9.replace(/[^,\d]/g, '').toString(),
                                split9   		= number_string9.split(','),
                                sisa9     		= split[0].length % 3,
                                rupiah9     		= split9[0].substr(0, sisa9),
                                ribuan9     		= split9[0].substr(sisa9).match(/\d{3}/gi);

                                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                if(ribuan9){
                                    separator9 = sisa9 ? '.' : '';
                                    rupiah9 += separator9 + ribuan9.join('.');
                                }

                                rupiah9 = split9[1] != undefined ? rupiah9 + ',' + split9[1] : rupiah9;
                                return prefix9 == undefined ? rupiah9 : (rupiah9 ?rupiah9 : '');
                            }
                        </script>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Total DPR</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="<?php echo number_format($user["dpr"],0,'','.'); ?>" />
                        
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai"  name="total_dpr2" value="<?php echo number_format($user["dpr"],0,'','.'); ?>" />
                        
                        </td>
                        </tr>
                </tbody>
                </table>
                <div class="form-group">
                    <label></label>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
                </form>
                
                <?php
                } // end dbpd dan dpr user
                }//end while
                ?>
                </div> 
                <hr>
                <h5 style="text-align: left;">Data Inputan User</h5>
                <h5 style="text-align: center;">DBPD(Pengeluaran didukung bukti nota/kuitansi)</h5>
                
                <?php
                //start dbpd user 
                // menampilkan data user
                $pickrincian_user2 = mysqli_query($koneksi,"SELECT * from tb_rincianuser where id_spd2 ='$id'");
                
                while($user = mysqli_fetch_array($pickrincian_user2)){
                $picknospd = $user["id_spd2"];
                $dataspd = query("SELECT * from tabel_spd where spd_id='$picknospd'")[0];
                $pickno_spd = $dataspd["no_spd"];
                $cekhotel = $user["file_hotel"];
                $cekpergi = $user["file_pergi"];
                $cekpulang = $user["file_pulang"];
                $cekkereta = $user["file_kereta"];
                $cekbensin = $user["file_bensin"];
                $cektaksi = $user["file_taksi"];
                $cektravel = $user["file_travel"];
                ?>
                <table id="table" class="table table-bordered">
                <thead>
                        
                <tr>
                        <th width="1%">No</th>
                        <th class="text-center" >Uraian Pengeluaran</th>
                        <th class="text-center" >Nominal(Rupiah)</th>
                        <th class="text-center" >Dokumen</th>
                </tr>
                </thead>
                <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Hotel/Penginapan</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="hotel2" disabled value="<?php echo number_format($user["hotel2"],0,'','.'); ?>" /></td>
                            <td class="text-center">
                                
                                <div class="btn-group" id="hotel_ada" style="display:none;">   
                                 <a target="_blank" href="../bukti-dbpd/<?php echo $pickno_spd; ?>/<?php echo $cekhotel; 
                                ?>" class="btn btn-default">Preview</a>
                               
                            </div>
                            <div class="btn-group" id="hotel_tidak" style="display:none;">   
                                 <a href="kosong.php?isi=kosong&id=<?php echo $picknospd ?>" class="btn btn-default">Preview</a>
                               
                            </div>
                            <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
                            </script>
                            <?php 
                            if($cekhotel ==""){
                            ?>
                            <script  type="text/javascript">
          
                            //tampilkan ada dan tidak ada hotel
                            
                            $(document).ready(function() {
                            document.getElementById("hotel_ada").style.display = "none";
                            document.getElementById("hotel_tidak").style.display = "block";
                            });
                            </script>
                            <?php
                            }else{
                            ?>
                            <script  type="text/javascript">
          
                            //tampilkan ada dan tidak ada hotel
          
                            $(document).ready(function() {
                            document.getElementById("hotel_ada").style.display = "block";
                            document.getElementById("hotel_tidak").style.display = "none";
                            });
                            </script>
                            <?php
                            }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Tiket Pesawat Pergi</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="pesawat_pergi2" disabled value="<?php echo number_format($user["pesawat_pergi2"],0,'','.'); ?>"/></td>
                            <td class="text-center">
                                
                                <div class="btn-group" id="pergi_ada" style="display:none;">   
                                 <a target="_blank" href="../bukti-dbpd/<?php echo $pickno_spd; ?>/<?php echo $cekpergi; 
                                ?>" class="btn btn-default">Preview</a>
                               
                            </div>
                            <div class="btn-group" id="pergi_tidak" style="display:none;">   
                                 <a href="kosong.php?isi=kosong&id=<?php echo $picknospd ?>" class="btn btn-default">Preview</a>
                               
                            </div>
                            <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
                            </script>
                            <?php 
                            if($cekpergi ==""){
                            ?>
                            <script  type="text/javascript">
          
                            //tampilkan ada dan tidak ada hotel
                            
                            $(document).ready(function() {
                            document.getElementById("pergi_ada").style.display = "none";
                            document.getElementById("pergi_tidak").style.display = "block";
                            });
                            </script>
                            <?php
                            }else{
                            ?>
                            <script  type="text/javascript">
          
                            //tampilkan ada dan tidak ada hotel
          
                            $(document).ready(function() {
                            document.getElementById("pergi_ada").style.display = "block";
                            document.getElementById("pergi_tidak").style.display = "none";
                            });
                            </script>
                            <?php
                            }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Tiket Pesawat Pulang</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="pesawat_pulang2" disabled value="<?php echo number_format($user["pesawat_pulang2"],0,'','.'); ?>"  /></td>
                            <td class="text-center">
                                
                                <div class="btn-group" id="pulang_ada" style="display:none;">   
                                 <a target="_blank" href="../bukti-dbpd/<?php echo $pickno_spd; ?>/<?php echo $cekpulang; 
                                ?>" class="btn btn-default">Preview</a>
                               
                            </div>
                            <div class="btn-group" id="pulang_tidak" style="display:none;">   
                                 <a href="kosong.php?isi=kosong&id=<?php echo $picknospd ?>" class="btn btn-default">Preview</a>
                               
                            </div>
                            <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
                            </script>
                            <?php 
                            if($cekpulang ==""){
                            ?>
                            <script  type="text/javascript">
          
                            //tampilkan ada dan tidak ada hotel
                            
                            $(document).ready(function() {
                            document.getElementById("pulang_ada").style.display = "none";
                            document.getElementById("pulang_tidak").style.display = "block";
                            });
                            </script>
                            <?php
                            }else{
                            ?>
                            <script  type="text/javascript">
          
                            //tampilkan ada dan tidak ada hotel
          
                            $(document).ready(function() {
                            document.getElementById("pulang_ada").style.display = "block";
                            document.getElementById("pulang_tidak").style.display = "none";
                            });
                            </script>
                            <?php
                            }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>Tiket Kereta</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="kereta2" disabled value="<?php echo number_format($user["kereta2"],0,'','.'); ?>" /></td>
                            <td class="text-center">
                                
                                <div class="btn-group" id="kereta_ada" style="display:none;">   
                                 <a target="_blank" href="../bukti-dbpd/<?php echo $pickno_spd; ?>/<?php echo $cekkereta; 
                                ?>" class="btn btn-default">Preview</a>
                               
                            </div>
                            <div class="btn-group" id="kereta_tidak" style="display:none;">   
                                 <a href="kosong.php?isi=kosong&id=<?php echo $picknospd ?>" class="btn btn-default">Preview</a>
                               
                            </div>
                            <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
                            </script>
                            <?php 
                            if($cekkereta ==""){
                            ?>
                            <script  type="text/javascript">
          
                            //tampilkan ada dan tidak ada hotel
                            
                            $(document).ready(function() {
                            document.getElementById("kereta_ada").style.display = "none";
                            document.getElementById("kereta_tidak").style.display = "block";
                            });
                            </script>
                            <?php
                            }else{
                            ?>
                            <script  type="text/javascript">
          
                            //tampilkan ada dan tidak ada hotel
          
                            $(document).ready(function() {
                            document.getElementById("kereta_ada").style.display = "block";
                            document.getElementById("kereta_tidak").style.display = "none";
                            });
                            </script>
                            <?php
                            }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td>Bensin(Jika Ada Bukti)</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="bensin_ada2" disabled value="<?php echo number_format($user["bensin_ada2"],0,'','.'); ?>" /></td>
                            <td class="text-center">
                                
                                <div class="btn-group" id="bensin_ada" style="display:none;">   
                                 <a target="_blank" href="../bukti-dbpd/<?php echo $pickno_spd; ?>/<?php echo $cekbensin; 
                                ?>" class="btn btn-default">Preview</a>
                               
                            </div>
                            <div class="btn-group" id="bensin_tidak" style="display:none;">   
                                 <a href="kosong.php?isi=kosong&id=<?php echo $picknospd ?>" class="btn btn-default">Preview</a>
                               
                            </div>
                            <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
                            </script>
                            <?php 
                            if($cekbensin ==""){
                            ?>
                            <script  type="text/javascript">
          
                            //tampilkan ada dan tidak ada hotel
                            
                            $(document).ready(function() {
                            document.getElementById("bensin_ada").style.display = "none";
                            document.getElementById("bensin_tidak").style.display = "block";
                            });
                            </script>
                            <?php
                            }else{
                            ?>
                            <script  type="text/javascript">
          
                            //tampilkan ada dan tidak ada hotel
          
                            $(document).ready(function() {
                            document.getElementById("bensin_ada").style.display = "block";
                            document.getElementById("bensin_tidak").style.display = "none";
                            });
                            </script>
                            <?php
                            }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td>Taksi(Jika Ada Bukti)</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="taksi_ada2" disabled value="<?php echo number_format($user["taksi_ada2"],0,'','.'); ?>" /></td>
                            <td class="text-center">
                                
                                <div class="btn-group" id="taksi_ada" style="display:none;">   
                                 <a target="_blank" href="../bukti-dbpd/<?php echo $pickno_spd; ?>/<?php echo $cektaksi; 
                                ?>" class="btn btn-default">Preview</a>
                               
                            </div>
                            <div class="btn-group" id="taksi_tidak" style="display:none;">   
                                 <a href="kosong.php?isi=kosong&id=<?php echo $picknospd ?>" class="btn btn-default">Preview</a>
                               
                            </div>
                            <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
                            </script>
                            <?php 
                            if($cektaksi ==""){
                            ?>
                            <script  type="text/javascript">
          
                            //tampilkan ada dan tidak ada hotel
                            
                            $(document).ready(function() {
                            document.getElementById("taksi_ada").style.display = "none";
                            document.getElementById("taksi_tidak").style.display = "block";
                            });
                            </script>
                            <?php
                            }else{
                            ?>
                            <script  type="text/javascript">
          
                            //tampilkan ada dan tidak ada hotel
          
                            $(document).ready(function() {
                            document.getElementById("taksi_ada").style.display = "block";
                            document.getElementById("taksi_tidak").style.display = "none";
                            });
                            </script>
                            <?php
                            }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            <td>Travel(Jika Ada Bukti)</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="travel_ada2" disabled value="<?php echo number_format($user["travel_ada2"],0,'','.'); ?>"/></td>
                            <td class="text-center">
                                
                                <div class="btn-group" id="travel_ada" style="display:none;">   
                                 <a target="_blank" href="../bukti-dbpd/<?php echo $pickno_spd; ?>/<?php echo $cektravel; 
                                ?>" class="btn btn-default">Preview</a>
                               
                            </div>
                            <div class="btn-group" id="travel_tidak" style="display:none;">   
                                 <a href="kosong.php?isi=kosong&id=<?php echo $picknospd ?>" class="btn btn-default">Preview</a>
                               
                            </div>
                            <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
                            </script>
                            <?php 
                            if($cektravel ==""){
                            ?>
                            <script  type="text/javascript">
          
                            //tampilkan ada dan tidak ada hotel
                            
                            $(document).ready(function() {
                            document.getElementById("travel_ada").style.display = "none";
                            document.getElementById("travel_tidak").style.display = "block";
                            });
                            </script>
                            <?php
                            }else{
                            ?>
                            <script  type="text/javascript">
          
                            //tampilkan ada dan tidak ada hotel
          
                            $(document).ready(function() {
                            document.getElementById("travel_ada").style.display = "block";
                            document.getElementById("travel_tidak").style.display = "none";
                            });
                            </script>
                            <?php
                            }
                            ?>
                            </td>
                        
                        <tr>
                            <td></td>
                            <td>Total DBPD</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="total_dbpd2" disabled value="<?php echo number_format($user["dbpr2"],0,'','.'); ?>" />
                        
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="total_dbpd2" value="<?php echo number_format($user["dbpr2"],0,'','.'); ?>" />
                        </td>
                     
                        </tr>
                </tbody>
                </table>
                <?php
                
                ?>
                <!-- start table dpr update -->
                <h5 style="text-align: center;">DPR(Pengeluaran tidak didukung bukti nota/kuitansi)</h5>

                <table id="table" class="table table-bordered">
                <thead>
                        
                <tr>
                        <th width="1%">No</th>
                        <th class="text-center" >Uraian Pengeluaran</th>
                        <th class="text-center" >Nominal(Rupiah)</th>
                </tr>
                </thead>
                <tbody>
                        
                        <tr>
                            <td class="text-center">1</td>
                            <td>Bensin(Jika Tidak Ada Bukti)</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="bensin_tidak2" disabled value="<?php echo number_format($user["bensin_tidak2"],0,'','.'); ?>" 
                            /></td>
                            
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Taksi(Jika Tidakk Ada Bukti)</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="taksi_tidak2" disabled value="<?php echo number_format($user["taksi_tidak2"],0,'','.'); ?>" 
                            /></td>
                     
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Travel(Jika Tidak Ada Bukti)</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="travel_tidak2" disabled value="<?php echo number_format($user["travel_tidak2"],0,'','.'); ?>" 
                            /></td>
                            
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>Pengeluaran Lainnya</td>
                            <td class="text-right"><input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="pengeluaran2" disabled value="<?php echo number_format($user["pengeluaran2"],0,'','.'); ?>"/></td>
                            
                        </tr>
                        <tr>
                            <td></td>
                            <td>Total DPR</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="<?php echo number_format($user["dpr2"],0,'','.'); ?>" />
                        
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai"  name="total_dpr2" value="<?php echo number_format($user["dpr2"],0,'','.'); ?>" />
                        
                        </td>
                        </tr>
                </tbody>
                </table>
                <hr>
                <!-- list keseluruhan -->
                <h5>List Biaya Keseluruhan </h5>
                <br>
                <?php 
                }
                $pickrincian2 = mysqli_query($koneksi, "SELECT * from tb_rincian where id_spd='$id'");
                while($data2 = mysqli_fetch_array($pickrincian2)){
                $pickkota = $data2["st_tujuan"];
                $picklamahari = $data2["lama_hari"];
                if($st_tujuan != ""){
                $readkota = query("SELECT * from tb_kota where nama_kota='$pickkota'")[0];
                
                $uangharian = $readkota["rupiah"];
                }
                ?>
                <div style="display: block;" id="all">
                <form action="spd_receipt2baru.php" method="POST">
                <input type="hidden" name="filter_datas" value="<?php echo $filter;?>">
                <input type="hidden" value="<?php echo $data2["id_spd"]; ?>" name="spd_id" />
                <table id="table" class="table table-bordered">
                <thead>
                        
                <tr>
                        <th width="1%">No</th>
                        <th class="text-center" >Rincian</th>
                        <th class="text-center" >Jumlah(Rupiah)</th>
                </tr>
                </thead>
                <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Uang Harian</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="
                            <?php if($pickkota == ""){
                                echo "0";
                            }else{
                            echo number_format($uangharian,0,'','.'); }?>"/>
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="uang_harian3" value="
                            <?php if($pickkota == ""){
                                echo "0";
                            }else{
                            echo number_format($uangharian,0,'','.'); }?>"/>
                            </td>
                            
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Lama Hari</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="
                            <?php 
                            echo number_format($data2["lama_hari"],0,'','.'); ?>"/>
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="lama_hari3" value="
                            <?php 
                            echo number_format($data2["lama_hari"],0,'','.'); ?>"/>
                            </td>
                            
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Jumlah Uang Harian</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="
                            <?php if($pickkota == ""){
                                echo "0";
                            }else{
                            $jumlahharian = $uangharian * $picklamahari;
                            echo number_format($jumlahharian,0,'','.'); }?>"/>
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="jumlah_harian3" value="
                            <?php if($pickkota == ""){
                                echo "0";
                            }else{
                            $jumlahharian = $uangharian * $picklamahari;
                            echo number_format($jumlahharian,0,'','.'); }?>"/>
                            </td>
                            
                        </tr>
                        <tr>
                            <td class="text-center"></td>
                            <td>DBPD</td>
                        </tr>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Hotel</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="<?php echo number_format($data2["hotel"],0,'','.'); ?>"/>
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="hotel3" value="<?php echo number_format($data2["hotel"],0,'','.'); ?>"/>
                            </td>
                           
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Pesawat Pergi</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="<?php echo number_format($data2["pesawat_pergi"],0,'','.'); ?>"/>
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="pesawat_pergi3" value="<?php echo number_format($data2["pesawat_pergi"],0,'','.'); ?>"/>
                            </td>
                           
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Pesawat Pulang</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="<?php echo number_format($data2["pesawat_pulang"],0,'','.'); ?>"/>
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="pesawat_pulang3" value="<?php echo number_format($data2["pesawat_pulang"],0,'','.'); ?>"/>
                            </td>
                           
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>Kereta</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="<?php echo number_format($data2["kereta"],0,'','.'); ?>"/>
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="kereta3" value="<?php echo number_format($data2["kereta"],0,'','.'); ?>"/>
                            </td>
                           
                        </tr>
                        
                        <tr>
                            <td class="text-center">5</td>
                            <td>Bensin(Jika Ada Bukti)</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="<?php echo number_format($data2["bensin_ada"],0,'','.'); ?>"/>
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="bensin_ada3" value="<?php echo number_format($data2["bensin_ada"],0,'','.'); ?>"/>
                            </td>
                           
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td>Taksi(Jika Ada Bukti)</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="<?php echo number_format($data2["taksi_ada"],0,'','.'); ?>"/>
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="taksi_ada3" value="<?php echo number_format($data2["taksi_ada"],0,'','.'); ?>"/>
                            </td>
                      
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            <td>Travel(Jika Ada Bukti)</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="<?php echo number_format($data2["travel_ada"],0,'','.'); ?>"/>
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="travel_ada3" value="<?php echo number_format($data2["travel_ada"],0,'','.'); ?>"/>
                            </td>
                            
                        </tr>
                        <tr>
                            <td></td>
                            <td>Total DBPD</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="<?php echo number_format($data2["dbpr"],0,'','.'); ?>" />
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" value="<?php echo number_format($data2["dbpr"],0,'','.'); ?>" 
                            name="total_dbpd3" />
                            </td>
                        
                        </tr>
                        <tr>
                            <td class="text-center"></td>
                            <td>DPR</td>
                        </tr>
                        <tr>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Bensin(Jika Tidak Ada Bukti)</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="<?php echo number_format($data2["bensin_tidak"],0,'','.'); ?>"/>
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="bensin_tidak3" value="<?php echo number_format($data2["bensin_tidak"],0,'','.'); ?>"/>
                            </td>
                           
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Taksi(Jika Tidak Ada Bukti)</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="<?php echo number_format($data2["taksi_tidak"],0,'','.'); ?>"/>
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="taksi_tidak3" value="<?php echo number_format($data2["taksi_tidak"],0,'','.'); ?>"/>
                            </td>
                      
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Travel(Jika Tidak Ada Bukti)</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="<?php echo number_format($data2["travel_tidak"],0,'','.'); ?>"/>
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="travel_tidak3" value="<?php echo number_format($data2["travel_tidak"],0,'','.'); ?>"/>
                            </td>
                            
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>Pengeluaran Lainnya</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="<?php echo number_format($data2["pengeluaran"],0,'','.'); ?>" />
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" name="pengeluaran3" value="<?php echo number_format($data2["pengeluaran"],0,'','.'); ?>" />
                            </td>
                            
                        </tr>
                        <tr>
                            <td></td>
                            <td>Total DPR</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="<?php echo number_format($data2["dpr"],0,'','.'); ?>"/>
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" value="<?php echo number_format($data2["dpr"],0,'','.'); ?>" name="total_dpr3" />
                            </td>
                        
                        </tr>
                        <tr>
                            <td></td>
                            <td>Total Keseluruhan</td>
                            <td class="text-right">
                            <input type="text" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" disabled value="<?php 
                            if($pickkota == ""){
                                echo "0";
                            }else{
                            $total_dbpd = $data2["dbpr"];
                            $total_dpr = $data2["dpr"];
                            $jumlah = $total_dbpd + $total_dpr + $jumlahharian;
                            echo number_format($jumlah,0,'','.'); }?>" />
                            <input type="hidden" style="border: none; width:100%; height:100%; text-align:right;" 
                            placeholder="Masukan nilai" value="<?php 
                            if($pickkota == ""){
                                echo "0";
                            }else{
                            $total_dbpd = $data2["dbpr"];
                            $total_dpr = $data2["dpr"];
                            $jumlah = $total_dbpd + $total_dpr + $jumlahharian;
                            echo number_format($jumlah,0,'','.'); }?>" name="keseluruhan3" />
                            </td>
                        
                        </tr>
                </tbody>
                </table>
                <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
                </form>
                </div>
                <!-- end div update -->
                <?php
                } // end while list keseluruhan
                ?>
                <?php 
                if($cekdata < 1){
                ?>
                    
                <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
                </script>
                <script  type="text/javascript">
          
                //tampilkan form insert
          
                $(document).ready(function() {
                 document.getElementById("insert").style.display = "block";
                 document.getElementById("all").style.display = "block";
                 document.getElementById("update").style.display = "none";
                });
                </script>
                <?php
                } // jika lebih dari 1 maka tampilkan form update
                else{
                ?>
                <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
                </script>
                <script  type="text/javascript">
          
                //tampilkan form insert
          
                $(document).ready(function() {
                 document.getElementById("update").style.display = "block";
                 document.getElementById("all").style.display = "block";
                 document.getElementById("insert").style.display = "none";
                });
                </script>
                <?php
                
                }
                ?>
                </div>
            </div>
        </div>
    </div>


</div>


<?php include 'footer.php'; ?>