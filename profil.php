<?php
require 'config.php';
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['nama']) && empty($_SESSION['is_admin'])) {
    header('location:login.php');
}
$nav        = "Data Pegawai";
$page       = "Pegawai";
$slug       = "pegawai";
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
                                                        <input type="text" placeholder="NIP" name="nip" value="<?= $tampil['nip']; ?>" readonly required="required" class="form-control">        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Nama Pegawai</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Nama" name="nama" value="<?= $tampil['nama']; ?>" required="required" class="form-control">        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Email</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="email" placeholder="Email" name="email" value="<?= $tampil['email']; ?>" required="required" class="form-control">        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Password</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="password" placeholder="Password" name="password" value="<?= $tampil['password']; ?>" required="required" class="form-control">        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Nomor KTP</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Nomor KTP" name="noktp" value="<?= $tampil['no_ktp']; ?>" required="required" class="form-control">        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">NPWP</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="NPWP" name="npwp" value="<?= $tampil['npwp']; ?>" class="form-control">        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Agama</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="agama" class="form-control" required>
                                                            <option value="<?= $tampil['agama_id']; ?>"><?= $tampil['agama']; ?></option>
                                                            <option value="">-- Pilih --</option>
                                                        <?php
                                                        $kueri2         = mysqli_query($conn,"SELECT * FROM agama");
                                                        while ($tampil2 = mysqli_fetch_array($kueri2)) { ?>
                                                            <option value="<?= $tampil2['agama_id']; ?>"><?= $tampil2['agama']; ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <input type="number" placeholder="Tanggal" class="form-control" name="tgl_lahir" value="<?= $tampil['tanggal_lahir']; ?>">
                                                            </span>
                                                            <span class="input-group-addon">
                                                                <select name="bln_lahir" class="form-control" required>
                                                                    <option value="<?= $tampil['bulan_lahir']; ?>"><?= $tampil['bulan_lahir']; ?></option>
                                                                    <option value="">Bulan</option>
                                                                    <?php
                                                                    include 'lib/bulan.php';
                                                                    for($i=0;$i<=11;$i++) { ?>
                                                                    <option value="<?= $bulan[$i]; ?>"><?= $bulan[$i]; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </span>
                                                            <span class="input-group-addon">
                                                                <input placeholder="Tahun" type="number" class="form-control" name="thn_lahir" value="<?= $tampil['tahun_lahir']; ?>">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Jenis Kelamin</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="jenis_kelamin" class="form-control" required>
                                                            <option value="<?= $tampil['jenis_kelamin']; ?>"><?= $tampil['jenis_kelamin']; ?></option>
                                                            <option value="">-- Pilih --</option>
                                                            <option value="Laki-laki">Laki-laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Status Pegawai</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="status_pegawai" class="form-control" required>
                                                            <option value="<?= $tampil['status_id']; ?>"><?= $tampil['status_pegawai']; ?></option>
                                                            <option value="">-- Pilih --</option>
                                                        <?php
                                                        $kueri3           = mysqli_query($conn,"SELECT * FROM status_pegawai");
                                                        while ($tampil3   = mysqli_fetch_array($kueri3)) { ?>
                                                            <option value="<?= $tampil3['status_id']; ?>"><?= $tampil3['status_pegawai']; ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Tanggal Masuk</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <input type="number" placeholder="Tanggal" class="form-control" name="tgl_masuk" value="<?= $tampil['tanggal_masuk']; ?>">
                                                            </span>
                                                            <span class="input-group-addon">
                                                                <select name="bln_masuk" class="form-control" required>
                                                                    <option value="<?= $tampil['bulan_masuk']; ?>"><?= $tampil['bulan_masuk']; ?></option>
                                                                    <option value="">Bulan</option>
                                                                    <?php
                                                                    include 'lib/bulan.php';
                                                                    for($i=0;$i<=11;$i++) { ?>
                                                                    <option value="<?= $bulan[$i]; ?>"><?= $bulan[$i]; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </span>
                                                            <span class="input-group-addon">
                                                                <input placeholder="Tahun" type="number" class="form-control" name="thn_masuk" value="<?= $tampil['tahun_masuk']; ?>">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Alamat</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <textarea class="form-control" name="alamat" cols="30" rows="3" placeholder="Alamat..."><?= $tampil['alamat']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12"></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span class="input-group-addon">
                                                            <input class="form-control" name="kelurahan" placeholder="Kelurahan" value="<?= $tampil['kelurahan']; ?>" />
                                                        </span>
                                                        <span class="input-group-addon">
                                                            <input class="form-control" name="kecamatan" placeholder="Kecamatan" value="<?= $tampil['kecamatan']; ?>"/>
                                                        </span>
                                                        <span class="input-group-addon">
                                                            <input class="form-control" name="kodepos" placeholder="Kode Pos" value="<?= $tampil['kode_pos']; ?>"/>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12"></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span class="input-group-addon">
                                                            <input class="form-control" name="kota" placeholder="Kota" value="<?= $tampil['kota']; ?>"/>
                                                        </span>
                                                        <span class="input-group-addon">
                                                            <input class="form-control" name="propinsi" placeholder="Propinsi" value="<?= $tampil['propinsi']; ?>"/>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Pendidikan Terakhir</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="pendidikan_terakhir" class="form-control" required>
                                                            <option value="<?= $tampil['pendidikan_terakhir']; ?>"><?= $tampil['pendidikan_terakhir']; ?></option>
                                                            <option value="">-- Pilih --</option>
                                                            <option value="SD">SD</option>
                                                            <option value="SMP">SMP</option>
                                                            <option value="SMA">SMA</option>
                                                            <option value="D3">D3</option>
                                                            <option value="S1">S1</option>
                                                            <option value="S2">S2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Bentuk Wajah</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="bentuk_wajah" class="form-control" required>
                                                            <option value="<?= $tampil['bentuk_id']; ?>"><?= $tampil['bentuk']; ?></option>
                                                            <option value="">-- Pilih --</option>
                                                        <?php
                                                        $kueri4         = mysqli_query($conn,"SELECT * FROM bentuk_wajah");
                                                        while ($tampil4 = mysqli_fetch_array($kueri4)) { ?>
                                                            <option value="<?= $tampil4['bentuk_id']; ?>"><?= $tampil4['bentuk']; ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Jenis Rambut</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="jenis_rambut" class="form-control" required>
                                                            <option value="<?= $tampil['jenis_id']; ?>"><?= $tampil['jenis']; ?>
                                                            <option value="">-- Pilih --</option>
                                                        <?php
                                                        $kueri5      = mysqli_query($conn,"SELECT * FROM jenis_rambut");
                                                        while ($tampil5 = mysqli_fetch_array($kueri5)) { ?>
                                                            <option value="<?= $tampil5['jenis_id']; ?>"><?= $tampil5['jenis']; ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Status Pernikahan</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="status_pernikahan" class="form-control" required>
                                                        <option value="<?= $tampil['status_pernikahan']; ?>"><?= $tampil['status_pernikahan']; ?></option>
                                                        <option value="">-- Pilih --</option>
                                                        <option value="Menikah">Menikah</option>
                                                        <option value="Belum Menikah">Belum Menikah</option>
                                                        <option value="Janda">Janda</option>
                                                        <option value="Duda">Duda</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Jabatan</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="jabatan" class="form-control" required>
                                                            <option value="<?= $tampil['jabatan_id']; ?>"><?= $tampil['jabatan']; ?></option>
                                                            <option value="">-- Pilih --</option>
                                                        <?php
                                                        $kueri6      = mysqli_query($conn,"SELECT * FROM jabatan");
                                                        while ($tampil6 = mysqli_fetch_array($kueri6)) { ?>
                                                            <option value="<?= $tampil6['jabatan_id']; ?>"><?= $tampil6['jabatan']; ?></option>
                                                        <?php } ?>
                                                        </select>
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
                                                        <input type="file" name="foto" class="form-control">
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