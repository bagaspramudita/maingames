<?php
session_start();
session_destroy();
	unset($_SESSION['id']);
	unset($_SESSION['nama']);
	unset($_SESSION['is_admin']);
	header('location:../index.php');
?>