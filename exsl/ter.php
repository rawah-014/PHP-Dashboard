<?php

$connection = mysqli_connect("localhost","root","","bdmw");
$sql = "SELECT *
FROM terminal";

$result = mysqli_query($connection, $sql);
$output ='<table>
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
</tr>';
while ($excel = mysqli_fetch_assoc($result)) 
{
    $output.='<tr>
  
    
                                                                    <th align = "center">'.$excel['id'].'</th>
                                                               <th align = "center">'.$excel['terminal_id'].'</th>
                                                                <th align = "center">'.$excel['active'].'</th>
                                                                    <th align = "center">'.$excel['merchant_id'].'</th>
                                                                    <th align = "center">'.$excel['merchant_name'].'</th>
                                                                    <th align = "center">'.$excel['market_name'].'</th>
                                                                    <th align = "center">'.$excel['phone_no'].'</th>
                                                                    <th align = "center">'.$excel['s_im_serial_no'].'</th>
                                                                    <th align = "center">'.$excel['p_os_serial_no'].'</th>
                                                                    <th align = "center">'.$excel['bank_branch'].'</th>
                                                                    <th align = "center">'.$excel['accountnumber'].'</th>
                                                                    <th align = "center">'.$excel['location'].'</th>
                                                                    <th align = "center">'.$excel['user'].'</th>
    </tr>';
}
$output.='</table>';
header('Content-Type:aplication/xls');
header('Content-Disposition:attachment;filename=excel.xls');
echo $output;
?>