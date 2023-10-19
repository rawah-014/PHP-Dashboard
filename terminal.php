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
                            
                           

                            <!-- [ Hover-table ] start -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Trans Type Report</h5>
                                        <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                                    </div>
                                    <div class="card-header bg-light">
                                         <form method="POST" action="terminal-search.php">
                                                <div class="form-group row ">
                                                    <label class="col-sm-2 col-form-label">Start Date </label>
                                                    <div class="col-sm-3">
                                                        <input type="date" class="form-control" require placeholder="Type the start period date" id="pickupdate" name="StartDate">
                                                    </div>
                                                    <label class="col-sm-2 col-form-label">End Date </label>
                                                    <div class="col-sm-3">
                                                        <input type="date" class="form-control" require placeholder="Type the end period  date" id="pickupdate" name="EndDate">
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
                                                        <input type="text" class="form-control" require placeholder="Enter Trans Type to Search This Table" id="myInput" onkeyup="myFunction()">
                                                    </div>
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-2 ml-2">
                                                        <a href="exsl/trans.php">
                                                            <button class="btn btn-outline-primary btn-round btn-sm"><i class="fa fa-download" type="submit" name="excel" value="Download Excel"></i>
                                                            <a href="exsl/trans.php"><input type="submit" name="excel" value="Download Excel" style=" background-color: white;
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
                                                $query = "SELECT service_name,COUNT(service_name) as countid,SUM(tran_amount) as sumamount,SUM(tran_fee) as sumfee
                                                     FROM transaction                                                    
                                                     GROUP BY service_name
                                                     ";
                                                $query_run = mysqli_query($connection, $query);
                                                ?>
                                            <table class="table table-hover" id="myTable" >
                                                <thead>

                                                    <tr>
                                                    <th>Trans Type</th>
                                                        <th>Total Trans Count</th>
                                                        <th>Total Amount</th>
                                                        <th>Total Fees</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (mysqli_num_rows($query_run) > 0) {
                                                        while ($row = mysqli_fetch_assoc($query_run)) {
                                                    ?>
                                                            <tr>
                                                            <td><?php echo $row['service_name']; ?></td>
                                                                <td><?php echo number_format($row['countid']); ?></td>
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
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Hover-table ] end -->



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