<?php
require 'config.php';
include 'lib/bulan.php';
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['nama']) && empty($_SESSION['is_admin'])) {
    header('location:login.php');
}
$nav        = "Transaksi";
$page       = "Pengajuan Cuti";
$slug       = "pengajuan-cuti";
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
                                                                  JOIN cuti
                                                                  ON user.id = cuti.user_id
                                                                  ");
                                                $tampul         = mysqli_fetch_array($kueru);
                                                ?>
                                                <!-- EDIT ID -->
                                                <input type="hidden" name="cuti_id" value="<?= $tampul['cuti_id']; ?>">
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
                                                        <label class="control-label col-md-12">Jenis Cuti</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label style="margin-bottom: 10px;margin-top: 10px;" class="mt-radio">
                                                            <input required type="radio" name="jenis" id="optionsRadios25" value="Cuti Tahunan"> Cuti Tahunan
                                                            <span></span>
                                                        </label><br/>
                                                        <label style="margin-bottom: 10px" class="mt-radio">
                                                            <input required type="radio" name="jenis" id="optionsRadios26" value="Cuti Menikah"> Cuti Menikah
                                                            <span></span>
                                                        </label><br/>
                                                        <label style="margin-bottom: 10px" class="mt-radio">
                                                            <input required type="radio" name="jenis" id="optionsRadios26" value="Cuti Sakit"> Cuti Sakit
                                                            <span></span>
                                                        </label><br/>
                                                        <label style="margin-bottom: 10px" class="mt-radio">
                                                            <input required type="radio" name="jenis" id="optionsRadios26" value="Cuti Keluarga Meninggal"> Cuti Keluarga Meninggal
                                                            <span></span>
                                                        </label><br/>
                                                        <label style="margin-bottom: 15px" class="mt-radio">
                                                            <input required type="radio" name="jenis" id="optionsRadios26" value="Cuti Melahirkan"> Cuti Melahirkan
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Alasan</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <textarea required rows="4" name="alasan" class="form-control" placeholder="Alasan Cuti..."></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Tanggal Mulai</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <input maxlength="2" value="<?= date('j'); ?>" type="number" placeholder="Tanggal" class="form-control" name="tanggal_mulai">
                                                            </span>
                                                            <span class="input-group-addon">
                                                                <select name="bulan_mulai" class="form-control" required>
                                                                    <option value="<?= date('n') ?>"><?= $bulan[date('n')]; ?></option>
                                                                    <option value="">--- Bulan --- </option>
                                                                    <?php
                                                                    for($i=1;$i<=12;$i++) { ?>
                                                                    <option value="<?= $i; ?>"><?= $bulan[$i]; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </span>
                                                            <span class="input-group-addon">
                                                                <input maxlength="4" value="<?= date('Y'); ?>" placeholder="Tahun" type="number" class="form-control" name="tahun_mulai">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Durasi Cuti</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                            <div class="input-group">
                                                                <input value="2" maxlength="2" type="text" class="form-control" placeholder="Durasi" name="durasi">
                                                                <span class="input-group-addon" id="sizing-addon1">hari</span>
                                                            </div>
                                                    </div>
                                                </div> -->
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Tanggal Berakhir</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <?php
                                                                $today      = date('j');
                                                                if($today > 28 AND $today <= 31) {
                                                                    $besok  = 32 - $today;
                                                                } else {
                                                                    $besok  = $today + 2;
                                                                }
                                                                ?>
                                                                <input maxlength="2" value="<?= $besok; ?>" type="number" placeholder="Tanggal" class="form-control" name="tanggal_berakhir">
                                                            </span>
                                                            <span class="input-group-addon">
                                                                <select name="bulan_berakhir" class="form-control" required>
                                                                <?php
                                                                if($today > $besok) { ?>
                                                                    <option value="<?= date('n')+1; ?>"><?php if(date('n')==12) { echo $bulan[1]; } ?></option>
                                                                <?php } else { ?>
                                                                    <option value="<?= date('n'); ?>"><?= $bulan[date('n')];  ?></option>
                                                                <?php } ?>
                                                                    <option value="">--- Bulan --- </option>
                                                                    <?php
                                                                    include 'lib/bulan.php';
                                                                    for($i=1;$i<=12;$i++) { ?>
                                                                    <option value="<?= $i; ?>"><?= $bulan[$i]; ?></option>  
                                                                    <?php } ?>
                                                                </select>
                                                            </span>
                                                            <span class="input-group-addon">
                                                                <input maxlength="4" value="<?= date('Y'); ?>" placeholder="Tahun" type="number" class="form-control" name="tahun_berakhir">
                                                            </span>
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