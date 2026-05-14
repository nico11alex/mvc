<?php

// Colores
$pdf->SetFillColor(230,230,230);
$pdf->SetTextColor(0,0,0);

// ================== HEADER ==================
$pdf->SetFont('Arial','B',18);
$pdf->Cell(0,10,mb_convert_encoding('HOTEL ÉLARA', 'ISO-8859-1', 'UTF-8'),0,1,'C');

$pdf->SetFont('Arial','',12);
$pdf->Cell(0,8,'Factura de Reserva',0,1,'C');

$pdf->Ln(5);

// Línea
$pdf->SetDrawColor(0,0,0);
$pdf->Line(10,30,200,30);

$pdf->Ln(10);

// ================== INFO ==================
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'Fecha de emision:',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,8,date('d/m/Y'),0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,8,'Estado:',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,8,ucfirst($reserva['estado']),0,1);

$pdf->Ln(5);

// ================== TABLA ==================
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,'Habitacion',1,0,'C',true);
$pdf->Cell(40,10,'Categoria',1,0,'C',true);
$pdf->Cell(35,10,'Personas',1,0,'C',true);
$pdf->Cell(35,10,'Fechas',1,0,'C',true);
$pdf->Cell(40,10,'Precio',1,1,'C',true);

// Datos
$pdf->SetFont('Arial','',12);

$pdf->Cell(40,10,'#'.$reserva['num_habitacion'],1,0,'C');
$pdf->Cell(40,10,mb_convert_encoding($reserva['categoria'], 'ISO-8859-1', 'UTF-8'),1,0,'C');
$pdf->Cell(35,10,$reserva['num_personas'],1,0,'C');
$pdf->Cell(35,10,
    date('d/m', strtotime($reserva['fecha_inicio'])) . ' - ' .
    date('d/m', strtotime($reserva['fecha_final']))
,1,0,'C');
$pdf->Cell(40,10,'$'.number_format($reserva['precio']),1,1,'C');

$pdf->Ln(10);

// ================== TOTAL ==================
$pdf->SetFont('Arial','B',16);
$pdf->Cell(150,10,'TOTAL:',0,0,'R');
$pdf->Cell(40,10,'$'.number_format($reserva['precio']),0,1,'R');

$pdf->Ln(10);

// ================== METODO DE PAGO ==================
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60,8,'Metodo de pago:',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,8,$reserva['metodo_pago'],0,1);

$pdf->Ln(15);

// ================== FOOTER ==================
$pdf->SetFont('Arial','I',10);
$pdf->Cell(0,10,mb_convert_encoding('Gracias por su reserva - Hotel Élara', 'ISO-8859-1', 'UTF-8'),0,1,'C');

?>