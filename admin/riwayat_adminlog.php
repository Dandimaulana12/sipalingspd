<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Data Riwayat</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Riwayat</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="panel panel">

        <div class="panel-heading">
            <h3 class="panel-title">Data Riwayat Unduhan Arsip</h3>
        </div>
        <div class="panel-body">


            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th width="18%">Nama Admin</th>
                        <th width="30%">Username</th>
                        <th width="30%">Waktu Login</th>
                        <th width="30%">Waktu Logout</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $saya = $_SESSION['id'];
                    $adminlog = mysqli_query($koneksi,"SELECT * FROM admin_login WHERE id_admin='$saya'");
                    while($p = mysqli_fetch_array($adminlog)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $p['nama_admin'] ?></td>
                            <td><?php echo $p['username_admin'] ?></td>
                            <td><?php echo $p['waktu_login'] ?></td>
                            <td><?php echo $p['waktu_logout'] ?></td>
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