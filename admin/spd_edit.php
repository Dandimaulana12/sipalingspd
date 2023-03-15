<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Ubah SPD</h4>
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
                    <h3 class="panel-title">Ubah SPD</h3>
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
                        
                    <form method="post" action="spd_update.php" enctype="multipart/form-data">
                    <?php
                         $data = mysqli_query($koneksi, "SELECT * from tabel_spd where spd_id='$id'");
                     
                         while($d = mysqli_fetch_array($data)){ 
                            $kodeasli = $d["kode_st"];
                            
                            $findidkode = query("SELECT * from tb_kode where nama_kode='$kodeasli'")[0];
                            $pickidkode = $findidkode["id_kode"];
                         ?>
                        
                        
                        <input type="hidden" name="filter_datas" value="<?php echo $filter;?>">
                        <input type="hidden" value="<?php echo $d['spd_id']; ?>" name="id_spd">
                        <input type="hidden" value="<?php echo $d['id_user']; ?>" name="user_id">
                        <script>
                    
                    function displaykode(kode){ 
                        var isi = kode;
                        
                        const kode_isi = [
                        <?php 
                        $pickkode11 = mysqli_query($koneksi,"SELECT * from tb_kode");
                        while($kode11 = mysqli_fetch_array($pickkode11)){
                        echo '{kodest:"'.$kode11['nama_kode'].'",keg1:"'.$kode11['kegiatan'].'",keg2:"'.$kode11['kegiatan2'].'",keg3:"'.$kode11['kegiatan3'].'",keg4:"'.$kode11['kegiatan4'].'",keg5:"'.$kode11['kegiatan5'].'",keg6:"'.$kode11['kegiatan6'].'"},';}?>
                        
                        ];
                        
                        const isi2 = kode_isi.find((coba)  => coba.kodest == kode);
                        var ada_kode = isi2.kodest;
                        var isi_kode ="";
                        var no_kode  ="";
                        const isi3 = kode_isi.filter((coba)  => coba.kodest != kode);
                        const isi4 = isi3.some((coba2)  => coba2.kodest != kode);
                        // looping untuk yang tidak sama dengan saat diklik
                        for(let i = 0; i < isi3.length; i++){
                           if(isi4 == true ){
                           document.getElementById(isi3[i].kodest).style.display = "none";
                           document.getElementById(ada_kode).style.display = "block";
                          }
                        }
                        }
                        
                    </script>  
                    
                       <label>Kode.ST :</label>
                       <input type="hidden" value="<?php echo $d['kode_st'];?>" name="kode_lama">
                        <?php
                        $no = 1;
                        $no1 = 1;
                        $pickkode = mysqli_query($koneksi,"SELECT * from tb_kode");
                        while($kode = mysqli_fetch_array($pickkode)){
                        ?>
                         <div class="form-group">
                            
                            <input type="radio" style="width: 10px; margin-bottom: -30px;" class="form-control" name="hasil_kode" required="required" 
                            value="<?php echo $kode["nama_kode"]; ?>" onclick="displaykode(this.value)" id="<?php echo $kode["id_kode"]; ?>"
                            
                            >
                            <span style="margin-left: 20px; position: absolute;"><?php echo $kode["nama_kode"]; ?></span>
                        </div>
                        <div id="<?php echo $kode["nama_kode"]; ?>" class="form-group" style="display:none;">
                         <br>
                         <span>-&emsp;<?php echo $kode["kegiatan"]; ?><br></span>
                         <span>-&emsp;<?php echo $kode["kegiatan2"]; ?><br></span>
                         <span>-&emsp;<?php echo $kode["kegiatan3"]; ?><br></span>
                         <span>-&emsp;<?php echo $kode["kegiatan4"]; ?><br></span>
                         <span>-&emsp;<?php echo $kode["kegiatan5"]; ?><br></span>
                         <span>-&emsp;<?php echo $kode["kegiatan6"]; ?></span>
                        </div>
                        
                        <?php  } // end while?>
                        <script>
                            <?php
                            
                            ?>
                            document.getElementById(<?php echo $pickidkode; ?>).checked = true;
                        </script>
                      
                        <br>
                        <div class="form-group">
                            <label>Perihal :</label>
                            <input type="text" class="form-control" name="perihal" required="required"
                            value="<?php echo $d['perihal']; ?>">
                        </div>
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
                             $readgol = $d['tujuan_st']; 
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
                            <label id="stkode">Kode ST :</label>
                            <input type="text" class="form-control" name="kode_st" required="required" 
                            value="<?php echo $d['kode_st']; ?>"  id="stkode2">
                            <input type="hidden" class="form-control" name="kode_st2" required="required" 
                            value="<?php echo $d['kode_st']; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>No.SPD :</label>
                            <input type="text" class="form-control" name="no_spd1" required="required" 
                            value="<?php echo $d['no_spd']; ?>">
                        </div>

                        <div class="form-group">
                            <label >No.ST :</label>
                            <input type="text" class="form-control" name="no_st" required="required"
                            value="<?php echo $d['no_st']; ?>">
                        </div>
                        
                        <div class="form-group mt-4">
                            <label>Tanggal Berangkat :</label>             
                            <input type="datetime-local" class="form-control" name="tgl_berangkat" id="mulai"
                            value="<?php echo $d['tgl_berangkat']; ?>">
                        </div>
                        
                        <div class="form-group mt-4">
                            <label>Tanggal Pulang :</label>             
                            <input type="datetime-local" class="form-control" name="tgl_pulang" id="mulai"
                            value="<?php echo $d['tgl_pulang']; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label></label>
                            <input type="submit" name="btn2" class="btn btn-primary" value="Simpan">
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