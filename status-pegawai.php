<?php
require 'config.php';
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['nama']) && empty($_SESSION['is_admin'])) {
	header('location:login.php');
}
$nav		= "Data Master";
$page 		= "Status Pegawai";
$slug       = "status-pegawai";
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
                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center" width="5%">No</th>
                                                    <th style="text-align:center" width="52%">Jabatan</th>
                                                    <th style="text-align:center" width="13%">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no         = 0;
                                            $kueri      = mysqli_query($conn,"
                                                          SELECT * FROM status_pegawai
                                                          ORDER BY id
                                                          DESC
                                                          ");
                                            $cekdata    = mysqli_num_rows($kueri);
                                            if($cekdata == 0) { ?>
                                                <tr>
                                                    <td align="center" colspan="3">Belum Ada Data. &nbsp;
                                                        <a href="<?= strtolower($slug); ?>-tambah.php" class="btn blue">
                                                        <i class="fa fa-plus"></i> Tambahkan</a>
                                                        </td>
                                                </tr>
                                            <?php } else {
                                            while ($tampil = mysqli_fetch_array($kueri)) { $no++ ?>
                                                <tr>
                                                    <td align="center"><?= $no; ?></td>
                                                    <td><?= $tampil['status_pegawai']; ?></td>
                                                    <td align="center">
                                                        <a href="<?= strtolower($slug); ?>-edit.php?id=<?= $tampil['id']; ?>" class="btn btn-xs blue">Edit<i class="fa fa-edit"></i></a> 
                                                        <a onclick="javascript:return confirm('Yakin ingin hapus?');" href="lib/<?= strtolower($slug); ?>-hapus.php?id=<?=$tampil['id']; ?>" class="btn btn-xs red">Hapus<i class="fa fa-trash-o"></i></a>
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
    </body>
</html>