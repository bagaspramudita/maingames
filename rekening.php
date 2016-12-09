<?php
require 'config.php';
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['nama']) && empty($_SESSION['is_admin'])) {
    header('location:login.php');
}
$nav        = "Data Saya";
$page       = "Rekening";
$slug       = "rekening";

$kuera      = mysqli_query($conn,"SELECT * FROM rekening WHERE user_id = '".$_SESSION['id']."'");
$cekra      = mysqli_num_rows($kuera);
$tampal     = mysqli_fetch_array($kuera);
if($cekra == 1) {
    $nav1       = "Edit";
} else {
    $nav1       = "Tambah";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?= $nav1." ".$page; ?></title>
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
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span><?= $nav1." ".$page; ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <span class="caption-subject font-green-sharp bold uppercase"><?= $nav1." ".$page; ?></span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                    <?php
                                    // Begin Edit Library
                                    $id         = abs($_SESSION['id']);
                                    $kueri      = mysqli_query($conn,"
                                                  SELECT * FROM user
                                                  WHERE id = '$id'
                                                  ");
                                    $tampil     = mysqli_fetch_array($kueri);
                                    // End Edit Library
                                    ?>
                                    <!-- Mulai Konten -->
                                        <form action="lib/<?= strtolower($slug); ?>-<?= strtolower($nav1); ?>-aksi.php" class="form-horizontal" method="POST">
                                            <!-- EDIT ID -->
                                            <input type="hidden" name="id" value="<?= $tampil['id']; ?>">
                                            <!-- EDIT ID -->
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Nama Bank</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select name="nama_bank" class="form-control">
                                                        <?= ($cekra == 1 ? "<option value='".$tampal['nama_bank']."'>".$tampal['nama_bank']."</option>" : ""); ?>
                                                        <option value="">--- Pilih Bank ---</option>
                                                        <?php
                                                        include 'lib/bank.php';
                                                        for($i=0;$i<=6;$i++) { ?>
                                                        <option value="<?= $bank[$i]; ?>"><?= $bank[$i]; ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">No. Rekening</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" maxlength="15" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required name="no_rekening" placeholder="No. Rekening" class="form-control" value="<?= ($cekra == 1 ? $tampal['no_rekening'] : ""); ?>"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Atas Nama</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" required name="atas_nama" placeholder="Nama Pemilik Rekening" class="form-control" value="<?= ($cekra == 1 ? $tampal['atas_nama'] : ""); ?>"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-actions">
                                                        <div style="margin-top:15px;" class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn green">Simpan</button>&nbsp;
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <!-- Akhir Konten -->
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