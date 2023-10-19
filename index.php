<?php
include('security.php');

include('access.php');
include('include/header.php');
include('include/navbar.php');

?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->

                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!--[ daily sales section ] start-->
                            <div class="col-md-6 col-xl-4">
                                <div class="card daily-sales">
                                    <div class="card-block">
                                        <h6 class="mb-4">Total Transactions Count</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>
                                                    <?php
                                                   require 'dbconfig.php';
                                                    $query = "
                                                SELECT COUNT(id)as count
                                                                FROM transaction
                                                                
                                                                ";
                                                    $query_run = mysqli_query($connection, $query);
                                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                                        echo number_format($row['count']);
                                                    }

                                                    ?>
                                                </h3>
                                            </div>

                                            <!-- <div class="col-3 text-right">
                                                    <p class="m-b-0">67%</p>
                                                </div> -->
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--[ daily sales section ] end-->
                            <!--[ Monthly  sales section ] starts-->
                            <div class="col-md-6 col-xl-4">
                                <div class="card Monthly-sales">
                                    <div class="card-block">
                                        <h6 class="mb-4">Total Transactions fees</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-up text-c-red f-30 m-r-10"></i>
                                                    <?php
                                                    //    // require 'dbconfig.php';
                                                    $query = "
                                                                SELECT sum(tran_fee)as total
                                                                FROM transaction
                                                                
                                                                ";
                                                    $query_run = mysqli_query($connection, $query);
                                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                                        echo number_format($row['total']);
                                                    }

                                                    ?>
                                                </h3>
                                            </div>
                                            <!--  <div class="col-3 text-right">
                                                    <p class="m-b-0">36%</p>
                                                </div> -->
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--[ Monthly  sales section ] end-->
                            <!--[ year  sales section ] starts-->
                            <div class="col-md-12 col-xl-4">
                                <div class="card yearly-sales">
                                    <div class="card-block">
                                        <h6 class="mb-4">Total Transactions Amount</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>
                                                    <?php
                                                    //    // require 'dbconfig.php';
                                                    $query = "
                                                                SELECT sum(tran_amount)as total
                                                                FROM transaction
                                                                
                                                                ";
                                                    $query_run = mysqli_query($connection, $query);
                                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                                        echo number_format($row['total']);
                                                    }

                                                    ?>
                                                </h3>
                                            </div>
                                            <!--  <div class="col-3 text-right">
                                                    <p class="m-b-0">80%</p>
                                                </div> -->
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--[ year  sales section ] end-->
                            <!--[ Recent Users ] start-->
                            <div class="col-xl-8 col-md-6">
                                <div class="card Recent-Users">
                                    <div class="card-header">
                                        <h5>Transactions Compare Chart Between Transactions Counts</h5>
                                    </div>
                                    <div class="card-block px-0 py-3">
                                        <canvas id="myChart" style="height: 300px;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!--[ Recent Users ] end-->

                            <!-- [ statistics year chart ] start -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-event">
                                    <div class="card-block">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col">
                                                <h5 class="m-0">Total Successed</h5>
                                            </div>
                                            <!-- <div class="col-auto">
                                                    <label class="label theme-bg2 text-white f-14 f-w-400 float-right">34%</label>
                                                </div> -->
                                        </div>
                                        <h2 class="mt-3 f-w-300">
                                            <?php

                                            $query = "
                                                           SELECT COUNT(terminal_id)as count
                                                           FROM transaction
                                                           WHERE response_status='Successful' 
                                                           ";
                                            $query_run = mysqli_query($connection, $query);
                                            while ($row = mysqli_fetch_assoc($query_run)) {
                                                echo number_format($row['count']);
                                            }

                                            ?>
                                            <!-- <sub class="text-muted f-14">Competitors</sub> -->
                                        </h2>
                                       <!--  <h6 class="text-muted mt-4 mb-0">You can participate in event </h6> -->
                                        <i class="fab fa-angellist text-c-purple f-50"></i>
                                    </div>
                                </div>
                                <div class="card card-event">
                                    <div class="card-block">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col">
                                                <h5 class="m-0">Total Failed</h5>
                                            </div>
                                            <!-- <div class="col-auto">
                                                    <label class="label theme-bg2 text-white f-14 f-w-400 float-right">34%</label>
                                                </div> -->
                                        </div>
                                        <h2 class="mt-3 f-w-300">
                                            <?php

                                            $query = "
                                            SELECT COUNT(terminal_id)as count
                                            FROM transaction
                                            WHERE response_status='Failed' 
                                            ";
                                            $query_run = mysqli_query($connection, $query);
                                            while ($row = mysqli_fetch_assoc($query_run)) {
                                                echo number_format($row['count']);
                                            }

                                            ?>
                                            <!-- <sub class="text-muted f-14">Competitors</sub> -->
                                        </h2>
                                        <!-- <h6 class="text-muted mt-4 mb-0">You can participate in event </h6> -->
                                        <i class="fab icon-thumbs-down text-c-purple f-50"></i>
                                        <i class="feather icon-thumbs-down text-c-red f-30 m-r-10"></i>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- [ statistics year chart ] end -->
                        <!--[ Recent Users ] start-->
                        <div class="col-xl-8 col-md-6">
                            <div class="card Recent-Users">
                                <div class="card-header">
                                    <h5>Transactions Compare Chart Between Transactions Fees</h5>
                                </div>
                                <div class="card-block px-0 py-3">
                                    <canvas id="mChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <!--[ Recent Users ] end-->
                        <!--[ Recent Users ] start-->
                        <div class="col-xl-8 col-md-6">
                            <div class="card Recent-Users">
                                <div class="card-header">
                                    <h5>Transactions Compare Chart Between Transactions Amount</h5>
                                </div>
                                <div class="card-block px-0 py-3">
                                    <canvas id="mhart"></canvas>
                                </div>
                            </div>
                        </div>
                        <!--[ Recent Users ] end-->

                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- [ Main Content ] end -->



<?php
include('include/script.php');
include('include/footer.php');
?>

<?php
$connection = mysqli_connect("localhost", "root", "", "bdmw");
$query = $connection->query("
    SELECT service_name as service, SUM(tran_amount) as amount ,SUM(tran_fee) as fee ,COUNT(service_name) as count
    FROM transaction
    
    GROUP BY service_name
  ");

foreach ($query as $data) {
    $service[] = $data['service'];
    $amount[] = $data['amount'];
    $fee[] = $data['fee'];
    $count[] = $data['count'];
}

?>

<script>
    const labels = <?php echo json_encode($service) ?>;
    const data = {
        labels: labels,
        datasets: [{
            label: 'My First Dataset',
            data: <?php echo json_encode($count) ?>,
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(54, 162, 225)',
                'rgb(255, 99, 132)',
                '#8b0000',
                '#0000cd',
                '#dc143c',
                '#48d1cc',
                '#c71585',
                '#191970',
                '#663399',
                'rgb(135, 206, 250)',
                '#ffff00',
                '#000080',
                '#00ced1',
                '#ff1493',
                '#2e8b57',
                '#1e90ff',
                '#c71585',
                '#000080'

            ],
            hoverOffset: 4
        }]
    };
    const config = {
        type: 'doughnut',
        data: data,
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>

<script>
    var ctx = document.getElementById("mChart").getContext('2d');
    var mChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: '# of Fees',
                data: <?php echo json_encode($fee) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(250, 99, 132, 0.2)',
                    'rgba(254, 162, 235, 0.2)',
                    'rgba(255, 200, 86, 0.2)',
                    'rgba(75, 192, 190, 0.2)',
                    'rgba(153, 100, 255, 0.2)',
                    'rgba(255, 150, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            local: 'en-US',
            scales: {
                yAxes: [{
                    ticks: {
                        callback: (value, index, values) => {
                            return new Intl.NumberFormat('en-IN', {
                                style: 'currency',
                                currency: 'INR',
                                maximumFractionDigits: 3
                            }).format(value);
                        },
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById("mhart").getContext('2d');
    var mhart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: '# of Amounts',
                data: <?php echo json_encode($amount) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(250, 99, 132, 0.2)',
                    'rgba(254, 162, 235, 0.2)',
                    'rgba(255, 200, 86, 0.2)',
                    'rgba(75, 192, 190, 0.2)',
                    'rgba(153, 100, 255, 0.2)',
                    'rgba(255, 150, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            local: 'en-US',
            scales: {
                yAxes: [{
                    ticks: {
                        callback: (value, index, values) => {
                            return new Intl.NumberFormat('en-IN', {
                                style: 'currency',
                                currency: 'INR',
                                maximumFractionDigits: 3
                            }).format(value);
                        },
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>