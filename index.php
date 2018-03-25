<?php
ob_start();
include "template/head.php";
include 'Database/User2.php';
@$btnLogin = $_POST['login'];
@$email = $_POST['email'];
@$password = $_POST['password'];
//$permission=$_SESSION['role'];
if (isset($btnLogin)) {
    $user = new User2();
    $login = $user->login($email, $password);
}
ob_end_flush();
?>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper">
    <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <?php
            if (isset($_SESSION['error'])) {
                ?>
                <div class="card-block">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Hello There!</strong><br>
                        <?php echo $_SESSION['error']; ?>.
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="card-block">
                <form class="form-horizontal form-material" id="loginform" action=""
                      method="post">
                    <h3 class="box-title m-b-20 text-center text-success"><i class="fa fa-user"></i>&nbsp;Sign In to
                        Your Account</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="email" required=""
                                   placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required=""
                                   placeholder="Password"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div>
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i
                                        class="fa fa-lock m-r-5"></i> Forgot pwd?</a></div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-success btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit" name="login">
                                <span class="fa fa-sign-in"></span>&nbsp;
                                Log In
                            </button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Don't have an account? <a href="register.php" class="text-info m-l-5"><b>Sign
                                        Up</b></a></p>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" id="recoverform" action="home_page.php">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email"></div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit">Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>

</section>

<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<?php
include "template/without_foot.php";
?>

