<?php
require 'config.php';
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['nama']) && empty($_SESSION['is_admin'])) {
    header('location:login.php');
}
$nav        = "Data Saya";
$page       = "Password";
$slug       = "ganti-password";
$nav1       = "Ganti";
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
                                                  SELECT * FROM cuti
                                                  JOIN user
                                                  ON cuti.user_id = user.id
                                                  WHERE cuti_id = '$id'
                                                  ");
                                    $tampil     = mysqli_fetch_array    ($kueri);
                                    // End Edit Library
                                    ?>
                                    <!-- Mulai Konten -->
                                        <form action="lib/<?= strtolower($slug); ?>-<?= strtolower($nav1); ?>-aksi.php" class="form-horizontal" method="POST">
                                            <!-- EDIT ID -->
                                            <input type="hidden" name="id" value="<?= $tampil['cuti_id']; ?>">
                                            <!-- EDIT ID -->
                                            <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Pilih Pegawai</label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label class="control-label"><input type="text" readonly name="pegawai" value="<?= $tampil['nama']; ?>" class="form-control"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Jatah Cuti</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" value="<?= $tampil['jumlah_cuti']; ?>" placeholder="Jatah Cuti" name="jumlah">
                                                                <span class="input-group-addon" id="sizing-addon1">per tahun</span>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Periode</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="tahun" class="form-control" required>
                                                            <option value="<?= $tampil['tahun']; ?>"><?= $tampil['tahun']; ?></option>
                                                            <option value="">---</option>
                                                            <?php
                                                            $tahunini   = date('Y');
                                                            for($i=$tahunini;$i<=2025;$i++) { ?>
                                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-actions">
                                                        <div style="margin-top:15px;" class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn green"><?= $nav1; ?></button>&nbsp;
                                                            <a href="<?= $slug; ?>.php"><button type="button" class="btn default">Batal</button></a>
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