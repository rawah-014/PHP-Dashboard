<?php
include('security.php');
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
                                                    $query = "SELECT *
                                                    FROM transaction
                                                    WHERE  date BETWEEN '$StartDate' AND '$EndDate'
                                                     
                                                     ";
                                                    $query_run = mysqli_query($connection, $query);
                                                ?>
                                            <table class="table table-hover"  id="myTable">
                                                <thead>

                                                    <tr>
                                                        <th>id</th>
                                                        <th>client id</th>
                                                        <th>terminal id</th>
                                                        <th>tran date time</th>
                                                        <th>date</th>
                                                        <th>time</th>
                                                        <th>tran amount</th>
                                                        <th>tran fee</th>
                                                        <th>reference number</th>
                                                        <th>response status</th>
                                                        <th>service name</th>
                                                        <th>user</th>
                                                        <th>system trace audit number</th>
                                                        <th>p_an</th>
                                                        <th>mobile no</th>
                                                        <th>exp date</th>
                                                        <th>tran currency code</th>
                                                        <th>additional amount</th>
                                                        <th>payee id</th>
                                                        <th>personal payment info</th>
                                                        <th>to card</th>
                                                        <th>to account</th>
                                                        <th>cash back amount</th>
                                                        <th>response code</th>
                                                        <th>additional data</th>
                                                        <th>payees count</th>
                                                        <th>working key</th>
                                                        <th>service id</th>
                                                        <th>phone number</th>
                                                        <th>phone</th>
                                                        <th>approval code</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                <?php
                                                        if (mysqli_num_rows($query_run) > 0) {
                                                            while ($row = mysqli_fetch_assoc($query_run)) {
                                                        ?>
                                                            <tr>
                                                                <td scope="row"><?php echo $row['id']; ?></td>
                                                                <td><?php echo $row['client_id']; ?></td>
                                                                <td><?php echo $row['terminal_id']; ?></td>
                                                                <td><?php echo $row['tran_date_time']; ?></td>
                                                                <td><?php echo $row['date']; ?></td>
                                                                <td><?php echo $row['time']; ?></td>
                                                                <td><?php echo $row['tran_amount']; ?></td>
                                                                <td><?php echo $row['tran_fee']; ?></td>
                                                                <td><?php echo $row['reference_number']; ?></td>
                                                                <td><?php echo $row['response_status']; ?></td>
                                                                <td><?php echo $row['service_name']; ?></td>
                                                                <td><?php echo $row['user']; ?></td>
                                                                <td><?php echo $row['system_trace_audit_number']; ?></td>
                                                                <td><?php echo $row['p_an']; ?></td>
                                                                <td><?php echo $row['mobile_no']; ?></td>
                                                                <td><?php echo $row['exp_date']; ?></td>
                                                                <td><?php echo $row['tran_currency_code']; ?></td>
                                                                <td><?php echo $row['additional_amount']; ?></td>
                                                                <td><?php echo $row['payee_id']; ?></td>
                                                                <td><?php echo $row['personal_payment_info']; ?></td>
                                                                <td><?php echo $row['to_card']; ?></td>
                                                                <td><?php echo $row['to_account']; ?></td>
                                                                <td><?php echo $row['cash_back_amount']; ?></td>
                                                                <td><?php echo $row['response_code']; ?></td>
                                                                <td><?php echo $row['additional_data']; ?></td>
                                                                <td><?php echo $row['payees_count']; ?></td>
                                                                <td><?php echo $row['working_key']; ?></td>
                                                                <td><?php echo $row['service_id']; ?></td>
                                                                <td><?php echo $row['phone_number']; ?></td>
                                                                <td><?php echo $row['phone']; ?></td>
                                                                <td><?php echo $row['approval_code']; ?></td>
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