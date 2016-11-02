<?php
require 'config.php';
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['nama']) && empty($_SESSION['is_admin'])) {
    header('location:login.php');
}
$nav        = "Transaksi";
$page       = "Pengajuan Klaim";
$slug       = "pengajuan-klaim";
$nav1       = "Tambah";
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
                                        <form enctype="multipart/form-data" action="lib/<?= strtolower($slug); ?>-<?= strtolower($nav1); ?>-aksi.php" class="form-horizontal" method="POST">
                                            <div class="form-body">
                                                <?php
                                                $kueru          = mysqli_query($conn,"
                                                                  SELECT * FROM user
                                                                  WHERE id = '".$_SESSION['id']."'
                                                                  ");
                                                $tampul         = mysqli_fetch_array($kueru);
                                                ?>
                                                <!-- EDIT ID -->
                                                <input type="hidden" name="user_id" value="<?= $tampul['id']; ?>">
                                                <!-- EDIT ID -->
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Nama</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" readonly name="nama" value="<?= $tampul['nama']; ?>" required="required" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Subjek</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" name="subjek" placeholder="Subjek Klaim" required="required" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Deskripsi</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <textarea rows="4" name="deskripsi" class="form-control" placeholder="Deskripsi Klaim..." required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Jumlah</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" id="sizing-addon1">Rp</span>
                                                            <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" type="text" class="form-control" placeholder="Jumlah" name="jumlah">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Metode Pengembalian</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <?php
                                                    $kuera          = mysqli_query($conn,"
                                                                      SELECT * FROM rekening
                                                                      WHERE user_id = '".$_SESSION['id']."'
                                                                      ");
                                                    $cekara         = mysqli_num_rows($kuera);
                                                    if($cekara == 0) {
                                                    ?>
                                                        <label style="margin-bottom: 10px;margin-top: 10px;" class="mt-radio">
                                                            <input checked required type="radio" name="metode" id="optionsRadios25" value="Cash"> Uang Cash
                                                            <span></span>
                                                        </label><br/>
                                                        <label style="margin-bottom: 10px" class="mt-radio">
                                                            <input disabled="" required type="radio" name="metode" id="optionsRadios26" value="Transfer"> Transfer Rekening - <a href="rekening.php">Tambahkan Rekening</a>
                                                            <span></span>
                                                        </label>
                                                    <?php } else { ?>
                                                        <label style="margin-bottom: 10px;margin-top: 10px;" class="mt-radio">
                                                            <input checked required type="radio" name="metode" id="optionsRadios25" value="Cash"> Uang Cash
                                                            <span></span>
                                                        </label><br/>
                                                        <label style="margin-bottom: 10px" class="mt-radio">
                                                            <input required type="radio" name="metode" id="optionsRadios26" value="Transfer"> Transfer Rekening
                                                            <span></span>
                                                        </label>
                                                    <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Bukti Pembelian</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="file" name="bukti" class="form-control" required>
                                                    </div>
                                                </div>
                                                </div>
                                                <!-- Awal Tombol Submit -->
                                                <div class="form-group">
                                                    <div class="form-actions">
                                                        <div style="margin-top:15px;" class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn green"><?= $nav1; ?></button>&nbsp;
                                                            <a href="<?= $slug; ?>.php"><button type="button" class="btn default">Batal</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Akhir Tombol Submit -->
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