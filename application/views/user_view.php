<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Main Menu</h1>
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
                <h3 class="card-title">Title</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <h4 class="h4">User List</h4>
                <button class="btn btn-success btn-sm" data-toggle="modal" id="viewAddUserModel">Add</button>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>User Name</td>
                        <td>Email</td>
                        <td colspan="2" style="text-align: center;">Action</td>
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
                                            <label>User Name</label>
                                            <div class="col-lg-12">
<!--                                                <input type="text" name="uName" class="form-control" id="uName">-->

                                                <select class="form-control" id="uName">
                                                    <option value="1">Dhahnushka Kumanayake</option>
                                                    <option value="2">Anusha Madhushani</option>
                                                    <option value="3">Jantha Perera</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="">Email</label>
                                            <div class="col-lg-12">
                                                <input type="text" name="email" class="form-control" id="email">
                                            </div>
                                        </div>
                                    <div>
                                        <label for="">Password</label>
                                        <div class="col-lg-12">
                                            <input type="password" name="pwd" class="form-control" id="pwd">
                                        </div>
                                        <div>
                                            <label for="">Password Again</label>
                                            <div class="col-lg-12">
                                                <input type="password" name="pwdAgain" class="form-control"
                                                       id="pwdAgain">
                                            </div>
                                        </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close
                                </button>
                                <button type="button" class="btn btn-primary btn-sm" id="btnSave">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(function () {
                        showAllUsers();

                        $('#viewAddUserModel').click(function () {
                            $('#addUser').modal('show');
                            $("#userForm").attr('action', '<?php echo base_url();?>index.php/user_c/addUser');
                        });

                        // Select User to Update
                        $('#showData').on('click', '.item-edit', function () {
                            var id = $(this).attr('data');
                            $('#addUser').modal('show');
                            $('#addUser').find('.modal-title').text('Edit Employee');


                            $("#userForm").attr('action', '<?php echo base_url();?>index.php/user_c/updateUser');
                            alert(id);
                            $.ajax({
                                type: 'ajax',
                                method: 'post',
                                url: '<?php echo base_url();?>index.php/user_c/selectUserToUpdate',
                                data: {
                                    'id': id,
                                    ''
                                },
                                async: false,
                                dataType: 'json',
                                success: function (data) {
                                    $('#uName').val(data.name);
                                    $('#email').val(data.id);
                                },
                                error: function () {
                                    alert('Failed to edit user');
                                }
                            });
                        });
                        $('#btnSave').click(function () {
                            var url = $('#userForm').attr('action');
                            // var uName = $('#uName').val();
                            var uName=$('#uName option:selected').attr("value")
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
                                    // data: data,
                                    data: {
                                        'userName': uName,
                                        'id': '21',
                                        'pwd': pwd,
                                        'email':email
                                    },
                                    async: false,
                                    dataType: 'json',
                                    success: function (response) {
                                        alert('Record Entered Successfully');
                                        showAllUsers();
                                    },
                                    error: function () {
                                        alert('Failed to save data');
                                    }

                                });
                            }
                            // alert(uName);
                        });

                        function showAllUsers() {
                            $.ajax({
                                type: 'ajax',
                                url: '<?php echo base_url();?>index.php/user_c/getAllUsers',
                                async: false,
                                dataType: 'json',
                                success: function (data) {
                                    var html = '';
                                    var i;
                                    for (i = 0; i < data.length; i++) {
                                        html += '<tr>' +
                                            '<td>' + data[i].userName + '</td>' +
                                            '<td>' + data[i].varEmail + '</td>' +
                                            '<td><a href="javascript:;" class="btn btn-info btn-sm item-edit" data="' + data[i].intUid + '" >Update</a></td>' +
                                            '<td><a href="javascript:;" class="btn btn-danger btn-sm">Delete</a></td>' +
                                            '</tr>';
                                    }
                                    $('#showData').html(html);
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