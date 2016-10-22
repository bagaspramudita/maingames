<?php
require 'config.php';
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['nama']) && empty($_SESSION['is_admin'])) {
	header('location:login.php');
}
$nav		= "Data Pegawai";
$page 		= "Pegawai";
$slug       = "pegawai";
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
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">NIP<br/><i>(Nomor Induk Pegawai)</i></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="NIP" name="nip" required="required" class="form-control">        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Nama Pegawai</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Nama" name="nama" required="required" class="form-control">        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Email</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="email" placeholder="Email" name="email" required="required" class="form-control">        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Password</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="password" placeholder="Password" name="password" required="required" class="form-control">        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Nomor KTP</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Nomor KTP" name="noktp" required="required" class="form-control">        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">NPWP</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="NPWP" name="npwp" required="required" class="form-control">        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Agama</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="agama" class="form-control" required>
                                                            <option value="">-- Pilih --</option>
                                                        <?php
                                                        $kueri      = mysqli_query($conn,"SELECT * FROM agama");
                                                        while ($tampil = mysqli_fetch_array($kueri)) { ?>
                                                            <option value="<?= $tampil['agama_id']; ?>"><?= $tampil['agama']; ?></option>
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
                                                                <input type="number" placeholder="Tanggal" class="form-control" name="tgl_lahir">
                                                            </span>
                                                            <span class="input-group-addon">
                                                                <select name="bln_lahir" class="form-control" required>
                                                                    <option value="">Bulan</option>
                                                                    <?php
                                                                    include 'lib/bulan.php';
                                                                    for($i=0;$i<=11;$i++) { ?>
                                                                    <option value="<?= $bulan[$i]; ?>"><?= $bulan[$i]; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </span>
                                                            <span class="input-group-addon">
                                                                <input placeholder="Tahun" type="number" class="form-control" name="thn_lahir">
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
                                                            <option value="">-- Pilih --</option>
                                                        <?php
                                                        $kueri      = mysqli_query($conn,"SELECT * FROM status_pegawai");
                                                        while ($tampil = mysqli_fetch_array($kueri)) { ?>
                                                            <option value="<?= $tampil['status_id']; ?>"><?= $tampil['status_pegawai']; ?></option>
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
                                                                <input type="number" placeholder="Tanggal" class="form-control" name="tgl_masuk">
                                                            </span>
                                                            <span class="input-group-addon">
                                                                <select name="bln_masuk" class="form-control" required>
                                                                    <option value="">Bulan</option>
                                                                    <?php
                                                                    include 'lib/bulan.php';
                                                                    for($i=0;$i<=11;$i++) { ?>
                                                                    <option value="<?= $bulan[$i]; ?>"><?= $bulan[$i]; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </span>
                                                            <span class="input-group-addon">
                                                                <input placeholder="Tahun" type="number" class="form-control" name="thn_masuk">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Alamat</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <textarea class="form-control" name="alamat" cols="30" rows="3" placeholder="Alamat..."></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12"></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span class="input-group-addon">
                                                            <input class="form-control" name="kelurahan" placeholder="Kelurahan"/>
                                                        </span>
                                                        <span class="input-group-addon">
                                                            <input class="form-control" name="kecamatan" placeholder="Kecamatan"/>
                                                        </span>
                                                        <span class="input-group-addon">
                                                            <input class="form-control" name="kodepos" placeholder="Kode Pos"/>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12"></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span class="input-group-addon">
                                                            <input class="form-control" name="kota" placeholder="Kota"/>
                                                        </span>
                                                        <span class="input-group-addon">
                                                            <input class="form-control" name="propinsi" placeholder="Propinsi"/>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Pendidikan Terakhir</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="pendidikan_terakhir" class="form-control" required>
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
                                                            <option value="">-- Pilih --</option>
                                                        <?php
                                                        $kueri      = mysqli_query($conn,"SELECT * FROM bentuk_wajah");
                                                        while ($tampil = mysqli_fetch_array($kueri)) { ?>
                                                            <option value="<?= $tampil['bentuk_id']; ?>"><?= $tampil['bentuk']; ?></option>
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
                                                            <option value="">-- Pilih --</option>
                                                        <?php
                                                        $kueri      = mysqli_query($conn,"SELECT * FROM jenis_rambut");
                                                        while ($tampil = mysqli_fetch_array($kueri)) { ?>
                                                            <option value="<?= $tampil['jenis_id']; ?>"><?= $tampil['jenis']; ?></option>
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
                                                            <option value="">-- Pilih --</option>
                                                        <?php
                                                        $kueri      = mysqli_query($conn,"SELECT * FROM jabatan");
                                                        while ($tampil = mysqli_fetch_array($kueri)) { ?>
                                                            <option value="<?= $tampil['jabatan_id']; ?>"><?= $tampil['jabatan']; ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-md-12">Foto</label>
                                                    </div>
                                                    <div class="col-md-4">
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
                                                            <option value="">-- Golongan Darah --</option>
                                                            <option value="AB">AB</option>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="O">O</option>
                                                            </select>
                                                        </span>
                                                        <span class="input-group-addon">
                                                            <select name="warna_kulit" class="form-control" required>
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
                                                                <input type="text" class="form-control" placeholder="Tinggi" name="tinggi_badan" ">
                                                                <span class="input-group-addon" id="sizing-addon1">cm</span>
                                                            </div>
                                                        </span>
                                                        <span class="input-group-addon">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Berat" name="berat_badan">
                                                                <span class="input-group-addon" id="sizing-addon1">kg</span>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- Awal Tombol Submit -->
                                                <div class="form-group">
                                                    <div class="form-actions">
                                                        <div style="margin-top:15px;" class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn green"><?= $nav1; ?></button>&nbsp;
                                                            <a href="<?= $page; ?>.php"><button type="button" class="btn default">Batal</button></a>
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