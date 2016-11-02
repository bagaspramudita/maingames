<?php
// Kueri Cuti
$query              = mysqli_query($conn,"SELECT * FROM log_cuti
                                          WHERE status = 0
                                         ");
$hitung             = mysqli_num_rows($query);
// Kueri Klaim
$quera              = mysqli_query($conn,"SELECT * FROM klaim
                                          WHERE status = 1
                                         ");
$hitang             = mysqli_num_rows($quera);
// Perhitungan
$notifikasi         = $hitung + $hitang;
?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="heading">
                <h3 class="uppercase"><?= $tampil['nama_perusahaan']; ?></h3>
            </li>
            <li class="nav-item <?php echo ($page == "Dashboard" ? 'active open' : ''); ?>">
                <a href="index.php" class="nav-link nav-toggle">
                    <i class="fa fa-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item <?php echo ($nav == "Data Saya" ? 'active open' : ''); ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-user"></i>
                    <span class="title">Informasi Saya</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo ($page == "Profil" ? 'active open' : ''); ?>">
                        <a href="profil.php" class="nav-link ">
                            <span class="title">Profil Saya</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($page == "Rekening" ? 'active open' : ''); ?>">
                        <a href="rekening.php" class="nav-link ">
                            <span class="title">Rekening Saya</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($page == "Password" ? 'active open' : ''); ?>">
                        <a href="ganti-password.php" class="nav-link ">
                            <span class="title">Ganti Password</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php echo ($nav == "Transaksi" ? 'active open' : ''); ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-exchange"></i>
                    <span class="title">Transaksi <?= ($notifikasi >= 1 ? "<span style='float: right;margin-right: 25px' class='badge badge-danger'>".$notifikasi." </span>" : ""); ?></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo ($page == "Pengajuan Cuti" ? 'active open' : ''); ?>">
                        <a href="pengajuan-cuti.php" class="nav-link ">
                            <span class="title">Pengajuan Cuti</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($page == "Pengajuan Klaim" ? 'active open' : ''); ?>">
                        <a href="pengajuan-klaim.php" class="nav-link ">
                            <span class="title">Pengajuan Klaim</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>