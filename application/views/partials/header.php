<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!$this->session->userdata['user']){
    $add = base_url('index.php/Login_c/index');
    header('Location:'.$add);

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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">

    <!-- link Sweet Alerts -->
<!--    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->

    <script type="text/javascript"> var baseUrl = "<?php echo base_url(); ?>" </script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/sweetAlerts.js"></script>
<!--    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->


    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/jquery/jquery.min.js"></script>
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->

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
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo base_url('Home_c/index')?>" class="brand-link">
            <img src="<?php echo base_url(); ?>assets/images/logo.png"
                 alt="Logo"
                 class="brand-image img-circle elevation-3"
                 style="width: 50px;">
            <span class="brand-text font-weight-light" style="font-size: 14px;">ShanMart Holding</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <!-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
                    <img src="<?php echo base_url(); ?>assets/images/user1-128x128.jpg"
                         class="img-size-50 img-circle mr-3">

                </div>
                <div class="info">
                    <a href="#" class="d-block">Dhanushka</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="../../index.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v1</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('User_c/index'); ?>"> <i class="nav-icon fas fa-user"></i><p>Manage Users</p></a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('Admin_c/index'); ?>"> <i class="nav-icon fas fa-users-cog"></i><p>Admin</p></a></li>

                    <li class="nav-item"> <a  style="background-color: #0c525d;margin-top: 25px!important;" class="nav-link" href="<?php echo base_url('Login_c/logOut'); ?>"> <i class="nav-icon fas fa-sign-out-alt"></i><p>Log Out</p></a></li>

                    <div style="display: block;margin: 25px auto 0 auto;">

<!--                    <li class="nav-item"><a href="--><?php //echo base_url('Login_c/logOut'); ?><!--" class="nav-item btn btn-primary btn-flat btn-sm"><span class="fas fa-sign-out-alt"></span>Log Out</a></li>-->

                    </div>
                </ul>
            </nav>
            <!-- End sidebar-menu -->
        </div>
        <!-- End sidebar -->
    </aside>