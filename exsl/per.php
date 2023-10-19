<?php

$connection = mysqli_connect("localhost","root","","bdmw");
$sql = "SELECT terminal_id,COUNT(id) as countid,SUM(tran_amount) as sumamount,SUM(tran_fee) as sumfee
FROM transaction
GROUP BY terminal_id";

$result = mysqli_query($connection, $sql);
$output ='<table>
<tr>
<th>Terminal ID</th>
<th>Total Count</th>
<th>Total Amount</th>

<th>Total fee</th>
</tr>';
while ($excel = mysqli_fetch_assoc($result)) 
{
    $output.='<tr>
    <th align = "center">'.$excel['terminal_id'].'</th>
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