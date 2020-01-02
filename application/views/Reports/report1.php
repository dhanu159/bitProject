<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 12/2/2019
 * Time: 7:08 PM
 */
?>
<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 12/1/2019
 * Time: 12:28 PM
 */
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Stock in Hand</li>
                    </ol>
                </div>
            </div>
        </div><!-- End container-fluid -->
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Stock in Hand</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <table class="table display responsive nowrap jTableContent" id="stockOnHandDataTable">
                    <thead>
                    <tr>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Quanity</th>
                        <th>Total Amount</th>
                    </tr>
                    </thead>
                    <tbody id="showData">

                    </tbody>
                </table>
                <div class="row">

                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4" style="text-align: center">
                        <button class="btn btn-flat btn-info">PDF</button>
                        <button class="btn btn-flat btn-info">EXCEL</button>
                        <button class="btn btn-flat btn-info">PRINT</button>
                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>
            </div><!-- End card-body -->
        </div><!-- End card -->
    </section><!-- End content -->
</div><!-- End content-wrapper -->
<script>
    $(function(){
        loadStockHandeInfo();
        function loadStockHandeInfo(){
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url();?>index.php/Inventory/LoadStackInHandDetails',
                async: false,
                dataType: 'json',
                success: function (data) {
                    if(data!=''){
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + data[i].productCategory + '</td>' +
                                '<td>' + data[i].varSubCategoryName + '</td>' +
                                '<td>' + data[i].intQunitry + '</td>' +
                                '<td>' + data[i].DoubleTotalAmount + '</td>' +
                                '</tr>';
                        }
                        $('#showData').html(html);
                        $('#stockOnHandDataTable').DataTable();
                    }
                    else{
                        Swal.fire('Failed to load Customer details');
                    }
                },
                error: function () {
                    alert('Could not load data');
                }

            });
        }
    });
</script>





