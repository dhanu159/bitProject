<?php

/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 10/26/2019
 * Time: 11:25 PM
 */

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Manage Employees</a></li>
                        <li class="breadcrumb-item active">View Employees</li>
                    </ol>
                </div>
            </div>
        </div><!-- End container-fluid -->
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Employees</h3>
            </div>
            <div class="card-body">
                <!--Content-->
                <table class="table display responsive nowrap" id="userDataTable">
                    <thead class="jTableContent">
                        <tr>
                            <th>EMP ID</th>
                            <th>Name</th>
                            <th>NIC</th>
                            <th>Address</th>
                            <th>Mobile No</th>
                            <th>Joined Date</th>
                            <th>Gender</th>
                            <th>Image</th>                            
                            <?php if ($this->session->userdata['uRole']=='Admin'){ ?>
                            <th>Action</th>                               
                            <?php }?>
                            
                        </tr>
                    </thead>
                    <tbody id="showData" style="font-size: 12px;">

                    </tbody>
                </table>
            </div><!-- End card-body -->
        </div><!-- End card -->
    </section><!-- End content -->
</div><!-- End content-wrapper -->
<script>
    $(function() {
        showEmployees();
        // Tool tip style
                        $('[data-toggle="tooltip"]').tooltip();

        function showEmployees() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url(); ?>index.php/Employee_c/getAllEmployees',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        var empName = data[i].varEmpFname + " " + data[i].varEmpMName + " " + data[i].varEmpLname;
                        var address = data[i].varEmpAddL1 + " " + data[i].varEmpAddL2 + " " + data[i].varEmpAddL3;
                        html += '<tr>' +
                            '<td>' + data[i].intEmpID + '</td>' +
                            '<td>' + empName + '</td>' +
                            '<td>' + data[i].varEmpNIC + '</td>' +
                            '<td>' + address + '</td>' +
                            '<td>' + data[i].varEmpContactNoM + '</td>' +
                            '<td>' + data[i].dateJoinedDate + '</td>' +
                            '<td>' + data[i].gender + '</td>' +
                            '<td><img src="' + baseUrl + 'uploads/' + data[i].image + '" alt="" style="width: 60px;height: 60px;" class="img-thumbnail"></td>' +
                            <?php if ($this->session->userdata['uRole']=='Admin'){ ?>
                                '<td><a href="javascript:;" data-toggle="tooltip" title="Update Employee" class="item-update" data="' + data[i].intEmpID + '"><i class="fas fa-user-edit" style="color:rgb(12, 82, 93); font-size:20px;"></i></a>&nbsp; &nbsp;&nbsp; &nbsp;  <a href="javascript:;" data-toggle="tooltip" title="Delete Employee" class="item-delete" data="' + data[i].intEmpID + '"><i class="fas fa-trash-alt" style="color:rgb(211, 51, 51);font-size:20px;"></i></a></td>' +
                            <?php }?>
                            '</tr>';
                        console.log(data[i].intEmpID);

                    }
                    $('#showData').html(html);
                    $('#userDataTable').DataTable();
                },
                error: function() {
                    alert('Could not load data');
                }

            });
        }
        
        $('#userDataTable').on('click', '.item-update', function() {
            var empID = $(this).attr('data');
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to update employee!",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = baseUrl+"index.php/Employee_c/updateEmployee?empID="+empID;
                }
            })
        });
        $('#userDataTable').on('click', '.item-delete', function() {
            var empID = $(this).attr('data');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                background:'#ffe3e3'
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        type: 'ajax',
                        url: '<?php echo base_url(); ?>index.php/Employee_c/deleteEmployee',
                        async: false,
                        dataType: 'json',
                        method: 'post',
                        data: {
                            'empID': empID
                        },
                        success: function(data) {
                            //         alert(data.message);
                            Swal.fire(
                                'Deleted!',
                                data.message,
                                'success'
                            )
                            showEmployees();
                        },
                        error: function() {
                            alert('Could not load data');
                        }

                    });

                }
            })
        });
    });
</script>