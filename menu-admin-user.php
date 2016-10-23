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
                    <i class="fa fa-user"></i>
                    <span class="title">Informasi Saya</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo ($page == "Agama" ? 'active open' : ''); ?>">
                        <a href="agama.php" class="nav-link ">
                            <span class="title">Profil Saya</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($page == "Bentuk Wajah" ? 'active open' : ''); ?>">
                        <a href="bentuk-wajah.php" class="nav-link ">
                            <span class="title">Ganti Password</span>
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
                            <span class="title">Pegawai</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($page == "Pernikahan" ? 'active open' : ''); ?>">
                        <a href="pernikahan.php" class="nav-link ">
                            <span class="title">Pernikahan</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>  