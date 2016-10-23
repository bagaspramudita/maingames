<?php
require 'config.php';
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['nama']) && empty($_SESSION['is_admin'])) {
    header('location:login.php');
}
$nav        = "Data Pegawai";
$page       = "Cuti";
$slug       = "cuti";
$nav1       = "Edit";
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
                                    $id         = abs($_GET['id']);
                                    $kueri      = mysqli_query($conn,"
                                                  SELECT * FROM cuti
                                                  JOIN user
                                                  ON cuti.user_id = user.id
                                                  WHERE cuti_id = '$id'
                                                  ");
                                    $tampil     = mysqli_fetch_array($kueri);
                                    // End Edit Library
                                    ?>
                                    <!-- Mulai Konten -->
                                        <form action="lib/<?= strtolower($slug); ?>-<?= strtolower($nav1); ?>-aksi.php" class="form-horizontal" method="POST">
                                            <!-- EDIT ID -->
                                            <input type="hidden" name="id" value="<?= $tampil['user_id']; ?>">
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
                                                        <label class="control-label col-md-12">Bertindak Sebagai</label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label class="control-label">
                                                            <label style="margin-bottom: -15px" class="mt-radio">
                                                                <input required <?= ($tampil['sebagai'] == "Suami" ? "checked" : ""); ?> type="radio" name="sebagai" id="optionsRadios25" value="Suami"> Suami
                                                                <span></span>
                                                            </label>&nbsp;&nbsp;&nbsp;
                                                            <label style="margin-bottom: -15px" class="mt-radio">
                                                                <input required <?= ($tampil['sebagai'] == "Istri" ? "checked" : ""); ?> type="radio" name="sebagai" id="optionsRadios26" value="Istri"> Istri
                                                                <span></span>
                                                            </label>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Nama Pasangan</label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="text" value="<?= $tampil['suami_istri']; ?>" placeholder="Nama Pasangan" name="pasangan" required="required" class="form-control">        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Tanggal Lahir Pasangan</label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <input value="<?= $tampil['tgl_lahir']; ?>" type="number" placeholder="Tanggal" class="form-control" name="tgl_lahir">
                                                            </span>
                                                            <span class="input-group-addon">
                                                                <select name="bln_lahir" class="form-control" required>
                                                                    <option value="<?= $tampil['bln_lahir']; ?>"><?= $tampil['bln_lahir']; ?></option>
                                                                    <option value="">Bulan</option>
                                                                    <?php
                                                                    include 'lib/bulan.php';
                                                                    for($i=0;$i<=11;$i++) { ?>
                                                                    <option value="<?= $bulan[$i]; ?>"><?= $bulan[$i]; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </span>
                                                            <span class="input-group-addon">
                                                                <input value="<?= $tampil['thn_lahir']; ?>" placeholder="Tahun" type="number" class="form-control" name="thn_lahir">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Tanggal Pernikahan</label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <input value="<?= $tampil['tanggal_menikah']; ?>" type="number" placeholder="Tanggal" class="form-control" name="tanggal_menikah">
                                                            </span>
                                                            <span class="input-group-addon">
                                                                <select name="bulan_menikah" class="form-control" required>
                                                                    <option value="<?= $tampil['bulan_menikah']; ?>"><?= $tampil['bulan_menikah']; ?></option>
                                                                    <option value="">Bulan</option>
                                                                    <?php
                                                                    include 'lib/bulan.php';
                                                                    for($i=0;$i<=11;$i++) { ?>
                                                                    <option value="<?= $bulan[$i]; ?>"><?= $bulan[$i]; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </span>
                                                            <span class="input-group-addon">
                                                                <input value="<?= $tampil['tahun_menikah']; ?>" placeholder="Tahun" type="number" class="form-control" name="tahun_menikah">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Jumlah Anak</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="jumlah_anak" class="form-control" required>
                                                            <option value="<?= $tampil['jumlah_anak']; ?>"><?= ($tampil['jumlah_anak'] == 0 ? "Belum Punya" : $tampil['jumlah_anak']); ?></option>
                                                            <option value="<?= ($tampil['jumlah_anak'] == 0 ? "" : ""); ?>"><?= ($tampil['jumlah_anak'] == 0 ? "-----" : "Belum Punya"); ?></option>
                                                            <?php
                                                            for($i=1;$i<=9;$i++) { ?>
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