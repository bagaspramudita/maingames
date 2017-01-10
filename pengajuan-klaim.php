<?php
require 'config.php';
session_start();
if(empty($_SESSION['id']) && empty($_SESSION['nama']) && empty($_SESSION['is_admin'])) {
	header('location:login.php');
}
$nav		= "Transaksi";
$page 		= "Pengajuan Klaim";
$slug       = "pengajuan-klaim";
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
                                                    <th class="text-center" width="6%">Nama</th>
                                                    <th class="text-center" width="7%">Subjek</th>
                                                    <th class="text-center" width="3%">Jumlah</th>
                                                    <th class="text-center" width="7%">Metode Bayar</th>
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
                                                          JOIN klaim
                                                          ON user.id = klaim.user_id
                                                          WHERE klaim.user_id = '".$_SESSION['id']."'
                                                          ORDER BY klaim.klaim_id DESC
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
                                                    <td class="text-center"><?= $tampil['subjek']; ?></td>
                                                    <td class="text-center"><?= "Rp ".number_format($tampil['jumlah']).",-"; ?></td>
                                                    <td class="text-center"><?= $tampil['metode_pembayaran']; ?></td>
                                                    <td class="text-center">
                                                        <?php
                                                            if($tampil['status']==1) {
                                                                echo "<button class='btn btn-xs warning popovers' data-container='body' data-trigger='hover' data-placement='bottom' data-content='Sedang menunggu persetujuan dari HRD.' data-original-title='Status Klaim'>Pending</button>";
                                                                $status = "";
                                                            } elseif($tampil['status']==2) {
                                                                echo "<button class='btn btn-xs blue popovers' data-container='body' data-trigger='hover' data-placement='bottom' data-content='Klaim Anda telah diterima.' data-original-title='Status Klaim'>Diterima</button>";
                                                                $status = "disabled";
                                                            } elseif($tampil['status']==3) {
                                                                echo "<button class='btn btn-xs red popovers' data-container='body' data-trigger='hover' data-placement='bottom' data-content='Klaim Anda Ditolak!' data-original-title='Status Klaim'>Ditolak</button>";
                                                                $status = "disabled";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td align="center">
                                                        <a onclick="javascript:return confirm('Yakin ingin batalkan klaim ini?');" href="lib/<?= strtolower($slug); ?>-hapus.php?id=<?=$tampil['klaim_id']; ?>" class="btn btn-xs red <?= $status; ?>">Batalkan<i class="fa fa-close"></i></a>
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