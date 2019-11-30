<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 11/28/2019
 * Time: 11:16 PM
 */
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Manage Products</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- End container-fluid -->
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Manage Products</h3>
            </div>
            <div class="card-body">
                <button class="btn btn-success btn-sm btn-flat" data-toggle="modal" id="viewAddProductModel" style="margin-bottom: 20px;">Add</button>

                <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <!--  addUser Modal -->
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Customer Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="#" class="form sidebar-form" id="productForm">
                                    <div class="form-group">
                                        <input type="text" id="pid">
                                        <div>
                                            <label>Product Category</label>
                                            <div class="col-lg-12">
                                                <select class="form-control flat" id="pCategory">
                                                    <!-- prodcut category load using ajax as options -->
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <label>Product Name</label>
                                            <div class="col-lg-12">
                                                <input type="text"  class="form-control flat" id="pName">
                                            </div>
                                        <div>
                                            <label>Product Description</label>
                                            <div class="col-lg-12">
                                                <input type="text"  class="form-control flat" id="ProductDescription">
                                            </div>
                                        </div>
                                            <div>
                                                <label>Product Supplier</label>
                                                <div class="col-lg-12">
                                                    <select class="form-control flat" id="pSupplier">
                                                        <!-- prodcut category load using ajax as options -->
                                                    </select>
                                                </div>
                                            </div>
                                        <div>
                                            <label>Unit Price</label>
                                            <div class="col-lg-12">
                                                <input type="text"  class="form-control flat" id="unitPrice">
                                            </div>
                                        </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
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
        $('[data-toggle="tooltip"]').tooltip();

        $('#viewAddProductModel').click(function () {
            loadProductCategory();

            loadProductSupplier();

            $("#productForm").attr('action', '<?php echo base_url();?>index.php/Product/addProduct');

            $('#btnSave').val('save');

            $('#addProduct').find('.modal-title').text('Add Product Details');
        });

        $('#btnSave').click(function () {
            var url = $('#productForm').attr('action');
            var pCategoryID = $('#pCategory option:selected').val();
            var pName = $('#pName').val();
            var unitPrice = $('#unitPrice').val().trim();
            var ProductDescription = $('#ProductDescription').val().trim();

            var pid = $('#pid').val();


            if (pName == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Product Name is Required",
                })
            }
            else if (unitPrice == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Unit price is Required",
                })
            }
            else {
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: url,
                    data: {
                        'pCategoryID': pCategoryID,
                        'pName': pName,
                        'ProductDescription':ProductDescription,
                        'unitPrice': unitPrice
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
//                        showAllCustomers();
                        $('#addProduct').modal('hide');

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
        function loadProductCategory(){
            $.ajax({
                type:'ajax',
                url:'<?php echo base_url();?>index.php/Product/loadProductCategories',
                async:false,
                dataType:'json',
                success: function(data){
                    $('#addProduct').modal('show');
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].PCid + ' >' + data[i].productCategory + '</option>';
                    }
                    $('#pCategory').html(html);
//                    $('#empId').val($('#uName option:selected').val());
//                    alert($('#pCategory option:selected').text());
                },
                error: function () {
                    alert('failed to load Job Categries');
                }
            });
        }
        function loadProductSupplier(){
            $.ajax({
                type:'ajax',
                url:'<?php echo base_url();?>index.php/Product/loadProductSupplier',
                async:false,
                dataType:'json',
                success: function(data){
                    $('#addProduct').modal('show');
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].intVendorID + ' >' + data[i].varVName + '</option>';
                    }
                    $('#pSupplier').html(html);
//                    $('#empId').val($('#uName option:selected').val());
//                    alert($('#pCategory option:selected').text());
                },
                error: function () {
                    alert('failed to load Job Categries');
                }
            });
        }

    });
</script>

