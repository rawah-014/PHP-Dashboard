<?php
require"fpdf.php";
include('../security.php');

class myPDF extends FPDF{
    function header(){
        //$this->Image('logo.png',10,4);
        $this->SetFont('Arial','B',14);
        $this->Cell(274,5,'Transactions Document',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(274,10,'CITS net',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
        $this->SetFont('Times','B',12);
        $this->Cell(20,10,'ID',1,0,'C');
        $this->Cell(35,10,'Terminal ID',1,0,'C');
        $this->Cell(35,10,'Date',1,0,'C');
        $this->Cell(35,10,'Tran Amount',1,0,'C');
        $this->Cell(35,10,'Tran Fee',1,0,'C');
        $this->Cell(35,10,'Tran Type',1,0,'C');
        $this->Cell(35,10,'Response',1,0,'C');
        $this->Cell(35,10,'Reference Number',1,0,'C');
        
        $this->Ln();
    }
    function viewTable($connection){
        $this->SetFont('Times','B',12);
        $query = "SELECT id,terminal_id,date,tran_amount,tran_fee,service_name,response_status,reference_number
        FROM transactiondata
        WHERE terminal_id LIKE '14%'
        LIMIT 0,729687                                          ";
        $query_run = mysqli_query($connection, $query);
        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                $this->Cell(20,10,$row['id'],1,0,'L');
                $this->Cell(35,10,$row['terminal_id'],1,0,'L');
                $this->Cell(35,10,$row['date'],1,0,'L');
                $this->Cell(35,10,number_format($row['tran_amount']),1,0,'L');
                $this->Cell(35,10,number_format($row['tran_fee']),1,0,'L');
                $this->Cell(35,10,$row['service_name'],1,0,'L');
                $this->Cell(35,10,$row['response_status'],1,0,'L');
                $this->Cell(35,10,$row['reference_number'],1,0,'L');
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