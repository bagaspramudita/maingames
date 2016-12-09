<?php
require 'config.php';
error_reporting(0);
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['nama']) && empty($_SESSION['is_admin'])) {
	header('location:login.php');
}
$nav		= "Dashboard";
$page 		= "Dashboard";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PT MP Games</title>
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
                                            <span class="caption-subject font-green-sharp bold uppercase">Cari Pegawai</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                    <!-- Mulai Konten -->
                                        <form action="?cari=yes" class="form-horizontal" method="GET">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <div class="col-md-2">
                                                        <label class="control-label">NIP</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input maxlength="25" value="<?= $_GET['nip']; ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" placeholder="Nama Pegawai..." name="nip" class="form-control">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="control-label">Status Pegawai</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select name="status_pegawai" class="form-control">
                                                        <?php
                                                        if($_GET['status_pegawai']!="") { 
                                                        $kueri5         = mysqli_query($conn,"SELECT * FROM status_pegawai WHERE status_id = '".$_GET['status_pegawai']."'");
                                                        $tampil5        = mysqli_fetch_array($kueri5);
                                                        ?>
                                                        <option value="<?= $_GET['status_pegawai']; ?>"><?= $tampil5['status_pegawai']; ?></option>
                                                        <?php } ?>
                                                        <option value="">-- Pilih --</option>
                                                        <?php
                                                        $kueri2         = mysqli_query($conn,"SELECT * FROM status_pegawai");
                                                        while ($tampil2 = mysqli_fetch_array($kueri2)) { ?>
                                                        <option value="<?= $tampil2['status_id']; ?>"><?= $tampil2['status_pegawai']; ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-2">
                                                        <label class="control-label">Nama Pegawai</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input value="<?= $_GET['nama']; ?>" type="text" placeholder="Nama Pegawai..." name="nama" class="form-control">        
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="control-label">Jabatan</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select name="jabatan" class="form-control">
                                                        <?php
                                                        if($_GET['jabatan']!="") { 
                                                        $kueri6         = mysqli_query($conn,"SELECT * FROM jabatan WHERE jabatan_id = '".$_GET['jabatan']."'");
                                                        $tampil6        = mysqli_fetch_array($kueri6);
                                                        ?>
                                                        <option value="<?= $_GET['jabatan']; ?>"><?= $tampil6['jabatan']; ?></option>
                                                        <?php } ?>
                                                        <option value="">-- Pilih --</option>   
                                                        <?php
                                                        $kueri3         = mysqli_query($conn,"SELECT * FROM jabatan");
                                                        while ($tampil3 = mysqli_fetch_array($kueri3)) { ?>
                                                        <option value="<?= $tampil3['jabatan_id']; ?>"><?= $tampil3['jabatan']; ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-2">
                                                        <label class="control-label">Nomor KTP</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input value="<?= $_GET['noktp']; ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" placeholder="Nomor KTP..." name="noktp" class="form-control">  
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="control-label">Status Pernikahan</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select name="status_pernikahan" class="form-control">
                                                            <?php
                                                            if($_GET['status_pernikahan']!="") { 
                                                            ?>
                                                            <option value="<?= $_GET['status_pernikahan']; ?>"><?= $_GET['status_pernikahan']; ?></option>
                                                            <?php } ?>
                                                            <option value="">-- Pilih --</option>
                                                            <option value="Menikah">Menikah</option>
                                                            <option value="Belum Menikah">Belum Menikah</option>
                                                            <option value="Janda">Janda</option>
                                                            <option value="Duda">Duda</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-2">
                                                        <label class="control-label">Email</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input value="<?= $_GET['email']; ?>" type="email" placeholder="Email..." name="email" class="form-control">  
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="control-label">Pendidikan Terakhir</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select name="pendidikan_terakhir" class="form-control">
                                                            <?php
                                                            if($_GET['pendidikan_terakhir']!="") { 
                                                            ?>
                                                            <option value="<?= $_GET['pendidikan_terakhir']; ?>"><?= $_GET['pendidikan_terakhir']; ?></option>
                                                            <?php } ?>
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
                                                    <div class="col-md-2">
                                                        <label class="control-label">Agama</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select name="agama" class="form-control">
                                                        <?php
                                                        if($_GET['agama']!="") { 
                                                        $kueri7         = mysqli_query($conn,"SELECT * FROM agama WHERE agama_id = '".$_GET['agama']."'");
                                                        $tampil7        = mysqli_fetch_array($kueri7);
                                                        ?>
                                                        <option value="<?= $_GET['agama_id']; ?>"><?= $tampil7['agama']; ?></option>
                                                        <?php } ?>
                                                        <option value="">-- Pilih --</option>
                                                        <?php
                                                        $kueri1         = mysqli_query($conn,"SELECT * FROM agama");
                                                        while ($tampil1 = mysqli_fetch_array($kueri1)) { ?>
                                                        <option value="<?= $tampil1['agama_id']; ?>"><?= $tampil1['agama']; ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="control-label">Jenis Rambut</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select name="jenis_rambut" class="form-control">
                                                        <?php
                                                        if($_GET['jenis_rambut']!="") { 
                                                        $kueri8         = mysqli_query($conn,"SELECT * FROM jenis_rambut WHERE jenis_id = '".$_GET['jenis_rambut']."'");
                                                        $tampil8        = mysqli_fetch_array($kueri8);
                                                        ?>
                                                        <option value="<?= $_GET['jenis_id']; ?>"><?= $tampil8['jenis']; ?></option>
                                                        <?php } ?>
                                                        <option value="">-- Pilih --</option>
                                                        <?php
                                                        $kueri4         = mysqli_query($conn,"SELECT * FROM jenis_rambut");
                                                        while ($tampil4 = mysqli_fetch_array($kueri4)) { ?>
                                                        <option value="<?= $tampil4['jenis_id']; ?>"><?= $tampil4['jenis']; ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-actions">
                                                        <div style="margin-top:15px;" class="col-md-4">
                                                            <button type="submit" class="btn green">Cari Pegawai</button>&nbsp;
                                                            <a href="index.php"><button type="button" class="btn default">Atur Ulang</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php
                                    if(isset($_GET['nip'])) { ?>
                                    <table class="table table-striped table-bordered table-hover" id="tabeldata">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center" width="3%">No</th>
                                                <th style="text-align:center" width="6%">NIP</th>
                                                <th style="text-align:center" width="10%">Nama</th>
                                                <th style="text-align:center" width="7%">P. Terkahir</th>
                                                <th style="text-align:center" width="7%">Pernikahan</th>
                                                <th style="text-align:center" width="6%">Tanggal Lahir</th>
                                                <th style="text-align:center" width="15%">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no                     = 0;
                                        $nip                    = $_GET['nip'];
                                        $status_pegawai         = $_GET['status_pegawai'];
                                        $nama                   = $_GET['nama'];
                                        $jabatan                = $_GET['jabatan'];
                                        $noktp                  = $_GET['noktp'];
                                        $status_pernikahan      = $_GET['status_pernikahan'];
                                        $email                  = $_GET['email'];
                                        $pendidikan_terakhir    = $_GET['pendidikan_terakhir'];
                                        $agama                  = $_GET['agama'];
                                        $jenis_rambut           = $_GET['jenis_rambut'];

                                        if(empty($nip) && empty($status_pegawai) && empty($nama) && empty($jabatan) && empty($noktp) && empty($status_pernikahan) && empty($email) && empty($pendidikan_terakhir) && empty($agama) && empty($jenis_rambut))
                                        {
                                            echo ("
                                                    <script language='javascript'>
                                                    window.alert('Pilih salah satu filter pencarian!')
                                                    window.location.href='index.php';
                                                    </script>
                                                ");
                                        } else {
                                        $kueri                  = mysqli_query($conn,"
                                                                  SELECT * FROM user
                                                                  WHERE
                                                                  nip               LIKE '%$nip%'
                                                                  AND
                                                                  nama              LIKE '%$nama%'
                                                                  AND
                                                                  no_ktp            LIKE '%$noktp%'
                                                                  AND
                                                                  status_pegawai    LIKE '%$status_pegawai'
                                                                  AND 
                                                                  jabatan           LIKE '%$jabatan%'
                                                                  AND
                                                                  status_pernikahan LIKE '%$status_pernikahan%'
                                                                  AND
                                                                  email             LIKE '%$email%'
                                                                  AND 
                                                                  pendidikan_terakhir LIKE '%$pendidikan_terakhir%'
                                                                  AND
                                                                  agama             LIKE '%$agama%'
                                                                  AND
                                                                  jenis_rambut      LIKE '%$jenis_rambut%'
                                                                  LIMIT 10");
                                        $cekdata                = mysqli_num_rows($kueri);
                                        if($cekdata == 0) { ?>
                                            <tr>
                                                <td align="center" colspan="6">Silahkan memulai pencarian.
                                                    </td>
                                            </tr>
                                        <?php } else {
                                        while ($tampil = mysqli_fetch_array($kueri)) { $no++ ?>
                                            <tr>
                                                <td class="text-center" align="center"><?= $no; ?></td>
                                                <td class="text-center"><strong><?= $tampil['nip']; ?></strong></td>
                                                <td><?= $tampil['nama']; ?></td>
                                                <td class="text-center"><?= $tampil['pendidikan_terakhir']; ?></td>
                                                <td class="text-center"><?= $tampil['status_pernikahan']; ?></td>
                                                <td class="text-center"><?= $tampil['tanggal_lahir']." ".$tampil['bulan_lahir']." ".$tampil['tahun_lahir']; ?></td>
                                                <td align="center">
                                                    <a href="<?= strtolower($slug); ?>-lihat.php?id=<?= $tampil['id']; ?>" class="btn btn-xs purple">Lihat<i class="fa fa-user"></i></a>
                                                    <?php 
                                                    if($tampil['id']==$_SESSION['id'] && $_SESSION['is_admin']==0) { ?>
                                                        <a href="<?= strtolower($slug); ?>-edit.php?id=<?= $tampil['id']; ?>" class="btn btn-xs blue">Edit<i class="fa fa-edit"></i></a>
                                                    <?php } else { 
                                                        if($_SESSION['is_admin']==1) { ?>
                                                            <a href="<?= strtolower($slug); ?>-edit.php?id=<?= $tampil['id']; ?>" class="btn btn-xs blue">Edit<i class="fa fa-edit"></i></a>
                                                        <?php } else { ?>
                                                    <a href="" class="btn btn-xs blue disabled">Edit<i class="fa fa-edit"></i></a>
                                                    <?php } } ?>
                                                    <?php
                                                    if($_SESSION['is_admin']==1) { ?>
                                                        <a onclick="javascript:return confirm('Yakin ingin hapus?');" href="lib/<?= strtolower($slug); ?>-hapus.php?id=<?=$tampil['id']; ?>" class="btn btn-xs red">Hapus<i class="fa fa-trash-o"></i></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } }?>
                                        </tbody>
                                    </table>
                                    <?php } } ?>
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