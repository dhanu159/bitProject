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
                        <li class="breadcrumb-item active">Add Employee</li>
                    </ol>
                </div>
            </div>
        </div><!-- End container-fluid -->
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php if (isset($intEmpID)) { echo 'Update Employee'; }else{  echo 'Add Employee'; }?></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <!--Content-->
                <?php if ($this->session->flashdata('flashError')) { ?>
                    <div class='alert alert-danger ErrMsg'>
                        <p><?= $this->session->flashdata('flashError') ?></p>

                    </div>
                <?php } ?>



                <?php if ($this->session->flashdata('flashSuccess')) { ?>
                    <p class='alert alert-success ErrMsg'><?= $this->session->flashdata('flashSuccess') ?></p>
                <?php } ?>
                <?php echo validation_errors('<div class="alert alert-danger ErrMsg">', '</div>') ?>

                <?php  echo form_open_multipart('Employee_c/saveEmployee_c');?>

                <div class="row form-group" style="padding: 10px;">

                    <?php if (isset($intEmpID)) { ?>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <label for="">EMP ID :</label>
                            <input class="form-control flat" type="text" name="empID" value="<?php echo $intEmpID;?>" readonly required>
                        </div>
                    <?php }?>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">First Name :</label>
                        <input class="form-control flat" type="text" name="fName" value="<?php if (isset($varEmpFname)) { echo $varEmpFname;}?>" required>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Middle Name :</label>
                        <input class="form-control" type="text" name="mName" value="<?php if (isset($varEmpMName)) { echo $varEmpMName;}?>" >
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Last Name :</label>
                        <input class="form-control" type="text" name="lName" value="<?php if (isset($varEmpLname)) { echo $varEmpLname;}?>">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">NIC No :</label>
                        <input class="form-control" type="text" name="nicNo" value="<?php if (isset($varEmpNIC)) { echo $varEmpNIC;}?>" required>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Designation</label>
                        <select name="designation" id="designation" class="form-control" value="<?php if (isset($jobCateogory_intJobCategoryID)) { echo $jobCateogory_intJobCategoryID;}?>">
                        </select>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Driving License No :</label>
                        <input class="form-control" type="text" name="drivingLicenseNo" value="<?php if (isset($varDrivingLisenceNo)) { echo $varDrivingLisenceNo;}?>">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Address Line 1 :</label>
                        <input class="form-control" type="text" name="addL1" value="<?php if (isset($varEmpAddL1)) { echo $varEmpAddL1;}?>" required>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Address Line 2 :</label>
                        <input class="form-control" type="text" name="addL2" value="<?php if (isset($varEmpAddL2)) { echo $varEmpAddL2;}?>">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Address Line 3 :</label>
                        <input class="form-control" type="text" name="addL3" value="<?php if (isset($varEmpAddL3)) { echo $varEmpAddL3;}?>">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Contact No Mobile :</label>
                        <input class="form-control" type="text" name="contactNumberM" placeholder="0711234567" value="<?php if (isset($varEmpContactNoM)) { echo $varEmpContactNoM;}?>" required>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Contact No Home :</label>
                        <input class="form-control" type="text" name="contactNumberH" placeholder="0113569745" value="<?php if (isset($varEmpContactNoH)) { echo $varEmpContactNoH;}?>">
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
                        <input type="date" class="form-control datepicker" name="joinDate" value="<?php if (isset($dateJoinedDate)) { echo $dateJoinedDate;}?>" required>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="">Employee Image :</label>
                        <!-- <input type="file" onchange="readURL(this);" class="form-control-file" name="empImage" size="20" id="empImage" required><img id="blah" src="#" alt="your image" /> -->

                        <input type="file" name="empImage" id="profile-img" <?php if (!isset($image)) { echo 'required';}?> >
                        <img src="<?php if (isset($image	)) { echo base_url('uploads/'.$image);}?>" id="profile-img-tag" width="150px" />
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                        <label for="">Description :</label>
                        <textarea name="description" id="" cols="20" rows="5" class="form-control" value="<?php if (isset($varDescription)) { echo $varDescription;}?>"></textarea>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                        <input type="submit" class="btn btn-success btn-sm btn-flat">
                    </div>
                </div>
                <?php echo form_close(); ?>
                <?php if (isset($jobCateogory_intJobCategoryID)) {?>
                    <input type="text" id="updateEmpJobDes" value="<?php echo $jobCateogory_intJobCategoryID;?>" hidden>
                <?php } ?>
            </div><!-- End card-body -->
        </div><!-- End card -->
    </section><!-- End content -->
    <script>
        $(function() {

            function changeDesignationAccoedingToUpdateSelection(){
                var updateEmpJobDes =  $('#updateEmpJobDes').val();
                $('#designation').val(updateEmpJobDes);
            }
            //start upload selected image form employee
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#profile-img-tag').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#profile-img").change(function() {
                readURL(this);
            });
            //end upload selected image form employee

            $(".ErrMsg").fadeOut(15000, 'swing');

            loadJobCategoryAndDesignation();

            function loadJobCategoryAndDesignation() {
                $.ajax({
                    type: 'ajax',
                    url: baseUrl + 'Employee_c/LoadJobCategoriesAndDesignations',
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var i;
                        var jobCategories = '';
                        var designations = '';
                        for (i = 0; data.length > i; i++) {
                            designations += '<option value="' + data[i].intJobCategoryID + '">' + data[i].varDesignation + '</option>';
                        }
                        $('#designation').html(designations);
                        if($('#updateEmpJobDes').val()!=null){
                            changeDesignationAccoedingToUpdateSelection();
                        }

                    },
                    error: function() {
                        alert('internal error could not load job categories designations!')
                    }
                });
            }
        });
    </script>
</div><!-- End content-wrapper -->