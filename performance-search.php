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
                                            <div class="row p-0">
                                                    <label class="col-sm-2 col-form-label">Filter Rows </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" require placeholder="Enter Terminal id to Search This Table" id="myInput" onkeyup="myFunction()">
                                                    </div>
                                                    <div class="col-sm-3"></div>
                                                   
                                                </div>
                                    </div>
                                    
                                    <div class="card-block table-border-style mt-0 pt-0">
                                        <div class="table-responsive">
                                        <?php
                                                if (isset($_POST['SearchBtn'])) {
                                                    $StartDate = $_POST['StartDate'];
                                                    $EndDate = $_POST['EndDate'];
                                                    $query = "SELECT terminal_id,COUNT(id) as countid,SUM(tran_amount) as sumamount,SUM(tran_fee) as sumfee
                                                     FROM transaction
                                                     WHERE  date BETWEEN '$StartDate' AND '$EndDate'
                                                     GROUP BY terminal_id 
                                                     ";
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
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                   
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