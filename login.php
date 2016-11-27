<!DOCTYPE html>
<?php
include 'config.php';
$kueri      = mysqli_query($conn,"SELECT * FROM perusahaan");
$tampil     = mysqli_fetch_array($kueri);
?>
<html lang="en">
    <head>
        <title>Maingames    </title>
        <?php include 'header-login.php'; ?>
    <body class=" login">
        <div class="logo">
            <a href="login.php">
                <img src="assets/mgp.jpg" width="158" alt="logo" class="logo-default" />
            </a>
        </div>
        <div class="content">
            <form class="login-form" action="auth.php" method="post">
                <h3 class="form-title">Masuk</h3>
                <?php
                error_reporting(0);
                if($_GET['act']=="fail") { ?>
                <div class="alert alert-danger">
                    <strong>Maaf,</strong> Email / Password salah.
                </div>
                <?php } ?>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="username" /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                </div>
                <div class="form-group">
                    <div class="form-actions">
                        <button type="submit" class="btn green pull-right"> Masuk </button>
                    </div>
                <br/>
                </div>
            </form>
            <form class="forget-form" action="index.html" method="post">
                <h3>Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn grey-salsa btn-outline"> Back </button>
                    <button type="submit" class="btn green pull-right"> Submit </button>
                </div>
            </form>

        <?php include 'js-login.php'; ?>
    </body>
</html>