<?php
session_start();
require_once 'models/conexion.php';
require_once 'config/config.php';
require_once 'controllers/controllerBase.php';
require_once 'models/user.php';
$controllerBase = new ControllerBase();
$controllerBase->index();
if(isset($_GET['action'])){
    if($_GET['action']=='getFormRegisterUser'){
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
        $controllerBase->verPagina('views/html/reservas.php');
    }
    if($_GET['action']=='signOut'){
        $controllerBase->cerrarSesion();
    }
}else{
    $controllerBase->verPagina('views/html/home.php');
}

?>