<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 11/18/2019
 * Time: 7:06 PM
 */
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Manage Vehicles</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- End container-fluid -->
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Manage Vehicle Details</h3>
            </div>
            <div class="card-body">
                <button class="btn btn-success btn-sm btn-flat" data-toggle="modal" id="viewAddVehicleModel" style="margin-bottom: 20px;">Add</button>
                <div>
                    <table class="table display responsive nowrap" id="VehicleDataTable">
                        <thead>
                        <tr>
                            <th>Vehicle Number</th>
                            <th>Fuel Capacity</th>
                            <th>Description</th>
                            <th>Vehicle Type</th>
                            <th>Driver Name</th>
                            <?php if ($this->session->userdata['uRole']=='Admin'){ ?>
                                <th>Action</th>
                            <?php }?>
                        </tr>
                        </thead>
                        <tbody id="showData">

                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="addVehicle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <!--  addUser Modal -->
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Vehicle Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="#" class="form sidebar-form" id="vehicleForm">
                                    <div class="form-group">
                                        <input type="hidden" id="vid">
                                        <div>
                                            <label>Vehicle No</label>
                                            <div class="col-lg-12">
                                                <input type="text"  class="form-control flat" id="vNo" placeholder="AB-0000">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="">Fuel Capacity(In leaters)</label>
                                            <div class="col-lg-12">
                                                <input type="text" name="empId" class="form-control flat" id="fCapacity" placeholder="10">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="">Vehicle Type</label>
                                            <div class="col-lg-12">
                                                <select name="" id="vehiType" class="form-control flat">
                                                    <option value="">Bike</option>
                                                    <option value="">Lorry</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <label>Assigned Driver</label>
                                            <div class="col-lg-12">
                                                <select class="form-control flat" id="AssignedDriver">
                                                    <!--emp name load using ajax as options -->
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="">Driver ID</label>
                                            <div class="col-lg-12">
                                                <input type="text" name="empId" class="form-control flat" id="driverID" readonly>
                                            </div>
                                            <label for="">Description</label>
                                            <div class="col-lg-12">
                                                <textarea name="" id="description" cols="60" rows="5"></textarea>
                                            </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close
                                </button>
                                <button type="button" class="btn btn-primary btn-sm btn-flat" id="btnSave" value="save">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(function () {
                        showAllVehicle();
                        $('[data-toggle="tooltip"]').tooltip();

                        // save and update button is same.modela change its action according to add or update button click
                        // Select User to Update
                        $('#showData').on('click', '.item-update', function () {
                            Swal.fire({
                                title: 'Are you sure?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, update!'
                            }).then((result) => {
                                if (result.value) {
//                                    var id = $(this).attr('data');
                                    var currentRow = $(this).closest("tr");

                                    $('#vid').val($(this).attr('data'));
                                    $('#vNo').val(currentRow.find(".vNo").html());

//                                    $('#fCapacity').val(currentRow.find(".fCapacity").html());
                                    var fCapacity  = currentRow.find(".fCapacity").html();
                                    fCapacity = fCapacity.replace("L"," ");
                                    $('#fCapacity').val(fCapacity);

                                    $('#description').val(currentRow.find(".description").html());

                                    loadDriverNameAndId(); //load drive name and id

                                    $('#AssignedDriver :selected').text(currentRow.find(".driverName").html());
                                    $('#addVehicle').modal('show');
                                    $('#addVehicle').find('.modal-title').text('Edit Vehicle Details');
                                    $("#vehicleForm").attr('action', '<?php echo base_url();?>index.php/Vehicle/updateVehicle');
                                }
                            })
                        });

                        $('#btnSave').click(function () {
                            var url = $('#vehicleForm').attr('action');
                            var vNo = $('#vNo').val();
                            var fCapacity = $('#fCapacity').val().trim();
                            var driverID = $('#driverID').val();
                            var description = $('#description').val();
                            var vehiType = $('#vehiType option:selected').text();

                            var numbers = /^[0-9.]+$/;

                            if (vNo == '') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: "Vehicle no is Required",
                                })
                            }
                            else if(vNo.length>8 || vNo.length<6 ){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: "Invalid Vehicle No!",
                                })
                            }
                            else if (fCapacity == '') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: "Fuel Capacity is Required",
                                })
                            }
                            else if (!fCapacity.match(numbers)) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: "Integers only fpr fuel capacity",
                                })
                            }
                            else if (vehiType == '') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: "Vehicle Type is Required",
                                })
                            }
                            else {
                                var vid = $('#vid').val();
                                    $.ajax({
                                    type: 'ajax',
                                    method: 'post',
                                    url: url,
                                    data: {
                                        'vNo': vNo,
                                        'fCapacity': fCapacity,
                                        'driverID': driverID,
                                        'description': description,
                                        'vehiType': vehiType,
                                        'vid':vid
                                    },
                                    async: false,
                                    dataType: 'json',
                                    success: function (response) {
                                        if (response.status == true) {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Success',
                                                text: response.msg,
                                            })
                                        }
                                        else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: response.msg,
                                            })
                                        }
//                                         $('#vehicleForm').reset();
                                        // $(this).removeData$('#addUser');
                                        showAllVehicle();
                                        $('#addVehicle').modal('hide');

                                    },
                                    error: function () {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'Internal Server Error!',
                                        })
                                    }

                                });
//                            }
                            }
                        });

                        $('#AssignedDriver').change(function () {
                            $('#driverID').val($('#AssignedDriver option:selected').val());
                        });

                        $('#viewAddVehicleModel').click(function () {
                            $("#vehicleForm").attr('action', '<?php echo base_url();?>index.php/Vehicle/addVehicle');
                            $('#addVehicle').find('.modal-title').text('Add Vehicle Details');
                            $('#btnSave').val('save');
                            loadDriverNameAndId();
                        });
                        function loadDriverNameAndId (){
                            $.ajax({
                                type:'ajax',
                                url:'<?php echo base_url();?>index.php/vehicle/loadUserNameOfDriver',
                                async:false,
                                dataType:'json',
                                success: function(data){
                                    $('#addVehicle').modal('show');
                                    var html = '';
                                    var i;
                                    for (i = 0; i < data.length; i++) {

                                        var fullname = data[i].varEmpFname+" "+data[i].varEmpMName+" "+data[i].varEmpLname;
                                        html += '<option value=' + data[i].intEmpID + ' >' + fullname + '</option>';
                                    }
                                    $('#AssignedDriver').html(html);
                                    $('#driverID').val($('#AssignedDriver option:selected').val());
                                },
                                error: function () {
                                    Swal.fire('Failed to load driver names');
                                }
                            });
                        }
                    $('#VehicleDataTable').on('click', '.item-delete', function() {
                        var varVehicleId = $(this).attr('data');
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!',
                            background:'#ffe3e3'
                        }).then((result) => {
                            if (result.value) {

                                $.ajax({
                                    type: 'ajax',
                                    url: '<?php echo base_url(); ?>index.php/Vehicle/deleteVehicleDetails',
                                    async: false,
                                    dataType: 'json',
                                    method: 'post',
                                    data: {
                                        'varVehicleId': varVehicleId
                                    },
                                    success: function(data) {
                                        Swal.fire(
                                            'Deleted!',
                                            data.message,
                                            'success'
                                        )
                                        showAllVehicle();

                                    },
                                    error: function() {
                                        alert('Could not load data');
                                    }

                                });

                            }
                        })
                    });
                        function showAllVehicle() {
                            $.ajax({
                                type: 'ajax',
                                url: '<?php echo base_url();?>index.php/Vehicle/viewVehicleDetails',
                                async: false,
                                dataType: 'json',
                                success: function (data) {
                                    if(data!=''){
                                        var html = '';
                                        var i;
                                        console.log(data);
                                        for (i = 0; i < data.length; i++) {
                                            var driverName = data[i].varEmpFname+" "+data[i].varEmpMName+" "+data[i].varEmpLname;
                                            html += '<tr>' +
                                                '<td class="vNo">' + data[i].varVehicleNo + '</td>' +
                                                '<td class="fCapacity">' + data[i].intFuelCapacity+' L' + '</td>' +
                                                '<td class="description">' + data[i].varDescription + '</td>' +
                                                '<td class="description">' + data[i].varVehicleType + '</td>' +
                                                '<td class="driverName">' + driverName + '</td>' +
                                                <?php if ($this->session->userdata['uRole']=='Admin'){ ?>
                                                '<td><a href="javascript:;" data-toggle="tooltip" title="Update Record" class="item-update" data="' + data[i].varVehicleId +'"><i class="fas fa-user-edit updateIcon"></i></a>' +
                                                '&nbsp;&nbsp;&nbsp;&nbsp;' +
                                                '<a href="javascript:;" data-toggle="tooltip" title="Delete Record" class="item-delete" data="' + data[i].varVehicleId +'"><i class="fas fa-trash-alt deleteIcon"></i></a></td>' +
                                                <?php }?>
                                                '</tr>';
                                        }
                                        $('#showData').html(html);
                                        $('#VehicleDataTable').DataTable();
                                    }
                                    else{
                                        Swal.fire('Failed to load vehicle details');
                                    }
                                },
                                error: function () {
                                    alert('Could not load data');
                                }

                            });
                        }
                    });
                </script>
            </div><!-- End card-body -->
        </div><!-- End card -->
    </section><!-- End content -->
</div><!-- End content-wrapper -->



