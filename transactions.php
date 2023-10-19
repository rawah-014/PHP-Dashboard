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
                                        <h5>Transactions Table</h5>
                                        <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                                    </div>
                                    <div class="card-header bg-light">
                                    <form method="POST" action="transaction-search.php">
                                                <div class="form-group row ">
                                                    <label class="col-sm-2 col-form-label">Start Date </label>
                                                    <div class="col-sm-3">
                                                        <input type="date" class="form-control" required placeholder="Type the start period date" id="pickupdate" name="StartDate">
                                                    </div>
                                                    <label class="col-sm-2 col-form-label">End Date </label>
                                                    <div class="col-sm-3">
                                                        <input type="date" class="form-control" required placeholder="Type the end period  date" id="pickupdate" name="EndDate">
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
                                                        <a href="exsl/excel.php">
                                                            <button class="btn btn-outline-primary btn-round btn-sm"><i class="fa fa-download" type="submit" name="excel" value="Download Excel"></i>
                                                            <a href="exsl/excel.php"><input type="submit" name="excel" value="Download Excel" style=" background-color: white;
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

                                            $result_count = mysqli_query($connection, "SELECT COUNT(id) As total_records 
                                                    FROM `transaction`
                                                    ");
                                            $total_records = mysqli_fetch_array($result_count);
                                            $total_records = $total_records['total_records'];
                                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                            $second_last = $total_no_of_pages - 1; // total page minus 1

                                            $query = "SELECT *
                                                        FROM transaction
                                                        
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



                            <?php
                            include('include/script.php');

                            include('include/footer.php');
                            ?>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  fill_datatable();
  
  function fill_datatable(filter_gender = '', filter_country = '')
  {
   var dataTable = $('#myTable').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "searching" : false,
    "ajax" : {
     url:"fetch.php",
     type:"POST",
     data:{
      filter_gender:filter_gender, filter_country:filter_country
     }
    }
   });
  }
  
  $('#filter').click(function(){
   var filter_gender = $('#filter_gender').val();
   var filter_country = $('#filter_country').val();
   if(filter_gender != '' && filter_country != '')
   {
    $('#customer_data').DataTable().destroy();
    fill_datatable(filter_gender, filter_country);
   }
   else
   {
    alert('Select Both filter option');
    $('#customer_data').DataTable().destroy();
    fill_datatable();
   }
  });
  
  
 });
 
</script>
<script>
     function myFunction() {
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