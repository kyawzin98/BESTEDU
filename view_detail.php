<?php
ob_start();
include "template/head.php";
include "template/navbar.php";
include "template/left-aside.php";
include "Database/User.php";
$id = $_GET['id'];
$myData = new User();
$data = $myData->retrieveData($id);
ob_end_flush();
?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Bread crumb and right sidebar toggle -->
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-tdemecolor m-b-0 m-t-0">Dashboard</h3>
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
                        <h3><?php echo $data['name'];?>'s Detail</h3>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <td class="text-success">ID</td>
                                    <td><?php echo $data['id']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-success">Name</td>
                                    <td><?php echo $data['name']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-success">Email</td>
                                    <td><?php echo $data['email']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-success">Phone</td>
                                    <td><?php echo $data['phone']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-success">Role</td>
                                    <td><?php echo $data['role']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-success">Password</td>
                                    <td><?php echo $data['password']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <h3>
                            <a href="home_page.php" class="btn btn-success" type="button">
                                <span class="fa fa-arrow-left"></span>
                                Back to HomePage
                            </a>
                        </h3>
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
    include "template/foot.php"
    ?>
