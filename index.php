<?php
session_start();
require "controllers/controladorRegistro.php";
require "views/registro.php";
$registro = new ControladorRegistro();
if($_GET['action']=='Registro'){
    $registro->registro();
}elseif($_GET['action']=='Validaciones'){
    $registro->validacion($_POST);   
}else{
    header("Location: views/home.php");
}

?>