<?php
ob_start();
include 'Database/User2.php';
include "template/head.php";
include "template/navbar.php";
include "template/left-aside.php";

//@$state = $_GET['state'];
@$permission = $_SESSION['role'];
if ($_SESSION['login'] != true) {
    header('location:index.php');
}
$user2 = new User2();
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
                <!--                <button class="btn pull-right hidden-sm-down btn-success" data-toggle="modal" data-target="#myuser">-->
                <!--                    <i class="mdi mdi-plus-circle"></i> Create-->
                <!--                </button>-->
                <?php
                if ($_SESSION['role'] == 'admin') {
                    ?>
                    <button type="button" class="btn pull-right hidden-sm-down btn-success"
                            data-toggle="modal"
                            data-target="#myuser">
                        <i class="mdi mdi-plus-circle"></i> Add New User
                    </button>
                    <?php
                }
                ?>

                <!-- Modal -->
                <div class="modal fade" id="myuser" tabindex="-1" role="dialog"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <h3 class="box-title m-b-0"><span class="fa fa-user-plus"></span> User Registration
                                    </h3>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card card-block">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <form class="form-horizontal form-material" id="loginform" action=""
                                                  method="post">
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <input class="form-control" type="text" required=""
                                                               placeholder="Name" name="name">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="col-xs-12">
                                                        <input class="form-control" type="email" required=""
                                                               placeholder="Email" name="email">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="col-xs-12">
                                                        <input class="form-control" type="text" required=""
                                                               placeholder="Phone" name="phone_no">
                                                    </div>
                                                </div>
                                                <?php
                                                if ($_SESSION['role'] == 'admin') {
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
                                                        <input class="form-control" type="password" required=""
                                                               placeholder="Password"
                                                               name="password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <input class="form-control" type="password" required=""
                                                               placeholder="Confirm Password"
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
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (isset($_POST['sign_up'])) {
                                @$name = $_POST['name'];
                                @$email = $_POST['email'];
                                @$phone = $_POST['phone_no'];
                                @$role = $_POST['role'];
                                @$password = $_POST['password'];
                                @$confirm_password = $_POST['confirm_password'];
                                $reg = $user2->user_register($name, $email, $phone, $role, $password, $confirm_password);
                            }
                            if (isset($_SESSION['error'])) {
                                ?>
                                <div class="modal-footer">
                                    <div class="alert alert-heading">
                                        <p>
                                            <?php
                                            echo $_SESSION['error'];
                                            ?>
                                        </p>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="dropdown pull-right m-r-10 hidden-sm-down">
                    <button class="btn btn-outline-success dropdown-toggle waves-effect waves-light" type="button"
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
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead class="">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th colspan="3" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $results = $user2->retrieve_datas('users');
                                $res = $results->fetch_assoc();
                                $rows = $results->num_rows;
                                if ($rows !== 0) {
                                    foreach ($results as $result) {
                                        ?>
                                        <tr>
                                            <td><?php echo $result['id']; ?></td>
                                            <td><?php echo $result['name']; ?></td>
                                            <td><?php echo $result['email']; ?></td>
                                            <td>
                                                <?php
                                                if ($permission == 'admin' || $permission == 'manager') {
                                                    ?>
                                                    <a name="view_detail" id="" class="btn btn-info d-inline-block"
                                                       href="view_detail.php?id=<?php echo $result['id']; ?>"
                                                       role="button">
                                                        <i class=" fa fa-user"></i>
                                                    </a>
                                                    <?php
                                                } else {
                                                    if ($result['id'] == $_SESSION['id']) {
                                                        ?>
                                                        <a name="view_detail" id="" class="btn btn-info d-inline-block"
                                                           href="view_detail.php?id=<?php echo $result['id']; ?>"
                                                           role="button">
                                                            <i class=" fa fa-user"></i>
                                                        </a>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($permission == 'admin' || $permission == 'manager') {
                                                    ?>
                                                    <a name="edit" id="" class="btn btn-primary d-inline-block"
                                                       href="edit.php?id=<?php echo $result['id']; ?>" role="button">
                                                        <i class=" fa fa-edit"></i>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($permission == 'admin') {
                                                    ?>
                                                    <a name="delete" id="" class="btn btn-danger d-inline-block"
                                                       href="delete.php?id=<?php echo $result['id']; ?>" role="button">
                                                        <i class=" fa fa-trash-o"></i>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    $_SESSION['error'] = "Result not Found!";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
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

