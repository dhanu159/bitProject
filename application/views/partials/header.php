<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!$this->session->userdata['uRole']) {
    $add = base_url('index.php/Login_c/index');
    header('Location:' . $add);

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ShanMart Holdings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">


    <script type="text/javascript"> var baseUrl = "<?php echo base_url(); ?>" </script>


    <!-- link Sweet Alerts sweetalert2.github.io-->
<!--    <script type="text/javascript" src="--><?php //echo base_url(); ?><!--assets/js/sweetAlerts.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> -->


    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/jquery.min.js"></script>
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">


<!--    <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>-->
<!--    <script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>-->
    <script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/dataTables.responsive.min.js"></script>


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Site wrapper -->
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <li><p style="margin-top: 5%">Welcome! <?php echo $this->session->userdata['uName']?></p></li>&nbsp;&nbsp;&nbsp;
            <li><img src="<?php $img = $this->session->userdata['uImage']; echo base_url('uploads/'.$img); ?>" style="width: 40px; height: 40px;" class="img-circle" ></li>
        </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo base_url('Home_c/index') ?>" class="brand-link">
            <img src="<?php echo base_url(); ?>assets/images/LOGO.png"
                 alt="Logo"
                 class="brand-image img-circle elevation-3"
                 style="width: 50px;">
            <span class="brand-text font-weight-light navLabel" style="font-size: 14px;">ShanMart Holding</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->


            <div style="text-align: left">
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <?php if ($this->session->userdata['uRole'] == 'Admin') { ?>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users-cog"></i></i>
                                <p>Admin<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('ManageUsers_c/index'); ?>">
                                        &nbsp;&nbsp;<i class="nav-icon fas fa-user"></i>
                                        <p>Manage Users</p>
                                    </a>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        &nbsp;&nbsp;<i class="nav-icon fas fa-briefcase"></i></i>
                                        <p>Manage Job Types
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav-treeview">
                                        <li class="nav-item has-treeview">
                                            <a href="<?php echo base_url('ManageJobTypes_c') ?>" class="nav-link">
                                                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-plus-circle"></i></i>
                                                <p>Add Job Types</p>
                                            </a>
                                        </li>
                                    </ul>
                            </ul>
                        </li>
                    <?php } ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>Manage Employees<i class="right fas fa-angle-left"></i></p>
                        </a>
                    <ul class="nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="<?php echo base_url('Employee_c/index') ?>" class="nav-link">
                                &nbsp;&nbsp;<i class="nav-icon fas fa-plus-circle"></i></i>
                                <p>Add Employees</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="<?php echo base_url('Employee_c/viewEmployees') ?>" class="nav-link">
                                &nbsp;&nbsp;<i class="nav-icon fas fa-eye"></i></i>
                                <p>View Employees</p>
                            </a>
                        </li>
                    </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="<?php echo base_url('vehicle/index')?>" class="nav-link">
                            <i class="nav-icon fa fa-truck"></i>
                            <p>Manage Vehicles</p>
                        </a>
                    </li>



                    <li class="nav-item"><a style="background-color: #0c525d;margin-top: 25px!important;" class="nav-link" href="<?php echo base_url('Login_c/logOut'); ?>">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Log Out</p></a></li>
                </ul>
            </nav>
            <!-- End sidebar-menu -->
        </div>
        <!-- End sidebar -->
    </aside>
