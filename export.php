<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "bdmw");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM transaction";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
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
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
    <td scope="row"><?php echo $row["id"]; ?></td>
    <td><?php echo $row["client_id"]; ?></td>
    <td><?php echo $row["terminal_id"]; ?></td>
    <td><?php echo $row["tran_date_time"]; ?></td>
    <td><?php echo $row["date"]; ?></td>
    <td><?php echo $row["time"]; ?></td>
    <td><?php echo $row["tran_amount"]; ?></td>
    <td><?php echo $row["tran_fee"]; ?></td>
    <td><?php echo $row["reference_number"]; ?></td>
    <td><?php echo $row["response_status"]; ?></td>
    <td><?php echo $row["service_name"]; ?></td>
    <td><?php echo $row["user"]; ?></td>
    <td><?php echo $row["system_trace_audit_number"]; ?></td>
    <td><?php echo $row["p_an"]; ?></td>
    <td><?php echo $row["mobile_no"]; ?></td>
    <td><?php echo $row["exp_date"]; ?></td>
    <td><?php echo $row["tran_currency_code"]; ?></td>
    <td><?php echo $row["additional_amount"]; ?></td>
    <td><?php echo $row["payee_id"]; ?></td>
    <td><?php echo $row["personal_payment_info"]; ?></td>
    <td><?php echo $row["to_card"]; ?></td>
    <td><?php echo $row["to_account"]; ?></td>
    <td><?php echo $row["cash_back_amount"]; ?></td>
    <td><?php echo $row["response_code"]; ?></td>
    <td><?php echo $row["additional_data"]; ?></td>
    <td><?php echo $row["payees_count"]; ?></td>
    <td><?php echo $row["working_key"]; ?></td>
    <td><?php echo $row["service_id"]; ?></td>
    <td><?php echo $row["phone_number"]; ?></td>
    <td><?php echo $row["phone"]; ?></td>
    <td><?php echo $row["approval_code"]; ?></td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: tran/xlsx');
  header('Content-Disposition: attachment; filename=tran/xlsx');
  echo $output;
 }
}
?>
