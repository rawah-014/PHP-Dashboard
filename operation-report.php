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
                                        <h6 class="mb-4">Total Registered Terminals</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>
                                                <?php

$query = "
           SELECT COUNT(terminal_id)as count
           FROM terminal
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
                           
                            <!--[ year  sales section ] starts-->
                            <div class="col-md-12 col-xl-4">
                                <div class="card yearly-sales">
                                    <div class="card-block">
                                        <h6 class="mb-4">Total Active Terminals</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>
                                                <?php
                                                //    // require 'dbconfig.php';
                                                $query = "
                                                                SELECT COUNT(active)as total
                                                                FROM terminal
                                                                WHERE `active`= 1 
                                                                
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
                             <!--[ Monthly  sales section ] starts-->
                             <div class="col-md-6 col-xl-4">
                                <div class="card Monthly-sales">
                                    <div class="card-block">
                                        <h6 class="mb-4">Total Unactive Terminal</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-down text-c-red f-30 m-r-10"></i>
                                                <?php
                                                //    // require 'dbconfig.php';
                                                $query = "
                                                SELECT COUNT(active)as total
                                                FROM terminal
                                                WHERE `active`= 0 
                                                                
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
                            <!--[ Recent Users ] start-->
                            <div class="col-xl-8 col-md-6">
                                <div class="card Recent-Users">
                                    <div class="card-header">
                                        <h5>Compare Chart Between Active & Unactive Terminals</h5>
                                    </div>
                                    <div class="card-block px-0 py-3">
                                        <canvas id="myChart" style="height: 300px;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!--[ Recent Users ] end-->
                            
                            <!-- [ Hover-table ] start -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Terminal Table</h5>
                                        <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                                    </div>
                                    <div class="card-header bg-light">
                                            <div class="row p-0">
                                                    <label class="col-sm-2 col-form-label">Filter Rows </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" require placeholder="Enter Terminal id" id="myInput" onkeyup="myFunction()">
                                                    </div>
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-2 ml-2">
                                                        <a href="exsl/ter.php">
                                                            <button class="btn btn-outline-primary btn-round btn-sm"><i class="fa fa-download" type="submit" name="excel" value="Download Excel"></i>
                                                            <a href="exsl/ter.php"><input type="submit" name="excel" value="Download Excel" style=" background-color: white;
                                                                border: none;
                                                                }"></a>
                                                            </button>
                                                        </a>
                                                        </div>
                                                </div>
                                    </div>
                                    
                                    <div class="card-block table-border-style pt-0">
                                        <div class="table-responsive">
                                            <?php
                                            //try
                                            if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                                                $page_no = $_GET['page_no'];
                                            } else {
                                                $page_no = 1;
                                            }

                                            $total_records_per_page = 25;
                                            $offset = ($page_no - 1) * $total_records_per_page;
                                            $previous_page = $page_no - 1;
                                            $next_page = $page_no + 1;
                                            $adjacents = "2";

                                            $result_count = mysqli_query($connection, "SELECT COUNT(id) As total_records 
                                                    FROM `terminal`
                                                    ");
                                            $total_records = mysqli_fetch_array($result_count);
                                            $total_records = $total_records['total_records'];
                                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                            $second_last = $total_no_of_pages - 1; // total page minus 1

                                            $query = "SELECT *
                                                        FROM terminal
                                                        
                                                         LIMIT $offset, $total_records_per_page";
                                            //try
                                            /*    $query = "SELECT id,terminal_id,date,tran_amount,tran_fee,service_name,response_status,reference_number
                                                     FROM transactiondata
                                                     WHERE terminal_id LIKE '14%'
                                                     LIMIT 0,25
                                                     "; */
                                            $query_run = mysqli_query($connection, $query);
                                            ?>
                                            <table class="table table-hover" id="myTable" >
                                                <thead>

                                                    <tr>
                                                        <th>id</th>
                                                        <th>terminal_id</th>
                                                        <th>active/inactive</th>
                                                        <th>merchant_id</th>
                                                        <th>merchant_name</th>
                                                        <th>market_name</th>
                                                        <th>phone_no</th>
                                                        <th>s_im_serial_no</th>
                                                        <th>p_os_serial_no</th>
                                                        <th>bank_branch</th>
                                                        <th>accountnumber</th>
                                                        <th>location</th>
                                                        <th>user</th>
                                                        
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (mysqli_num_rows($query_run) > 0) {
                                                        while ($row = mysqli_fetch_assoc($query_run)) {
                                                    ?>
                                                            <tr class="<?php
                                                                  //  echo $row['oder_status'];
                                                                 if ($row['active'] == 1) {
                                                                    echo 'table-success';
                                                                } else  if ($row['active'] == 0) {
                                                                    echo 'table-danger';
                                                                }
                                                                ?>">
                                                                <td scope="row"><?php echo $row['id']; ?></td>
                                                                <td><?php echo $row['terminal_id']; ?></td>
                                                                <td><?php
                                                                  //  echo $row['oder_status'];
                                                                 if ($row['active'] == 1) {
                                                                    echo 'active';
                                                                } else  if ($row['active'] == 0) {
                                                                    echo 'inactive';
                                                                }
                                                                ?></td>
                                                                <td><?php echo $row['merchant_id']; ?></td>
                                                                <td><?php echo $row['merchant_name']; ?></td>
                                                                <td><?php echo $row['market_name']; ?></td>
                                                                <td><?php echo $row['phone_no']; ?></td>
                                                                <td><?php echo $row['s_im_serial_no']; ?></td>
                                                                <td><?php echo $row['p_os_serial_no']; ?></td>
                                                                <td><?php echo $row['bank_branch']; ?></td>
                                                                <td><?php echo $row['accountnumber']; ?></td>
                                                                <td><?php echo $row['location']; ?></td>
                                                                <td><?php echo $row['user']; ?></td>
                                                                
                                                            </tr>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "No Record Found";
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                                                    <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
                                                </div>

                                                <ul class="pagination">
                                                    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } 
                                                    ?>

                                                    <li <?php if ($page_no <= 1) {
                                                            echo "class='disabled page-item'";
                                                        } ?>>
                                                        <a <?php if ($page_no > 1) {
                                                                echo "href='?page_no=$previous_page'";
                                                            } ?>>Previous</a>
                                                    </li>

                                                    <?php
                                                    if ($total_no_of_pages <= 10) {
                                                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                                                            if ($counter == $page_no) {
                                                                echo "<li class='active page-item'><a>$counter</a></li>";
                                                            } else {
                                                                echo "<li class='page-item'><a href='?page_no=$counter'>$counter</a></li>";
                                                            }
                                                        }
                                                    } elseif ($total_no_of_pages > 10) {

                                                        if ($page_no <= 4) {
                                                            for ($counter = 1; $counter < 8; $counter++) {
                                                                if ($counter == $page_no) {
                                                                    echo "<li class='active page-item'><a>$counter</a></li>";
                                                                } else {
                                                                    echo "<li class='page-item'><a href='?page_no=$counter'>$counter</a></li>";
                                                                }
                                                            }
                                                            echo "<li class='page-item'><a>...</a></li>";
                                                            echo "<li class='page-item'><a href='?page_no=$second_last'>$second_last</a></li>";
                                                            echo "<li class='page-item'><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                                        } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                                                            echo "<li class='page-item'><a href='?page_no=1'>1</a></li>";
                                                            echo "<li class='page-item'><a href='?page_no=2'>2</a></li>";
                                                            echo "<li class='page-item'><a>...</a></li>";
                                                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                                                                if ($counter == $page_no) {
                                                                    echo "<li class='active page-item'><a>$counter</a></li>";
                                                                } else {
                                                                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                                                }
                                                            }
                                                            echo "<li class='page-item'><a>...</a></li>";
                                                            echo "<li class='page-item'><a href='?page_no=$second_last'>$second_last</a></li>";
                                                            echo "<li class='page-item'><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                                        } else {
                                                            echo "<li class='page-item'><a href='?page_no=1'>1</a></li>";
                                                            echo "<li class='page-item'><a href='?page_no=2'>2</a></li>";
                                                            echo "<li class='page-item'><a>...</a></li>";

                                                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                                                if ($counter == $page_no) {
                                                                    echo "<li class='active page-item'><a>$counter</a></li>";
                                                                } else {
                                                                    echo "<li class='page-item'><a href='?page_no=$counter'>$counter</a></li>";
                                                                }
                                                            }
                                                        }
                                                    }
                                                    ?>

                                                    <li <?php if ($page_no >= $total_no_of_pages) {
                                                            echo "class='disabled page-item'";
                                                        } ?>>
                                                        <a <?php if ($page_no < $total_no_of_pages) {
                                                                echo "href='?page_no=$next_page'";
                                                            } ?>>Next</a>
                                                    </li>
                                                    <?php if ($page_no < $total_no_of_pages) {
                                                        echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                                                    } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Hover-table ] end -->
                            

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



<script>
    const data = {
        labels: [

            'active',
            'unactive'

        ],
        datasets: [{
            label: 'My First Dataset',
            data: [<?php
                    //    // require 'dbconfig.php';
                    $query = "
                                                                SELECT COUNT(active)as total
                                                                FROM terminal
                                                                WHERE `active`= 1 
                                                                
                                                                ";
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        echo $row['total'];
                    }

                    ?>,
                <?php
                //    // require 'dbconfig.php';
                $query = "
                                                                SELECT COUNT(active)as total
                                                                FROM terminal
                                                                WHERE `active`= 0
                                                                
                                                                ";
                $query_run = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($query_run)) {
                    echo $row['total'];
                }

                ?>
            ],
            backgroundColor: [
                'rgb(54, 162, 235)',
                'rgb(255, 99, 132)'
                

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
     function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    } 
</script>

<script>
     function mFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    } 
</script>