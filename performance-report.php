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
    echo $row['count'];
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
                   
                            <!-- [ Hover-table ] start -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Terminals Performance Table</h5>
                                        <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                                    </div>
                                    <div class="card-header bg-light">
                                    <form method="POST" action="performance-search.php">
                                                <div class="form-group row ">
                                                    <label class="col-sm-2 col-form-label">Start Date </label>
                                                    <div class="col-sm-3">
                                                        <input type="date" required class="form-control" require placeholder="Type the start period date" id="pickupdate" name="StartDate">
                                                    </div>
                                                    <label class="col-sm-2 col-form-label">End Date </label>
                                                    <div class="col-sm-3">
                                                        <input type="date" required class="form-control" require placeholder="Type the end period  date" id="pickupdate" name="EndDate">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button class="btn btn-outline-primary btn-round btn-sm" type="submit" name="SearchBtn">Search
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="row p-0">
                                                    <label class="col-sm-2 col-form-label">Filter Rows </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" require placeholder="Enter Terminal id to Search This Table" id="myInput" onkeyup="myFunction()">
                                                    </div>
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-2 ml-2">
                                                        <a href="exsl/per.php">
                                                            <button class="btn btn-outline-primary btn-round btn-sm"><i class="fa fa-download" type="submit" name="excel" value="Download Excel"></i>
                                                            <a href="exsl/per.php"><input type="submit" name="excel" value="Download Excel" style=" background-color: white;
                                                                border: none;
                                                                }"></a>
                                                            </button>
                                                        </a>
                                                        </div>
                                                </div>
                                    </div>
                                    
                                    <div class="card-block table-border-style mt-0 pt-0">
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

                                            $result_count = mysqli_query($connection, "SELECT COUNT(terminal_id) As total_records 
                                                    FROM `transaction`
                                                    
                                                    ");
                                            $total_records = mysqli_fetch_array($result_count);
                                            $total_records = $total_records['total_records'];
                                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                            $second_last = $total_no_of_pages - 1; // total page minus 1

                                            $query = "SELECT terminal_id,COUNT(id) as countid,SUM(tran_amount) as sumamount,SUM(tran_fee) as sumfee
                                            FROM transaction
                                            GROUP BY terminal_id
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
                                                    <th>Terminal ID</th>
                                                            <th>Total Count</th>
                                                            <th>Total Amount</th>

                                                            <th>Total fee</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                <?php
                                                        if (mysqli_num_rows($query_run) > 0) {
                                                            while ($row = mysqli_fetch_assoc($query_run)) {
                                                        ?>
                                                                <tr>

                                                                    <td><?php echo $row['terminal_id']; ?></td>
                                                                    <td><?php echo $row['countid']; ?></td>
                                                                    <td><?php echo number_format($row['sumamount']); ?></td>
                                                                    <td><?php echo number_format($row['sumfee']); ?></td>


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
     function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
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