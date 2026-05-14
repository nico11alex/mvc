<?php
session_start();
require_once 'models/conexion.php';
require_once 'config/config.php';
require_once 'controllers/authController.php';
require_once 'controllers/reservaController.php';
require_once 'controllers/controlController.php';
require_once 'models/user.php';
require_once 'models/reserva.php';
require_once 'models/reportes.php';
require_once 'libs/fpdf/fpdf.php';
require_once 'controllers/reportesController.php';
require_once 'vendor/autoload.php';
require_once 'controllers/emailsControler.php';

$authController = new AuthController();
$control = new Control();
$reservaController = new ReservarController();
$reportesController = new ReportesControllers();

if(isset($_GET['action'])){
    if($_GET['action']=='getFormRegisterUser'){
        $authController->traerTiposDocumentos();
        $control->verPagina('views/html/auth/registro.php');
    }
    if($_GET['action']=='registerUser'){
        $authController->registerUser($_POST);
    }
    if($_GET['action']=='getFormLogin'){
        $control->verPagina('views/html/auth/inicioDeSesion.php');
    }
    if($_GET['action']=='confirmLogin'){
        $authController->logear($_POST);
    }
    if($_GET['action']=='accesoConcedido'){
        $control->verPagina('views/html/dashboard/verReservas.php');
    }
    if($_GET['action']=='signOut'){
        $control->cerrarSesion();
    }
    if($_GET['action']=='getFormReservar'){
        $categorias = $reservaController->obtenerCategorias();
        $metodos = $reservaController->metodoDePago();
        include 'views/html/dashboard/reservar.php';
    }
    if($_GET['action']=='createReserva'){
        $reservaController->reservar($_POST);
    }
    if($_GET['action']=='getHabitaciones'){
        $reservaController->getHabitaciones();
    }
    if($_GET['action']=='rooms'){
        $reservaController->habitaciones();
    }
    if($_GET['action']=='misReservas'){
        $reservas = $reservaController->misReservas();
        include 'views/html/dashboard/verReservas.php';
    }
    if($_GET['action']=='editarReserva'){
        $categorias = $reservaController->obtenerCategorias();
        $metodos = $reservaController->metodoDePago();
        $reserva = $reservaController->getReservaById($_GET['id']);
        include 'views/html/dashboard/updateReserva.php';
    }
    if($_GET['action']=='updateReserva'){
        $reservaController->actualizarReserva($_POST);
    }
    if($_GET['action']=='cancelarReserva'){
        $reservaController->cancelarReserva($_GET['id']);
    }
    if($_GET['action']=='pdf'){
        $reportesController->generarPDF($_GET['id']);
        exit;
    }
    if($_GET['action']=='excel'){
        $reportesController->generarExcel($_GET['id']);
    }
}else{
    $control->verPagina('views/html/dashboard/home.php');
}

?>