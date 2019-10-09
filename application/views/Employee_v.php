<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/30/2019
 * Time: 8:56 PM
 */
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employee Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- End container-fluid -->
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Employee</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <!--                    <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip"-->
                    <!--                            title="Remove">-->
                    <!--                        <i class="fas fa-times"></i></button>-->
                </div>
            </div>
            <div class="card-body">
                <!--                Content-->
                <?php if ($this->session->flashdata('flashError')) { ?>
                    <p class='alert alert-danger ErrMsg flashMsg flashError'> <?= $this->session->flashdata('flashError') ?> </p>
                <?php } ?>

<!--                --><?php //if ($this->session->flashdata('flashError')){
//                    echo $this->session->flashdata('flashError'[staus]);
//                }?>

                <?php if($this->session->flashdata('msg')){?>
                    <p class='alert alert-primary ErrMsg'> <?=$this->session->flashdata('msg')?> </p>
                <?php }?>


                <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
                <?php echo form_open('Employee_c/saveEmployee_c'); ?>
                <div class="row form-group">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">First Name :</label>
                        <input class="form-control flat" type="text" name="fName">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Middle Name :</label>
                        <input class="form-control" type="text" name="mName">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Last Name :</label>
                        <input class="form-control" type="text" name="lName">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">NIC No :</label>
                        <input class="form-control" type="text" name="nicNo">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Driving License No :</label>
                        <input class="form-control" type="text" name="drivingLicenseNo">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Address Line 1 :</label>
                        <input class="form-control" type="text" name="addL1">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Address Line 2 :</label>
                        <input class="form-control" type="text" name="addL2">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Address Line 3 :</label>
                        <input class="form-control" type="text" name="addL3">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Contact No Mobile :</label>
                        <input class="form-control" type="text" name="contactNumberM" placeholder="0711234567">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Contact No Home :</label>
                        <input class="form-control" type="text" name="contactNumberH" placeholder="0113569745">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Gender :&nbsp;&nbsp;&nbsp; </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Joined Date :</label>
                        <input type="date" class="form-control datepicker" name="joinDate">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Employee Image :</label>
                        <input type="file" class="form-control-file" name="empImage">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Description :</label>
                        <textarea name="description" id="" cols="20" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <input type="submit" class="btn btn-success btn-sm btn-flat">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div><!-- End card-body -->
        </div><!-- End card -->
    </section><!-- End content -->
</div><!-- End content-wrapper -->

