<?php
//include('security.php');
//include('access-s.php'); 
include('dbconfig.php');
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
                                        <h5>Search Results</h5>
                                        <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                                    </div>
                                    
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                        <?php
                                                if (isset($_POST['SearchBtn'])) {
                                                    $StartDate = $_POST['StartDate'];
                                                    $EndDate = $_POST['EndDate'];
                                                    $query = "SELECT date, service_name,COUNT(service_name) as countid,SUM(tran_amount) as sumamount,SUM(tran_fee) as sumfee
                                                    FROM transaction
                                                    WHERE date BETWEEN '$StartDate' AND '$EndDate'
                                                    GROUP BY service_name 
                                                     ";
                                                    $query_run = mysqli_query($connection, $query);
                                                ?>
                                            <table class="table table-hover"  id="myTable">
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
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                          
                                            </div>
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