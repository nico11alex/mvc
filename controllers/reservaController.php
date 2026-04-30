<?php
class ReservarController{
        public function reservar($datos){
            $reserva = new Reserva();
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

        public function getReservaById($id){
            $reserva = new Reserva();
            return $reserva->getById($id);
        }

        public function actualizarReserva($datos){
            $reserva = new Reserva();
            if($reserva->actualizar($datos)){
                header('Location: index.php?action=misReservas');
            }
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