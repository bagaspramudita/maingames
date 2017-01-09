<?php
$kueri      = mysqli_query($conn,"SELECT * FROM perusahaan");
$tampil     = mysqli_fetch_array($kueri);
?>
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="index.php">
                <img src="assets/<?= $tampil['logo']; ?>" width="158" height="30" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-user">
                    <?php
                    $iduser         = $_SESSION['id'];
                    $kueru          = mysqli_query($conn,"SELECT * FROM user WHERE id = '$iduser'");
                    $tampilu        = mysqli_fetch_array($kueru);
                    ?>
                    <a style="cursor: default;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img style="width: 29px" class="img-circle" src="assets/foto_pegawai/<?= $tampilu['foto']; ?>" />
                        <span class="username username-hide-on-mobile">&nbsp;&nbsp;<?= $tampilu['nama']; ?> </span>
                    </a>    
                </li>
                <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="lib/logout.php" class="dropdown-toggle">
                        <i class="icon-logout"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>