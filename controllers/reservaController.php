<?php
class ReservarController{
        public function reservar($datos){
            unset($_SESSION['errores_reserva']);
            unset($_SESSION['old']);
            $reserva = new Reserva();
            $errores = $this->validarDatos($datos);
            if($errores != []){
                $_SESSION['errores_reserva'] = $errores;
                $_SESSION['old']=$datos;
                header('location: ' .SITE_URL. 'index.php?action=getFormReservar');
                exit;
            }
            $id = $_SESSION['datosUsuario'][0]['id'];
            $numPersonas = (int)$datos['adultos'] + (int)$datos['menores'];
            $fechaInicio = new DateTime($datos['fecha_inicio']);
            $fechaFin = new DateTime($datos['fecha_fin']);
            $noches = $fechaInicio->diff($fechaFin)->days;
            $precio = $reserva->getPrecioHabitacion($datos['habitacion_id']) * $noches;
            
            if($reserva->crearReserva($datos, $id,$numPersonas,$precio)){
                header('Location: index.php?action=misReservas');
            } else {
                header('Location: index.php?action=getFormReservar');
            }
        }

        public function validarDatos($datos){
            $numAdultos = (int)$datos['adultos']; 
            $idMetodoDePago = $datos['id_metodo_pago'];
            $hoy = new DateTime('today');
            $errores = [];
            $categorias = $datos['categoria_id'];
            $habitacion = $datos['habitacion_id'];

            if(empty($datos['fecha_inicio'])){
                $errores['fecha_inicio'] = "La fecha de ingreso es obligatoria."; 
            }

            if(empty($datos['fecha_fin'])){
                $errores['fecha_final'] = "La fecha de llegada es obligatoria."; 
            }

            $fechaInicio = new DateTime($datos['fecha_inicio']);
            $fechaFin = new DateTime($datos['fecha_fin']);

            if($numAdultos <=0){
                $errores['adultos'] = "Debe haber minino 1 Adulto.";
            }
        
            if($fechaInicio < $hoy){
                $errores['fecha_inicio'] = "La fecha de inicio no puede ser anterior a hoy."; 
            }

            if($fechaFin <= $fechaInicio){
                $errores['fecha_final'] = "La fecha de salida debe ser posterior a la de llegada";
            }

            if($categorias == ""){
                $errores['categorias'] = "Debes escoger una categoria";
            }

            if($habitacion == ""){
                $errores['habitacion_id'] = "Debes escoger una habitación";
            }

            if($idMetodoDePago == ""){
                $errores['id_metodo_pago'] = "Debes escoger una metodo de pago";
            }

            return $errores;
        }

        public function getReservaById($id){
            $reserva = new Reserva();
            return $reserva->getById($id);
        }

        public function actualizarReserva($datos){
            $reserva = new Reserva();
            $errores = $this->validarDatos($datos);
            if($errores != []){
                $_SESSION['errores_reserva'] = $errores;
                $_SESSION['old']=$datos;
                header('location: ' .SITE_URL. 'index.php?action=getFormReservar');
                exit;
            }
            $reserva->actualizar($datos);
            header('Location: index.php?action=misReservas');
            
        }

        public function misReservas(){
            $id = $_SESSION['datosUsuario'][0]['id'];
            $reserva = new Reserva();
            return $reserva->reservasHechas($id);
        }

        public function obtenerCategorias(){
            $reserva = new Reserva();
            return $reserva->categorias();
        }

        public function metodoDePago(){
            $reserva = new Reserva();
            return $reserva->getMetodosPago();
        }

        public function habitaciones(){
            header('Content-Type: application/json');
            $tipoHabitacionId = isset($_GET['tipoRoom']) ? (int) $_GET['tipoRoom']:0;
            $habitaciones = [];
            $reserva = new Reserva();
            $habitaciones = $reserva->getHabitacionesPorCategoria($tipoHabitacionId);
            echo json_encode(['ok' => true, 'data' => $habitaciones]);
        }

        public function cancelarReserva($id){
            $reserva = new Reserva();
            $reserva->cambiarACancelado($id);
            header('Location: index.php?action=misReservas');
        }

}

?>