<?php
require 'config.php';
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['nama']) && empty($_SESSION['is_admin'])) {
    header('location:login.php');
}
$nav        = "Data Pegawai";
$page       = "Pegawai";
$slug       = "pegawai";
$nav1       = "Lihat";
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
                                                  SELECT * FROM user
                                                  JOIN agama
                                                  ON user.agama             = agama.agama_id
                                                  JOIN bentuk_wajah
                                                  ON user.bentuk_wajah      = bentuk_wajah.bentuk_id
                                                  JOIN status_pegawai
                                                  ON user.status_pegawai    = status_pegawai.status_id
                                                  JOIN jenis_rambut
                                                  ON user.jenis_rambut      = jenis_rambut.jenis_id
                                                  JOIN jabatan
                                                  ON user.jabatan           = jabatan.jabatan_id
                                                  WHERE id = '$id'
                                                  ");
                                    $tampil     = mysqli_fetch_array($kueri);
                                    // End Edit Library
                                    ?>
                                    <!-- Mulai Konten -->
                                        <form enctype="multipart/form-data" action="lib/<?= strtolower($slug); ?>-<?= strtolower($nav1); ?>-aksi.php" class="form-horizontal" method="POST">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <!-- EDIT ID -->
                                                    <input type="hidden" name="id" value="<?= $tampil['id']; ?>">
                                                    <!-- EDIT ID -->
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">NIP<br/><i>(Nomor Induk Pegawai)</i></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label"><?= $tampil['nip']; ?></label>    
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Nama Pegawai</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label"><?= $tampil['nama']; ?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Email</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label"><?= $tampil['email']; ?></label> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Nomor KTP</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label"><?= $tampil['no_ktp']; ?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">NPWP</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label"><?= $tampil['npwp']; ?></label>   
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Agama</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                       <label class="control-label"><?= $tampil['agama']; ?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label"><?= $tampil['tanggal_lahir']." ".$tampil['bulan_lahir']." ".$tampil['tahun_lahir']; ?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Jenis Kelamin</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label"><?= $tampil['jenis_kelamin']; ?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Status Pegawai</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label"><?= $tampil['status_pegawai']; ?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Tanggal Masuk</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label"><?= $tampil['tanggal_masuk']." ".$tampil['bulan_masuk']." ".$tampil['tahun_masuk']; ?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Alamat</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label style="text-align:left" class="control-label"><?= $tampil['alamat']; ?><br/><?= $tampil['kelurahan']; ?>, <?= $tampil['kecamatan']; ?><br/><?= $tampil['kota']; ?> - <?= $tampil['kode_pos']; ?><br/><?= $tampil['propinsi']; ?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Pendidikan Terakhir</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label"><?= $tampil['pendidikan_terakhir']; ?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Bentuk Wajah</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                       <label class="control-label"><?= $tampil['bentuk']; ?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Jenis Rambut</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                       <label class="control-label"><?= $tampil['jenis']; ?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Status Pernikahan</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                       <label class="control-label"><?= $tampil['status_pernikahan']; ?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Jabatan</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                       <label class="control-label"><?= $tampil['jabatan']; ?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Foto</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <?php 
                                                        if(empty($tampil['foto'])) {
                                                            echo "Belum ada foto.";
                                                        } else { ?>
                                                            <img style="width: 80px;" src='assets/foto_pegawai/<?= $tampil['foto']; ?>'/>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Gol. Darah & Warna Kulit</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span class="input-group-addon">
                                                            <select name="golongan_darah" class="form-control" required>
                                                            <option value="<?= $tampil['golongan_darah']; ?>"><?= $tampil['golongan_darah']; ?></option>
                                                            <option value="">-- Golongan Darah --</option>
                                                            <option value="AB">AB</option>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="O">O</option>
                                                            </select>
                                                        </span>
                                                        <span class="input-group-addon">
                                                            <select name="warna_kulit" class="form-control" required>
                                                            <option value="<?= $tampil['warna_kulit']; ?>"><?= $tampil['warna_kulit']; ?></option>
                                                            <option value="">-- Warna Kulit --</option>
                                                            <option value="Putih Bersih">Putih Bersih</option>
                                                            <option value="Putih Kecoklatan">Putih Kecoklatan</option>
                                                            <option value="Coklat">Coklat</option>
                                                            <option value="Coklat Sawo Matang">Coklat Sawo Matang</option>
                                                            </select>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Berat & Tinggi</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span class="input-group-addon">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Tinggi" name="tinggi_badan" value="<?= $tampil['tinggi_badan']; ?>">
                                                                <span class="input-group-addon" id="sizing-addon1">cm</span>
                                                            </div>
                                                        </span>
                                                        <span class="input-group-addon">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Berat" name="berat_badan" value="<?= $tampil['berat_badan']; ?>">
                                                                <span class="input-group-addon" id="sizing-addon1">kg</span>
                                                            </div>
                                                        </span>
                                                    </div>
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