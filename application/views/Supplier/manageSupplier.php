<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 11/26/2019
 * Time: 11:17 PM
 */
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Manage Vendors</li>
                    </ol>
                </div>
            </div>
        </div><!-- End container-fluid -->
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Manage Vendors</h3>
            </div>
            <div class="card-body">
                <button class="btn btn-success btn-sm btn-flat" data-toggle="modal" id="viewAddVendorModel" style="margin-bottom: 20px;">Add</button>
                <div>
                    <table class="table display responsive nowrap" id="suplierDataTable">
                        <thead>
                        <tr>
                            <th>Suppplier Name</th>
                            <th>Address</th>
                            <th>Contact No</th>
                            <th>Email</th>
                            <th>Description</th>
                            <?php if ($this->session->userdata['uRole']=='Admin'){ ?>
                                <th>Action</th>
                            <?php }?>
                        </tr>
                        </thead>
                        <tbody id="showData">

                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="addSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <!--  addUser Modal -->
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Supplier Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="#" class="form sidebar-form" id="supplierForm">
                                    <div class="form-group">
                                        <input type="hidden" id="sid">
                                        <div>
                                            <label>Supplier Name</label>
                                            <div class="col-lg-12">
                                                <input type="text"  class="form-control flat" id="sName">
                                            </div>
                                        </div>
                                        <div>
                                            <label>Address Line 1</label>
                                            <div class="col-lg-12">
                                                <input type="text"  class="form-control flat" id="addLine1">
                                            </div>
                                        </div>
                                        <div>
                                            <label>Address Line 2</label>
                                            <div class="col-lg-12">
                                                <input type="text"  class="form-control flat" id="addLine2">
                                            </div>
                                        </div>
                                        <div>
                                            <label>Address Line 3</label>
                                            <div class="col-lg-12">
                                                <input type="text"  class="form-control flat" id="addLine3">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="">Contact No</label>
                                            <div class="col-lg-12">
                                                <input type="text" name="empId" class="form-control flat" id="contactNo">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="">Email Address</label>
                                            <div class="col-lg-12">
                                                <input type="email" name="empId" class="form-control flat" id="email">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="">Description</label>
                                            <div class="col-lg-12">
                                                <textarea class="form-control flat" name="" id="description" cols="60" rows="5"></textarea>
                                            </div>
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
            </div>
            </div><!-- End card-body -->
        </div><!-- End card -->
    </section><!-- End content -->
</div><!-- End content-wrapper -->
<script>
    $(function () {
        showAllSuppliers();
        $('#viewAddVendorModel').click(function () {
            $("#supplierForm").attr('action', '<?php echo base_url();?>index.php/Supplier/addSupplier');
            $('#btnSave').val('save');

            $('#addSupplier').find('.modal-title').text('Add Supplier Details');

            $('#addSupplier').modal('show');
        });

        $('#btnSave').click(function () {
            var url = $('#supplierForm').attr('action');
            var sName = $('#sName').val();
            var addLine1 = $('#addLine1').val().trim();
            var addLine2 = $('#addLine2').val();
            var addLine3 = $('#addLine3').val();
            var contactNo = $('#contactNo').val();
            var email = $('#email').val();
            var description = $('#description').val();
            var sid = $('#sid').val();

            if (sName == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Suplier Name is Required",
                })
            }
            else if (addLine1 == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Address Line 1 is Required",
                })
            }
            else if (contactNo == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Contact No is Required",
                })
            }
            else if (email == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "email is Required",
                })
            }
            else {
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: url,
                    data: {
                        'sName': sName,
                        'addLine1': addLine1,
                        'addLine2': addLine2,
                        'addLine3': addLine3,
                        'contactNo': contactNo,
                        'email': email,
                        'description': description,
                        'sid':sid
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
                        showAllSuppliers()
                        $('#addSupplier').modal('hide');

                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Internal Server Error!',
                        })
                    }

                });
            }
        });

        function showAllSuppliers() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url();?>index.php/Supplier/viewSupplierDetails',
                async: false,
                dataType: 'json',
                success: function (data) {
                    if(data!=''){
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            var Address = data[i].varAddLine1+" "+data[i].varAddLine2+" "+data[i].varAddLine3;
                            html += '<tr>' +
                                '<td class="vNo">' + data[i].varVName + '</td>' +
                                '<td class="fCapacity">' + Address + '</td>' +
                                '<td class="description">' + data[i].varContactNo + '</td>' +
                                '<td class="description">' + data[i].varEmaiAdd + '</td>' +
                                '<td class="driverName">' + data[i].varDescription  + '</td>' +
                                <?php if ($this->session->userdata['uRole']=='Admin'){ ?>
                                '<td><a href="javascript:;" data-toggle="tooltip" title="Update Record" class="item-update" data="' + data[i].intVendorID +'"><i class="fas fa-user-edit updateIcon"></i></a>' +
                                '&nbsp;&nbsp;&nbsp;&nbsp;' +
                                '<a href="javascript:;" data-toggle="tooltip" title="Delete Record" class="item-delete" data="' + data[i].intVendorID +'"><i class="fas fa-trash-alt deleteIcon"></i></a></td>' +
                                <?php }?>
                                '</tr>';
                        }
                        $('#showData').html(html);
                        $('#suplierDataTable').DataTable();
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

        $('#suplierDataTable').on('click', '.item-delete', function() {
            var varSupplierId = $(this).attr('data');
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
                        url: '<?php echo base_url(); ?>index.php/Supplier/deleteSupplierDetails',
                        async: false,
                        dataType: 'json',
                        method: 'post',
                        data: {
                            'varSupplierId': varSupplierId
                        },
                        success: function(data) {
                            Swal.fire(
                                'Deleted!',
                                data.message,
                                'success'
                            )
                            showAllSuppliers();
                        },
                        error: function() {
                            alert('Could not load data');
                        }
                    });
                }
            })
        });
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

                    var sid = $(this).attr('data');
                    $.ajax({
                        type: 'ajax',
                        method: 'post',
                        url:  '<?php echo base_url(); ?>index.php/Supplier/SelectSupplerForUpdate',
                        data: {
                        'sid':sid
                        },
                        async: false,
                        dataType: 'json',
                        success: function (response) {
//                            alert('ok');
                            if (response!='') {
                                $('#addSupplier').modal('show');
                                $('#sName').val(response.varVName);
                                $('#addLine1').val(response.varAddLine1);
                                $('#addLine2').val(response.varAddLine2);
                                $('#addLine3').val(response.varAddLine3);
                                $('#contactNo').val(response.varContactNo);
                                $('#email').val(response.varEmaiAdd);
                                $('#description').val(response.varDescription);
                            }
                            else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.msg,
                                })
                            }
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Internal Server Error!',
                            })
                        }
                    });

                    $('#viewAddVendorModel').find('.modal-title').text('Edit Supplier Details');
                    $('#sid').val(sid);
                    $("#supplierForm").attr('action', '<?php echo base_url();?>index.php/Supplier/updateSupplier');

                }
            })
        });
    });
</script>
