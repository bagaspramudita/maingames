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