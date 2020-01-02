
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Home_c')?>">Home</a></li>
                        <li class="breadcrumb-item active">Manage Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- End container-fluid -->
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Manage Users</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <button class="btn btn-success btn-sm btn-flat" data-toggle="modal" id="viewAddUserModel" style="margin-bottom: 20px;">Add</button>
                <table class="table display responsive nowrap" id="userDataTable">
                    <thead>
                    <tr>
                        <th>EMP Name</th>
                        <th>Email (User Name)</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody id="showData">

                    </tbody>
                </table>
                <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <!--  addUser Modal -->
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="#" class="form sidebar-form" id="userForm">
                                    <div class="form-group">
                                        <div>
                                            <label>Employee Name</label>
                                            <div class="col-lg-12">
                                                <select class="form-control flat" id="uName">
<!--                                                        emp name load using ajax as options -->
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="">EMP ID</label>
                                            <div class="col-lg-12">
                                                <input type="text" name="empId" class="form-control flat" id="empId" readonly>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="">Email</label>
                                            <div class="col-lg-12">
                                                <input type="email" name="email" class="form-control flat" id="email">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="">User Type</label>
                                            <div class="col-lg-12">
                                                <input type="text" name="uType" class="form-control flat" id="uType">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="">Password</label>
                                            <div class="col-lg-12">
                                                <input type="password" name="pwd" class="form-control flat" id="pwd">
                                            </div>
                                            <div>
                                                <label for="">Password Again</label>
                                                <div class="col-lg-12">
                                                    <input type="password" name="pwdAgain" class="form-control flat" id="pwdAgain">
                                                </div>
                                            </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close
                                </button>
                                <button type="button" class="btn btn-primary btn-sm btn-flat" id="btnSave">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(function () {
                        showAllUsers();
                        $('[data-toggle="tooltip"]').tooltip();
                        $('#viewAddUserModel').click(function () {
                            // $('#addUser').modal('show');
                            //$("#userForm").attr('action', '<?php //echo base_url();?>//index.php/ManageUsers_c/addUser');
                        });

                        // save and update button is same.modela change its action according to add or update button click
                        // Select User to Update
                        $('#showData').on('click', '.item-edit', function () {
                            var id = $(this).attr('data');
                            $('#addUser').modal('show');
                            $('#addUser').find('.modal-title').text('Edit User');
                            $("#userForm").attr('action', '<?php echo base_url();?>index.php/ManageUsers_c/updateUser');
                            alert(id);
                            $.ajax({
                                type: 'ajax',
                                method: 'post',
                                url: '<?php echo base_url();?>index.php/ManageUsers_c/selectUserToUpdate',
                                data: {
                                    'id': id
                                },
                                async: false,
                                dataType: 'json',
                                success: function (data) {
                                    $('#uName option:selected').attr(data.intUid);
                                    $('#email').val(data.varEmail);
                                },
                                error: function () {
                                    alert('Failed to edit user');
                                }
                            });
                        });

                        $('#btnSave').click(function () {
                            var url = $('#userForm').attr('action');
                            var uName = $('#uName option:selected').text();
                            var id = $('#uName option:selected').val();
                            var email = $('#email').val();
                            var pwd = $('#pwd').val();
                            var pwdAgain = $('#pwdAgain').val();

                            if (uName == '') {
                                alert("Name is Required");
                            }
                            else if (email == '') {
                                alert("Email is Required");
                            }
                            else if (pwd == '') {
                                alert("Password is Required");
                            }
                            else if (pwdAgain == '') {
                                alert("Password Again is Required");
                            }
                            else if (pwdAgain != pwd) {
                                alert("Password and Password Again Should be Equal");
                            }
                            else {
                                $.ajax({
                                    type: 'ajax',
                                    method: 'post',
                                    url: url,
                                    data: {
                                        'userName': uName,
                                        'id':id,
                                        'pwd': pwd,
                                        'email': email
                                    },
                                    async: false,
                                    dataType: 'json',
                                    success: function (response) {
                                        alert(response.msg);
                                        // $('#addUser').reset();
                                        // $(this).removeData$('#addUser');
                                        showAllUsers();
                                    },
                                    error: function () {
                                        alert('Failed to save data');
                                    }

                                });
                            }
                        });

                        $('#uName').change(function () {
                            $('#empId').val($('#uName option:selected').val());
                        });

                        $('#viewAddUserModel').click(function () {
                            $("#userForm").attr('action', '<?php echo base_url();?>index.php/ManageUsers_c/addUser');
                            $.ajax({
                                type:'ajax',
                                url:'<?php echo base_url();?>index.php/ManageUsers_c/loadUserNameToModel',
                                async:false,
                                dataType:'json',
                                success: function(data){
                                    $('#addUser').modal('show');
                                    var html = '';
                                    var i;
                                    for (i = 0; i < data.length; i++) {

                                        var fullname = data[i].varEmpFname+" "+data[i].varEmpMName+" "+data[i].varEmpLname;
                                        html += '<option value=' + data[i].intEmpID + ' >' + fullname + '</option>';
                                    }
                                    $('#uName').html(html);
                                    $('#empId').val($('#uName option:selected').val());
                                },
                                error: function () {
                                    alert('failed to load user names');
                                }
                            });
                        });

                        function showAllUsers() {
                            $.ajax({
                                type: 'ajax',
                                url: '<?php echo base_url();?>index.php/ManageUsers_c/getAllUsers',
                                async: false,
                                dataType: 'json',
                                success: function (data) {
                                    var html = '';
                                    var i;
                                    for (i = 0; i < data.length; i++) {
                                        var empName = data[i].varEmpFname+" "+data[i].varEmpMName+" "+data[i].varEmpLname;
                                        html += '<tr>' +
                                            '<td>' + empName + '</td>' +
                                            '<td>' + data[i].varEmail + '</td>' +
                                            '<td><a href="javascript:;" data-toggle="tooltip" title="Delete User" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash-alt"></i></a></td>' +
                                            '</tr>';
                                    }
                                    $('#showData').html(html);
                                    $('#userDataTable').DataTable();
                                },
                                error: function () {
                                    alert('Could not load data');
                                }

                            });
                        }
                    });
                    // Tool tip style
                    $(document).ready(function(){
                        $('[data-toggle="tooltip"]').tooltip();
                    });
                </script>
            </div><!-- End card-body -->
        </div><!-- End card -->
    </section><!-- End content -->
</div><!-- End content-wrapper -->