<?php
ob_start();
include 'Database/Db.php';
include 'Database/User.php';
include "template/head.php";
include "template/navbar.php";
include "template/left-aside.php";

if ($_SESSION['login'] != true) {
    header('location:index.php');
}
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
                <button class="btn pull-right hidden-sm-down btn-success" data-toggle="modal" data-target="#myuser">
                    <i class="mdi mdi-plus-circle"></i> Create
                </button>
                <!--                <a href="register.php?state=true" class="btn pull-right hidden-sm-down btn-success">-->
                <!--                    <i class="mdi mdi-plus-circle"></i> Create-->
                <!--                </a>-->
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
                                            <form>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="text-success">User
                                                        Name</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                           placeholder="Enter Username">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="text-success">Email
                                                        address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                           placeholder="Enter email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1"
                                                           class="text-success">Password</label>
                                                    <input type="password" class="form-control"
                                                           id="exampleInputPassword1" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1"
                                                           class="text-success">Password</label>
                                                    <input type="password" class="form-control"
                                                           id="exampleInputPassword1" placeholder="Confirm Password">
                                                </div>
                                                <div class="form-group">
                                                    <div class="checkbox checkbox-success">
                                                        <input id="checkbox1" type="checkbox">
                                                        <label for="checkbox1"> Remember me </label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect waves-light m-r-10"
                                        data-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                                    Submit
                                </button>
                            </div>
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
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Password</th>
                                    <th colspan="3" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "Select * From users";
                                $datas = $db->query($sql);
                                $rows = $datas->num_rows;
                                if ($rows !== 0) {
                                    foreach ($datas as $data) {
                                        ?>
                                        <tr>
                                            <td><?php echo $data['id']; ?></td>
                                            <td><?php echo $data['name']; ?></td>
                                            <td><?php echo $data['email']; ?></td>
                                            <td><?php echo $data['phone']; ?></td>
                                            <td><?php echo $data['role']; ?></td>
                                            <td><?php echo $data['password']; ?></td>
                                            <td class="">
                                                <?php
                                                if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager') {
                                                    ?>
                                                    <a name="view_detail" id="" class="btn btn-info d-inline-block"
                                                       href="view_detail.php?id=<?php echo $data['id']; ?>"
                                                       role="button">
                                                        <i class=" fa fa-user"></i>
                                                    </a>
                                                    <?php
                                                } else {
                                                    if ($data['id'] == $_SESSION['id']) {
                                                        ?>
                                                        <a name="view_detail" id="" class="btn btn-info d-inline-block"
                                                           href="view_detail.php?id=<?php echo $data['id']; ?>"
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
                                                if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager') {
                                                    ?>
                                                    <a name="edit" id="" class="btn btn-primary d-inline-block"
                                                       href="edit.php?id=<?php echo $data['id']; ?>" role="button">
                                                        <i class=" fa fa-edit"></i>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (@$_SESSION['role'] == 'admin') {
                                                    ?>
                                                    <a name="delete" id="" class="btn btn-danger d-inline-block"
                                                       href="delete.php?id=<?php echo $data['id'];?>" role="button">
                                                        <i class=" fa fa-trash-o"></i>
                                                    </a>
<!--                                                    <button name="delete" id="delete" class="btn btn-danger d-inline-block" type="button">-->
<!--                                                        <i class=" fa fa-trash-o"></i>-->
<!--                                                    </button>-->
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
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
