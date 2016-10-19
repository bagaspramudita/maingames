<?php
require 'config.php';
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['nama']) && empty($_SESSION['is_admin'])) {
    header('location:login.php');
}
$nav        = "Data Master";
$page       = "Agama";
$nav1       = "Edit";

// Begin Edit Library
$id         = abs($_GET['id']);
$kueri      = mysqli_query($conn,"
              SELECT * FROM agama
              WHERE id = '$id'
              ");
$tampil     = mysqli_fetch_array($kueri);
// End Edit Library
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
                                    <!-- Mulai Konten -->
                                        <form action="lib/<?= strtolower($page); ?>-<?= strtolower($nav1); ?>-aksi.php" class="form-horizontal" method="POST">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-2">Agama</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <!-- EDIT ID -->
                                                        <input type="hidden" name="id" value="<?= $tampil['id']; ?>">
                                                        <!-- EDIT ID -->
                                                        <input type="text" placeholder="Masukan Agama..." name="agama" value="<?= $tampil['agama']; ?>" required="required" class="form-control">        
                                                    </div>
                                                    <div class="form-actions">
                                                <div style="margin-top:15px;" class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green"><?= $nav1; ?></button>&nbsp;
                                                    <a href="<?= $page; ?>.php"><button type="button" class="btn default">Batal</button></a>
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