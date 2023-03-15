<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Data File SPD</h4>
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

        <?php

            $pickid_spd =$_GET["idspd"];

        ?>


    <div class="panel">

        <div class="panel-heading">
            <h3 class="panel-title">Data File SPD</h3>
            
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
            <br>
            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                <tr>
                        <th width="1%">No</th>
                        <th class="text-center" >Dokumen </th>
                        <th class="text-center" >Nama File</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                   
                   $no = 1;
                   function query($query){
                    global $koneksi;
                    $result = mysqli_query($koneksi,$query);
                    $rows = [];
                    while ($row = mysqli_fetch_assoc($result)) {
                        $rows[] = $row ;
                    }
                    return $rows;
                    }
                    $datakosong = ""; 
                    $spd = mysqli_query($koneksi,"SELECT * FROM tabel_spd where spd_id='$pickid_spd'");

                    while ($p = mysqli_fetch_array($spd)){
                        $picknospd = $p["no_spd"];
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>ST</td>
                            <td><a style="color: blue;" target="_blank" href="../arsip/<?php echo $p['no_spd']?>/<?php echo $p['file1'] ?>"><?php echo $p["file1"]; ?></a></td>
                            
                        </tr>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>SPD</td>
                            <td><a style="color: blue;" target="_blank" href="../arsip/<?php echo $p['no_spd']?>/<?php echo $p['file2'] ?>"><?php echo $p["file2"]; ?></a></td>
                            
                        </tr>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>Lap. Visit/ Bukti Visit</td>
                            <td><a style="color: blue;" target="_blank" href="../arsip/<?php echo $p['no_spd']?>/<?php echo $p['file3'] ?>"><?php echo $p["file3"]; ?></a></td>
                            
                        </tr>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>DBPD(Daftar Biaya Pengeluaran Dinas) </td>
                            <td><a style="color: blue;" target="_blank" href="../arsip/<?php echo $p['no_spd']?>/<?php echo $p['file4'] ?>"><?php echo $p["file4"]; ?></a></td>
                            
                        </tr>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>DPR(Daftar Pengeluaran Riil)</td>
                            <td><a style="color: blue;" target="_blank" href="../arsip/<?php echo $p['no_spd']?>/<?php echo $p['file5'] ?>"><?php echo $p["file5"]; ?></a></td>
                            
                           
                        </tr>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>Surat Pernyataan SPD</td>
                            <td><a style="color: blue;" target="_blank" href="../arsip/<?php echo $p['no_spd']?>/<?php echo $p['file6'] ?>"><?php echo $p["file6"]; ?></a></td>
                           
                        </tr>
                        <?php 
                    }
                    ?>
                </tbody>
            </table>


        </div>

    </div>
</div>


<?php include 'footer.php'; ?>