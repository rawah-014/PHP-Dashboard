<?php

$connection = mysqli_connect("localhost","root","","bdmw");
$sql = "SELECT *
FROM transaction";

$result = mysqli_query($connection, $sql);
$output ='<table>
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
</tr>';
while ($excel = mysqli_fetch_assoc($result)) 
{
    $output.='<tr>
    <th align = "center">'.$excel['id'].'</th>
    <th align = "center">'.$excel['client_id'].'</th>
    <th align = "center">'.$excel['terminal_id'].'</th>
    <th align = "center">'.$excel['tran_date_time'].'</th>
    <th align = "center">'.$excel['date'].'</th>
    <th align = "center">'.$excel['time'].'</th>
    <th align = "center">'.$excel['tran_amount'].'</th>
    <th align = "center">'.$excel['tran_fee'].'</th>
    <th align = "center">'.$excel['reference_number'].'</th>
    <th align = "center">'.$excel['response_status'].'</th>
    <th align = "center">'.$excel['service_name'].'</th>
    <th align = "center">'.$excel['user'].'</th>
    <th align = "center">'.$excel['system_trace_audit_number'].'</th>
    <th align = "center">'.$excel['p_an'].'</th>
    <th align = "center">'.$excel['mobile_no'].'</th>
    <th align = "center">'.$excel['exp_date'].'</th>
    <th align = "center">'.$excel['tran_currency_code'].'</th>
    <th align = "center">'.$excel['additional_amount'].'</th>
    <th align = "center">'.$excel['payee_id'].'</th>
    <th align = "center">'.$excel['personal_payment_info'].'</th>
    <th align = "center">'.$excel['to_card'].'</th>
    <th align = "center">'.$excel['to_account'].'</th>
    <th align = "center">'.$excel['cash_back_amount'].'</th>
    <th align = "center">'.$excel['response_code'].'</th>
    <th align = "center">'.$excel['additional_data'].'</th>
    <th align = "center">'.$excel['payees_count'].'</th>
    <th align = "center">'.$excel['working_key'].'</th>
    <th align = "center">'.$excel['service_id'].'</th>
    <th align = "center">'.$excel['phone_number'].'</th>
    <th align = "center">'.$excel['phone'].'</th>
    <th align = "center">'.$excel['approval_code'].'</th>
    </tr>';
}
$output.='</table>';
header('Content-Type:aplication/xls');
header('Content-Disposition:attachment;filename=excel.xls');
echo $output;
?>