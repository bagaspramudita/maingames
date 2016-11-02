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
            <li class="nav-item <?php echo ($nav == "Data Master" ? 'active open' : ''); ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-bank"></i>
                    <span class="title">Data Master</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li style="border-bottom:1px solid #3d4957;" class="nav-item <?php echo ($page == "Lowongan" ? 'active open' : ''); ?>">
                        <a style="margin-bottom: 8px" href="lowongan.php" class="nav-link ">
                            <span class="title">Lowongan Kerja</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($page == "Agama" ? 'active open' : ''); ?>">
                        <a href="agama.php" class="nav-link ">
                            <span class="title">Agama</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($page == "Bentuk Wajah" ? 'active open' : ''); ?>">
                        <a href="bentuk-wajah.php" class="nav-link ">
                            <span class="title">Bentuk Wajah</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($page == "Jabatan" ? 'active open' : ''); ?>">
                        <a href="jabatan.php" class="nav-link ">
                            <span class="title">Jabatan</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($page == "Jenis Rambut" ? 'active open' : ''); ?>">
                        <a href="jenis-rambut.php" class="nav-link ">
                            <span class="title">Jenis Rambut</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($page == "Status Pegawai" ? 'active open' : ''); ?>">
                        <a href="status-pegawai.php" class="nav-link ">
                            <span class="title">Status Pegawai</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($page == "Perusahaan" ? 'active open' : ''); ?>">
                        <a href="perusahaan.php" class="nav-link ">
                            <span class="title">Perusahaan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php echo ($nav == "Data Pegawai" ? 'active open' : ''); ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">Data Pegawai</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo ($page == "Pegawai" ? 'active open' : ''); ?>">
                        <a href="pegawai.php" class="nav-link ">
                            <span class="title">Data Pegawai</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($page == "Pernikahan" ? 'active open' : ''); ?>">
                        <a href="pernikahan.php" class="nav-link ">
                            <span class="title">Data Pernikahan</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($page == "Cuti" ? 'active open' : ''); ?>">
                        <a href="cuti.php" class="nav-link ">
                            <span class="title">Data Cuti</span>
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
                    <li class="nav-item <?php echo ($page == "Permintaan Cuti" ? 'active open' : ''); ?>">
                        <a href="permintaan-cuti.php" class="nav-link ">
                            <span class="title">Permintaan Cuti</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($page == "Permintaan Klaim" ? 'active open' : ''); ?>">
                        <a href="permintaan-klaim.php" class="nav-link ">
                            <span class="title">Permintaan Klaim</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>  