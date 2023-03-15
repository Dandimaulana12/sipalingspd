<?php 
include '../koneksi.php';
?>

<table border="1">
<tr>
                        <th width="1%">No</th>
                        <th class="text-center">Nama Pegawai</th>
                        <th class="text-center">Jabatan Pegawai</th>
                        <th class="text-center">Golongan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">no.SPD</th>
                        <th class="text-center">no.ST</th>
                        <th class="text-center">Kota Tujuan ST</th>
                        <th class="text-center">Kode ST</th>
                        <th class="text-center">Perihal ST</th>
                        <th class="text-center">Tanggal Berangkat</th>
                        <th class="text-center">Tanggal Pulang</th>
                        <th class="text-center">Uang Harian</th>
                        <th class="text-center">Lama Hari</th>
                        <th class="text-center">DBPR</th>
                        <th class="text-center">DPR</th>
                        <th class="text-center">Lainnya</th>
                        <th class="text-center">Jumlah</th>
                    </tr>
    <?php 
    $data = mysqli_query($koneksi,"SELECT * from tabel_spd"); 
    $no = 1;
    while($d = mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo $d['jabatan']; ?></td>
        <td><?php echo $d['golongan']; ?></td>
        <td><?php echo $d['status']; ?></td>
        <td><?php echo $d['no_spd']; ?></td>
        <td><?php echo $d['no_st']; ?></td>
        <td><?php echo $d['tujuan_st']; ?></td>
        <td><?php echo $d['kode_st']; ?></td>
        <td><?php echo $d['perihal']; ?></td>
        <td><?php echo $d['tgl_berangkat']; ?></td>
        <td><?php echo $d['tgl_pulang']; ?></td>
        <?php
        $pickidspd = $d["spd_id"];
        $datarincian = mysqli_query($koneksi,"SELECT * from tb_rincian where id_spd='$pickidspd'");
        while($rincian = mysqli_fetch_array($datarincian)){
        ?>
        <td><?php $parsenol1 = $rincian["jumlah"]; 
        if ($parsenol1 == "") {
             $hasiljumlah = 0;
             echo $hasiljumlah;
        }else{
            $hasiljumlah = $rincian['jumlah'];
            echo $hasiljumlah;
        }?></td>
        <td><?php $parsenol2 = $rincian["lama_hari"]; 
        if ($parsenol2 == "") {
             $hasillama = 0;
             echo $hasillama;
        }else{
            $hasillama = $rincian['lama_hari'];
            echo $hasillama;
        }?></td>
        <td><?php $parsenol3 = $rincian["dbpr"]; 
        if ($parsenol3 == "") {
             $hasildbpr = 0;
             echo $hasildbpr;
        }else{
            $hasildbpr = $rincian['dbpr'];
            echo $hasildbpr;
        }?></td>
        <td><?php $parsenol4 = $rincian["dpr"]; 
        if ($parsenol4 == "") {
             $hasildpr = 0;
             echo $hasildpr;
        }else{
            $hasildpr = $rincian['dpr'];
            echo $hasildpr;
        }?></td>
        <td><?php $parsenol4 = $rincian["lainnya"]; 
        if ($parsenol4 == "") {
             $hasillain = 0;
             echo $hasillain;
        }else{
            $hasillain = $rincian['lainnya'];
            echo $hasillain;
        }?></td>
        <td><?php 
        
        $jumlahlama = $hasiljumlah * $hasillama;
        $jumlahall = $hasildbpr+$hasildpr+$hasillain+$jumlahlama;
        echo $jumlahall;
        ?>
        </td>
        <?php
        }
        ?>
    </tr>
    <?php
    } 
    ?>
</table>