<?php
require 'config.php';
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['nama']) && empty($_SESSION['is_admin'])) {
	header('location:login.php');
}
$nav		= "Transaksi";
$page 		= "Permintaan Klaim";
$slug       = "permintaan-klaim";
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
                                            <span style="right: 36px;position: absolute;top: 15px;display: none"><a href="<?= strtolower($slug); ?>-tambah.php">
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
                                                    <th class="text-center" width="6%">Nama</th>
                                                    <th class="text-center" width="7%">Subjek</th>
                                                    <th class="text-center" width="3%">Jumlah</th>
                                                    <th class="text-center" width="7%">Metode Bayar</th>
                                                    <th class="text-center" width="4%">Bukti</th>
                                                    <th class="text-center" width="6%">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no         = 0;
                                            $kueri      = mysqli_query($conn,"
                                                          SELECT * FROM user
                                                          JOIN klaim
                                                          ON user.id = klaim.user_id
                                                          WHERE klaim.status = 1
                                                          ");
                                            $cekdata    = mysqli_num_rows($kueri);
                                            if($cekdata == 0) { ?>
                                                <tr>
                                                    <td align="center" colspan="7">Belum ada data.</td>
                                                </tr>
                                            <?php } else {
                                            while ($tampil = mysqli_fetch_array($kueri)) { $no++ ?>
                                                <tr>
                                                    <td class="text-center"><?= $no; ?></td>
                                                    <td class="text-center"><strong><?= $tampil['nama']; ?></strong></td>
                                                    <td class="text-center"><?= $tampil['subjek']; ?></td>
                                                    <td class="text-center"><?= "Rp ".number_format($tampil['jumlah']).",-"; ?></td>
                                                    <td class="text-center"><?= $tampil['metode_pembayaran']; ?></td>
                                                    <td class="text-center"><a target="_blank" href="assets/klaim/<?= $tampil['bukti_pembelian']; ?>">Unduh</a></td>
                                                    <td align="center">
                                                        <a onclick="javascript:return confirm('Terima Klaim ini?');" href="lib/<?= strtolower($slug); ?>-terima.php?id=<?=$tampil['klaim_id']; ?>" class="btn btn-xs blue <?= $status; ?>">Terima<i class="fa fa-check"></i></a>
                                                        <a onclick="javascript:return confirm('Tolak Klaim ini?');" href="lib/<?= strtolower($slug); ?>-tolak.php?id=<?=$tampil['klaim_id']; ?>" class="btn btn-xs red <?= $status; ?>">Tolak<i class="fa fa-close"></i></a>
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