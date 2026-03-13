<?php
include 'koneksi.php';
require('fpdf/fpdf.php'); // pastikan sudah download FPDF di folder fpdf/

if(!isset($_GET['id'])){
    die("ID alumni tidak ditemukan.");
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM alumni WHERE id='$id'");
$alumni = mysqli_fetch_assoc($result);

if(!$alumni){
    die("Data alumni tidak ditemukan.");
}

// Membuat PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Bukti Hasil Pelacakan Alumni',0,1,'C');
$pdf->Ln(10);

$pdf->SetFont('Arial','',12);
$pdf->Cell(50,10,'Nama',0,0);
$pdf->Cell(0,10,': '.$alumni['nama'],0,1);

$pdf->Cell(50,10,'Instansi',0,0);
$pdf->Cell(0,10,': '.$alumni['instansi'],0,1);

$pdf->Cell(50,10,'Kota',0,0);
$pdf->Cell(0,10,': '.$alumni['kota'],0,1);

$pdf->Cell(50,10,'Bidang',0,0);
$pdf->Cell(0,10,': '.$alumni['bidang'],0,1);

$pdf->Cell(50,10,'Status',0,0);
$pdf->Cell(0,10,': '.$alumni['status'],0,1);

$pdf->Cell(50,10,'Confidence',0,0);
$pdf->Cell(0,10,': '.$alumni['confidence_score'].'%',0,1);

// Output PDF dan download
$pdf->Output('D','Bukti_'.$alumni['nama'].'.pdf');
?>