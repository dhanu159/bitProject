<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admin Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div>
            </div>
        </div><!-- End container-fluid -->
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Job Types</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <!--Body content-->
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <Label>Job Category Name</Label>
                        <input type="text" class="form-control flat" id="jobCategoryName">
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <Label>Designation</Label>
                        <input type="text" class="form-control flat" id="designation">
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="margin-top: 35px;">
                        <button class="btn btn-flat btn-sm btn-primary" id="saveJobCategories">Save</button>
                    </div>
                </div>
                <div class="row" style="margin-top: 35px;">
                    <div class="col-xs-12">
                        <table class="table table-striped table-responsive-sm">
                            <thead>
                            <th>Job Category Name</th>
                            <th>Designation</th>
                            <th colspan="2" style="text-align: center">Action</th>
                            </thead>
                            <tbody id="showData">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- End card-body -->
        </div><!-- End card -->
    </section><!-- End content -->
    <script>
        $(function () {
            showAllJobTypes();

            function showAllJobTypes() {
                $.ajax({
                    type:'ajax',
                    method:'post',
                    async:false,
                    url:baseUrl+"index.php/Admin_c/viewAllJobTypes",
                    dataType: 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + data[i].varJobCategoryName + '</td>' +
                                '<td>' + data[i].varDesignation + '</td>' +
                                '<td><a href="javascript:;" data-toggle="tooltip" title="Update User" class="btn btn-info btn-sm item-edit btn-flat" data="' + data[i].intJobCategoryID + '" >Update</a></td>' +
                                '<td><a href="javascript:;" data-toggle="tooltip" title="Delete User" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash-alt"></i></a></td>' +
                                '</tr>';
                        }
                        $('#showData').html(html);
                    },
                    error: function () {
                        swal({
                            title: "Success",
                            text: "Failed to load Data!",
                            icon: "success",
                        });
                    }
                });
            }

            $('#saveJobCategories').click(function () {
                var jobCategoryName = $('#jobCategoryName').val();
                var designation = $('#designation').val();
                var error = '';
                var lineBr = "\r\n";
                if (jobCategoryName == "") {
                    error += "Please Insert Job Category Name!";
                }
                if (designation == "") {
                    error += lineBr + "Please Insert Designation!";
                }
                if (error != '') {
                    swal("Error!", error, "warning");
                }
                else {
                    $.ajax({
                        type: 'ajax',
                        method: 'post',
                        async: false,
                        url: baseUrl + "index.php/Admin_c/saveJobTypes",
                        dataType: 'json',
                        data: {
                            'jobCategoryName': jobCategoryName,
                            'designation': designation
                        },
                        success: function (response) {
                            if (response.status == true) {
                                swal('Success', response.msg, 'success');
                                $('#jobCategoryName').val("");
                                $('#designation').val("");
                                showAllJobTypes();

                            }
                            else {
                                swal('Failed', response.msg, 'warning');
                            }

                        },
                        error: function () {
                            alert('Failed to save data');
                        }
                    });
                }
            });
        });
    </script>
</div><!-- End content-wrapper -->



