<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 12/1/2019
 * Time: 5:03 PM
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
                        <li class="breadcrumb-item active">Admin Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- End container-fluid -->
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Admin Dashboard</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-3">
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="container" style="width:100%; height:400px;"></div>
                                    </div>
                                    <div class="col-lg-3">
                                    </div>
                                </div>

            </div><!-- End card-body -->
        </div><!-- End card -->
    </section><!-- End content -->
</div><!-- End content-wrapper -->
<script>
        document.addEventListener('DOMContentLoaded', function () {
            var thisMonth = '';
            var thisMonthAmount = 125053.00;
            var previousMonth = '';
            var previousMonthAmount = 244247.00;
            var beforePreviousMonth = '';
            var beforePreviousMonthAmount = 275461.00;
            getMonth();
            function getMonth() {
                var month = new Array();
                month[0] = "January";
                month[1] = "February";
                month[2] = "March";
                month[3] = "April";
                month[4] = "May";
                month[5] = "June";
                month[6] = "July";
                month[7] = "August";
                month[8] = "September";
                month[9] = "October";
                month[10] = "November";
                month[11] = "December";

                var d = new Date();
                thisMonth = month[d.getMonth()];
                if(d.getMonth()==1){
                    previousMonth = month[11];
                    beforePreviousMonth = month[10];
                }
                else{
                    previousMonth = month[d.getMonth()-1];
                    beforePreviousMonth = month[d.getMonth()-2];
                }
            }
            var myChart = Highcharts.chart('container', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Stock in hand total price'
                },
                xAxis: {
                    categories: ['Stock Warth']
                },
                yAxis: {
                    title: {
                        text: 'Fruit eaten'
                    }
                },
                series: [{
                    name: thisMonth,
                    data: [thisMonthAmount]
                }, {
                    name: previousMonth,
                    data: [previousMonthAmount]
                },
                    {
                        name: beforePreviousMonth,
                        data: [beforePreviousMonthAmount]
                    }]
            });
        });

</script>





