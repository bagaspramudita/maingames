<?php
require 'config.php';
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['nama']) && empty($_SESSION['is_admin'])) {
	header('location:login.php');
}
$nav		= "Data Pegawai";
$page 		= "Cuti";
$slug       = "cuti";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?= $page; ?></title>
        
        <?php include 'meta-header.php'; ?>
	</head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">
        <div class="page-wrapper">
        	<?php include 'header.php'; ?>
            <div class="clearfix"> </div>
            <div class="page-container">
                <?php include 'menu-admin.php'; ?>
                <div class="page-content-wrapper">
                    <div class="page-content">
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.php">PT MP Games</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span><?= $page; ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <span class="caption-subject font-green-sharp bold uppercase"><?= $page; ?></span>
                                            <span style="right: 36px;position: absolute;top: 15px;"><a href="<?= strtolower($slug); ?>-tambah.php">
                                                <button type="button" class="btn btn-default"><i class="fa fa-plus"></i>Tambah Baru</button>
                                            </a></span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                    <?php include 'lib/notifikasi.php'; ?>
                                        <table class="table table-striped table-bordered table-hover" id="tabeldata">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="1%">No</th>
                                                    <th class="text-center" width="10%">Nama Pegawai</th>
                                                    <th class="text-center" width="5%">Sisa Cuti</th>
                                                    <th class="text-center" width="8%">Periode</th>
                                                    <th class="text-center" width="5%">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no         = 0;
                                            $kueri      = mysqli_query($conn,"
                                                          SELECT * FROM user
                                                          JOIN cuti
                                                          ON user.id = cuti.user_id
                                                          ORDER BY cuti.cuti_id
                                                          DESC
                                                          ");
                                            $cekdata    = mysqli_num_rows($kueri);
                                            if($cekdata == 0) { ?>
                                                <tr>
                                                    <td align="center" colspan="5">Belum Ada Data. &nbsp;
                                                        <a href="<?= strtolower($slug); ?>-tambah.php" class="btn blue">
                                                        <i class="fa fa-plus"></i> Tambahkan</a>
                                                        </td>
                                                </tr>
                                            <?php } else {
                                            while ($tampil = mysqli_fetch_array($kueri)) { $no++ ?>
                                                <tr>
                                                    <td class="text-center"><?= $no; ?></td>
                                                    <td class="text-center"><strong><?= $tampil['nama']; ?></strong></td>
                                                    <td>
                                                        Cuti Tahunan: <?= $tampil['cuti_tahunan']; ?> hari<br/>
                                                        Cuti Menikah: <?= $tampil['cuti_menikah']; ?> hari<br/>
                                                        Cuti Sakit: <?= $tampil['cuti_sakit']; ?> hari<br/>
                                                        Cuti Keluarga Meninggal: <?= $tampil['cuti_keluarga_meninggal']; ?> hari<br/>
                                                        Cuti Tahunan: <?= $tampil['cuti_melahirkan']; ?> hari
                                                    </td>
                                                    <td class="text-center">Tahun <?= $tampil['tahun']; ?></td>
                                                    <td align="center">
                                                        <a href="<?= strtolower($slug); ?>-edit.php?id=<?= $tampil['cuti_id']; ?>" class="btn btn-xs blue">Edit<i class="fa fa-edit"></i></a> 
                                                        <a onclick="javascript:return confirm('Yakin ingin hapus?');" href="lib/<?= strtolower($slug); ?>-hapus.php?id=<?=$tampil['cuti_id']; ?>" class="btn btn-xs red">Hapus<i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php include 'footer-global.php'; ?>
        </div>
        <?php include 'js-global.php'; ?>
        <script>
        $(document).ready(function() {
            $('#tabeldata').DataTable();
        } );
        </script>
    </body>
</html>