<?php
require 'config.php';
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['nama']) && empty($_SESSION['is_admin'])) {
	header('location:login.php');
}
$nav		= "Transaksi";
$page 		= "Pengajuan Cuti";
$slug       = "pengajuan-cuti";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?= $page; ?></title>
        
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
                                            <span class="caption-subject font-green-sharp bold uppercase"><?= $page; ?></span>
                                            <span style="right: 36px;position: absolute;top: 15px;"><a href="<?= strtolower($slug); ?>-tambah.php">
                                                <button type="button" class="btn btn-default"><i class="fa fa-plus"></i>Tambah Baru</button>
                                            </a></span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                    <?php include 'lib/notifikasi.php'; ?>
                                        <table class="table table-striped table-bordered table-hover" id="tabeldata">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="1%">No</th>
                                                    <th class="text-center" width="8%">Nama Pegawai</th>
                                                    <th class="text-center" width="7%">Mulai Cuti</th>
                                                    <th class="text-center" width="3%">Durasi Cuti</th>
                                                    <th class="text-center" width="7%">Berakhir Cuti</th>
                                                    <th class="text-center" width="4%">Status</th>
                                                    <th class="text-center" width="6%">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $idus       = $_SESSION['id'];
                                            $no         = 0;
                                            $kueri      = mysqli_query($conn,"
                                                          SELECT * FROM user
                                                          JOIN cuti
                                                          ON user.id = cuti.user_id
                                                          JOIN log_cuti
                                                          ON user.id = log_cuti.user_id
                                                          WHERE user.id = '$idus'
                                                          ORDER BY log_cuti.log_id
                                                          DESC
                                                          ");
                                            $cekdata    = mysqli_num_rows($kueri);
                                            if($cekdata == 0) { ?>
                                                <tr>
                                                    <td align="center" colspan="7">Belum Ada Data. &nbsp;
                                                        <a href="<?= strtolower($slug); ?>-tambah.php" class="btn blue">
                                                        <i class="fa fa-plus"></i> Tambahkan</a>
                                                        </td>
                                                </tr>
                                            <?php } else {
                                            while ($tampil = mysqli_fetch_array($kueri)) { $no++ ?>
                                                <tr>
                                                    <td class="text-center"><?= $no; ?></td>
                                                    <td class="text-center"><strong><?= $tampil['nama']; ?></strong></td>
                                                    <td class="text-center"><?= $tampil['tanggal_mulai']." ".$tampil['bulan_mulai']." ".$tampil['tahun_mulai']; ?></td>
                                                    <td class="text-center"><?= $tampil['durasi']." hari"; ?></td>
                                                    <td class="text-center"><?= $tampil['tanggal_berakhir']." ".$tampil['bulan_berakhir']." ".$tampil['tahun_berakhir']; ?></td>
                                                    <td class="text-center">
                                                        <?php
                                                            if($tampil['status']==0) {
                                                                echo "<button class='btn btn-xs warning popovers' data-container='body' data-trigger='hover' data-placement='bottom' data-content='Sedang menunggu persetujuan dari atasan.' data-original-title='Status Cuti'>Pending</button>";
                                                                $status = "";
                                                            } elseif($tampil['status']==1) {
                                                                echo "<button class='btn btn-xs blue popovers' data-container='body' data-trigger='hover' data-placement='bottom' data-content='Cuti Anda telah diterima.' data-original-title='Status Cuti'>Diterima</button>";
                                                                $status = "disabled";
                                                            } elseif($tampil['status']==2) {
                                                                echo "<button class='btn btn-xs red popovers' data-container='body' data-trigger='hover' data-placement='bottom' data-content='Cuti Anda Ditolak!' data-original-title='Status Cuti'>Ditolak</button>";
                                                                $status = "disabled";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td align="center">
                                                        <a onclick="javascript:return confirm('Yakin ingin batalkan cuti ini?');" href="lib/<?= strtolower($slug); ?>-hapus.php?id=<?=$tampil['log_id']; ?>" class="btn btn-xs red <?= $status; ?>">Batalkan<i class="fa fa-close"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } }?>
                                            </tbody>
                                        </table>
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
        <script>
        $(document).ready(function() {
            $('#tabeldata').DataTable();
        } );
        </script>
    </body>
</html>