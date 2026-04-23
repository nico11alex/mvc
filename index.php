<?php
session_start();
require_once 'models/conexion.php';
require_once 'config/config.php';
require_once 'controllers/controllerBase.php';
require_once 'models/user.php';
$controllerBase = new ControllerBase();
if(isset($_GET['action'])){
    if($_GET['action']=='getFormRegisterUser'){
        $controllerBase->index();
        $controllerBase->verPagina('views/html/auth/registro.php');
    }
    if($_GET['action']=='registerUser'){
        $controllerBase->registerUser($_POST);
    }
    if($_GET['action']=='getFormLogin'){
        $controllerBase->verPagina('views/html/auth/inicioDeSesion.php');
    }
    if($_GET['action']=='confirmLogin'){
        $controllerBase->logear($_POST);
    }
    if($_GET['action']=='accesoConcedido'){
        $controllerBase->verPagina('views/html/verReservas.php');
    }
    if($_GET['action']=='signOut'){
        $controllerBase->cerrarSesion();
    }
    if($_GET['action']=='getFormReservar'){
        $controllerBase->habitaciones();
        $controllerBase->metodoDePago();  
        $controllerBase->verPagina('views/html/reservar.php');
    }
    if($_GET['action']=='createReserva'){
        $controllerBase->reservar($_POST);
    }
}else{
    $controllerBase->verPagina('views/html/home.php');
}

?>