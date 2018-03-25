<?php
ob_start();
include "template/head.php";
include "template/navbar.php";
include "template/left-aside.php";
include "Database/User.php";
$id = $_GET['id'];
@$name = $_POST['name'];
@$email = $_POST['email'];
@$phone = $_POST['phone_no'];
@$role = $_POST['role'];
@$password = $_POST['password'];
//$user = new User();
//$data = $user->retrieveData($id);
//if (isset($_POST['update'])) {
//    $smg = 'Hello There,';
//    $res = $user->myEdit($id, $name, $email, $phone, $role, $password);
//    if ($res) {
//        $smg .= "Record is updated";
//    } else {
//        $smg .= "Can't Not Update Record";
//    }
//}
ob_end_flush();
?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Bread crumb and right sidebar toggle -->
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <button class="btn pull-right hidden-sm-down btn-success">
                    <i class="mdi mdi-plus-circle"></i> Create
                </button>
                <div class="dropdown pull-right m-r-10 hidden-sm-down">
                    <button class="btn btn-secondary dropdown-toggle" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        January 2017
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">February 2017</a>
                        <a class="dropdown-item" href="#">March 2017</a>
                        <a class="dropdown-item" href="#">April 2017</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bread crumb and right sidebar toggle -->

        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-block">
                        <form class="form-horizontal form-material" id="loginform" action="" method="post">
                            <h2 class="box-title m-b-20 text-center text-success"><i class="fa fa-user-circle-o"></i>&nbsp;
                                Update User</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="text" required="" placeholder="Name"
                                                   name="name" value="<?php echo $data['name']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="email" required="" placeholder="Email"
                                                   name="email" value="<?php echo $data['email']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="text" required="" placeholder="Phone"
                                                   name="phone_no" value="<?php echo $data['phone']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <select class="form-control" name="role">
                                                <option selected disabled>Select Role</option>
                                                <?php
                                                    if($data['role'] == 'admin'):
                                                ?>
                                                        <option value="admin" selected>Admin</option>
                                                        <option value="manager">Manager</option>
                                                        <option value="user">User</option>

                                                <?php elseif($data['role'] == 'manager'):
                                                    ?>
                                                    <option value="admin" >Admin</option>
                                                    <option value="manager" selected>Manager</option>
                                                    <option value="user">User</option>
                                                <?php
                                                else:
                                                    ?>
                                                    <option value="admin">Admin</option>
                                                    <option value="manager">Manager</option>
                                                    <option value="user" selected>User</option>
                                                <?php endif; ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="password" required=""
                                                   placeholder="Password"
                                                   name="password" value="<?php echo $data['password']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="password" required=""
                                                   placeholder="Confirm Password"
                                                   name="confirm_password" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center m-t-20">
                                <div class="col-xs-12">
                                    <a href="home_page.php"
                                       class="btn btn-primary waves-effect waves-light text-uppercase pull-left"
                                       role="button"> <span class="fa fa-arrow-left"></span> &nbsp;Back
                                    </a>
                                </div>
                                <div class="col-xs-12">
                                    <button class="btn btn-success text-uppercase waves-effect waves-light pull-right"
                                            type="submit" name="update">Update
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>
                    <?php
                    if (isset($smg)) {

                        ?>
                        <div class="card-block">
                            <div class="alert alert-success">
                                <p><?php echo $smg; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
        <?php
        include 'template/right-aside.php';
        ?>
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <?php
    include "template/foot.php";
    ?>
