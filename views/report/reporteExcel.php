<?php

use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

// ================= TITULO =================

$sheet->mergeCells('A1:H1');

$sheet->setCellValue('A1', 'REPORTE DE TUS RESERVAS - HOTEL ELARA');

$sheet->getStyle('A1')->getFont()->setBold(true)->setSize(18);

$sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

$sheet->setCellValue('A2', 'Fecha: '.date('d/m/Y'));


// ================= ENCABEZADOS =================

$headers = [
    'A4' => 'Habitación',
    'B4' => 'Categoría',
    'C4' => 'Personas',
    'D4' => 'Precio',
    'E4' => 'Fecha Inicio',
    'F4' => 'Fecha Final',
    'G4' => 'Método Pago',
    'H4' => 'Estado'
];

foreach($headers as $celda => $texto){
    $sheet->setCellValue($celda, $texto);
}

// Estilo encabezados
$sheet->getStyle('A4:H4')->applyFromArray([
    'font' => [
        'bold' => true,
        'color' => ['rgb' => 'FFFFFF']
    ],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => ['rgb' => '1F4E78']
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER
    ]
]);


// ================= DATOS =================

$fila = 5;

foreach($reservasUsuario as $reserva){

    $sheet->setCellValue('A'.$fila, $reserva['num_habitacion']);
    $sheet->setCellValue('B'.$fila, $reserva['categoria']);
    $sheet->setCellValue('C'.$fila, $reserva['num_personas']);
    $sheet->setCellValue('D'.$fila, $reserva['precio']);
    $sheet->setCellValue('E'.$fila, $reserva['fecha_inicio']);
    $sheet->setCellValue('F'.$fila, $reserva['fecha_final']);
    $sheet->setCellValue('G'.$fila, $reserva['metodo_pago']);
    $sheet->setCellValue('H'.$fila, ucfirst($reserva['estado']));

    $fila++;
}


// ================= FORMATO PRECIO =================

$sheet->getStyle('D5:D'.$fila)
    ->getNumberFormat()
    ->setFormatCode('"$"#,##0');


// ================= BORDES =================

$sheet->getStyle('A4:H'.($fila-1))->applyFromArray([
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN
        ]
    ]
]);


// ================= AUTO SIZE =================

foreach(range('A','H') as $columna){
    $sheet->getColumnDimension($columna)->setAutoSize(true);
}


// ================= FILTROS =================

$sheet->setAutoFilter('A4:H4');


// ================= CENTRAR =================

$sheet->getStyle('A4:H'.$fila)
->getAlignment()
->setHorizontal(Alignment::HORIZONTAL_CENTER);