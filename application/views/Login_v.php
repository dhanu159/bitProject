<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 9/29/2019
 * Time: 5:59 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/layout.css">

    <script type="text/javascript" src="<?php echo base_url();?>assets/jquery/jquery.min.js"></script>


</head>
<body>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>ShanMart</b> Holdings</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

<!--            <form action="--><?php //echo base_url();?><!--index.php/Logic_c/userLogin" method="post">-->

            <?php echo validation_errors('<div class="alert alert-danger ErrMsg">','</div>');?>
            <?php echo form_open('Login_c/userLogin')?>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="User Name - Email" name="email">
                    <div class="input-group-append input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="pwd">
                    <div class="input-group-append input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            <?php echo form_close();?>
<!--            </form>-->
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
<script>
    $(document).ready(function(){
            $(".ErrMsg").fadeOut(8000,'swing');
    });
</script>
</body>
</html>

