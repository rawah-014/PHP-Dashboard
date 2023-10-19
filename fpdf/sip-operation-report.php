<?php
require"fpdf.php";
include('../security.php');

class myPDF extends FPDF{
    function header(){
        //$this->Image('logo.png',10,6);
        $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'Operations Document',0,0,'C');
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
        $this->Cell(60,10,'ID',1,0,'C');
        $this->Cell(60,10,'Terminal ID',1,0,'C');
        $this->Cell(60,10,'Active',1,0,'C');
        $this->Ln();
    }
    function viewTable($connection){
        $this->SetFont('Times','B',12);
        $query = "SELECT *
        FROM terminal
        WHERE terminal_id LIKE '24%'
                                                     ";
        $query_run = mysqli_query($connection, $query);
        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                $this->Cell(60,10,$row['id'],1,0,'L');
                $this->Cell(60,10,$row['terminal_id'],1,0,'L');
                $this->Cell(60,10,$row['active'],1,0,'L');
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