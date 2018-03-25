<?php
ob_start();
include "template/head.php";
include 'Database/User2.php';
if (isset($_POST['sign_up'])){
    @$name = $_POST['name'];
    @$email = $_POST['email'];
    @$phone = $_POST['phone_no'];
    @$role = $_POST['role'];
    if($role == "")
    {
        $role = 'user';
    }
    @$password = $_POST['password'];
    @$confirm_password=$_POST['confirm_password'];
    $user=new User2();
    $register=$user->user_register($name,$email,$phone,$role,$password,$confirm_password);
}
@$permission=$_SESSION['role'];
//@$state = $_GET['state'];
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
    <section id="wrapper" class="">
        <div class="login-register login-sidebar"
             style="background-image:url(assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <?php

                if (isset($_SESSION['error'])) {
                    ?>
                    <div class="card-block">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Hello There!</strong><br> <?php echo $_SESSION['error'];?>.
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="card-block">
                    <form class="form-horizontal form-material" id="loginform" action="" method="post">
                        <a href="" class="text-center db mb-3">
                            <img src="assets/images/logo-icon.png" alt="Home" /><br/>
                            <img src="assets/images/my-logo-text.png" alt="Home" />
                        </a>
                        <h2 class="box-title m-b-20 text-center text-success"><i class="fa fa-user-plus"></i>&nbsp;User
                            Registration</h2>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Name" name="name">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" required="" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Phone" name="phone_no">
                            </div>
                        </div>
                        <?php
                        if($permission == 'admin'){
                            ?>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <select class="form-control" name="role">
                                        <option selected disabled>Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="manager">Manager</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" placeholder="Password"
                                       name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" placeholder="Confirm Password"
                                       name="confirm_password">
                            </div>
                        </div>


                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-success btn-lg btn-block text-uppercase waves-effect waves-light"
                                        type="submit" name="sign_up">Sign Up
                                </button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <p>Already have an account?
                                    <a href="index.php" class="text-info m-l-5">
                                        <b>Sign In</b>
                                    </a>
                                </p>
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