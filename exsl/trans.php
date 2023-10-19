<?php

$connection = mysqli_connect("localhost","root","","bdmw");
$sql = "SELECT service_name,COUNT(service_name) as countid,SUM(tran_amount) as sumamount,SUM(tran_fee) as sumfee
FROM transaction                                                    
GROUP BY service_name";

$result = mysqli_query($connection, $sql);
$output ='<table>
<tr>
<th>Trans Type</th>
                                                        <th>Total Trans Count</th>
                                                        <th>Total Amount</th>
                                                        <th>Total Fees</th>
</tr>';
while ($excel = mysqli_fetch_assoc($result)) 
{
    $output.='<tr>
    <th align = "center">'.$excel['service_name'].'</th>
                                                                <th align = "center">'.$excel['countid'].'</th>
                                                                <th align = "center">'.$excel['sumamount'].'</th>
                                                                <th align = "center">'.$excel['sumfee'].'</th>
    
    </tr>';
}
$output.='</table>';
header('Content-Type:aplication/xls');
header('Content-Disposition:attachment;filename=excel.xls');
echo $output;
?>