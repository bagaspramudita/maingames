<?php
if($_SESSION['is_admin']==1) {
    include 'menu-admin-admin.php';
} elseif ($_SESSION['is_admin']==0) {
    include 'menu-admin-user.php';
}
?>