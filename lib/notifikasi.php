<!-- INFORMASI SUKSES / GAGAL -->
<?php 
error_reporting(0);
$act    = $_GET['act'];
if($act == "sukses") { ?>
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <strong>Berhasil!</strong> Semua berjalan dengan sempurna.
    </div>
<?php } elseif($act == "gagal") { ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <strong>Gagal!</strong> Pasti ada sesuatu yang salah.
    </div>
<?php } ?>
<!-- INFORMASI SUKSES / GAGAL -->