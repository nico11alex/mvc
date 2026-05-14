<?php
class ReportesControllers{
    public function generarPDF($id){
        $reservas = new Reserva();
        $reserva = $reservas->getById($id);

        $pdf = new FPDF();
        $pdf->AddPage();

        include 'views/report/reservaPDF.php';

        $pdf->Output('D', 'reserva.pdf');
        exit;
    }

    public function generarExcel($id){
        $reporte = new Reporte();
        $reservasUsuario = $reporte->infoReporte($id);
        $excel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $excel->getActiveSheet();
        
        include 'views/report/reporteExcel.php';
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        header('Content-Disposition: attachment; filename="reservas.xlsx"');
        
        header('Cache-Control: max-age=0');
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($excel);
        if (ob_get_length()) {
            ob_clean();
        }
        $writer->save('php://output');
        exit;
    }
}
?>