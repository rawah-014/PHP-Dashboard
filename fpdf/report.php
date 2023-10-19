<?php
require"fpdf.php";
include('../security.php');

class myPDF extends FPDF{
    function header(){
        //$this->Image('logo.png',10,6);
        $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'Transactions Document',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'CITS net',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
        $this->SetFont('Times','B',12);
        $this->Cell(60,10,'Trans Type',1,0,'C');
        $this->Cell(60,10,'Total Trans Count',1,0,'C');
        $this->Cell(60,10,'Total Amount',1,0,'C');
        $this->Cell(60,10,'Total Fees',1,0,'C');
        $this->Ln();
    }
    function viewTable($connection){
        $this->SetFont('Times','B',12);
        $query = "SELECT service_name,COUNT(service_name) as countid,SUM(tran_amount) as sumamount,SUM(tran_fee) as sumfee
                                                     FROM transactiondata
                                                     WHERE terminal_id LIKE '24%'
                                                     GROUP BY service_name
                                                     ";
        $query_run = mysqli_query($connection, $query);
        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                $this->Cell(60,10,$row['service_name'],1,0,'L');
                $this->Cell(60,10,number_format($row['countid']),1,0,'L');
                $this->Cell(60,10,number_format($row['sumamount']),1,0,'L');
                $this->Cell(60,10,number_format($row['sumfee']),1,0,'L');
                $this->Ln();
            }
        }
    }
    
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($connection);
$pdf->Output();