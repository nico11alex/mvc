<?php
class Reserva{
    public function crearReserva($data,$id,$numPersonas,$precio){
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "INSERT INTO reservas(id_users,id_habitacion,fecha_inicio,fecha_final,num_personas,estado,precio,id_metodo_pago)
        VALUES ($id,'$data[habitacion_id]','$data[fecha_inicio]','$data[fecha_fin]',$numPersonas,'realizado',$precio,'$data[id_metodo_pago]')";
        $conexion->query($sql);
        $result = $conexion->getResult();
        $filas = $conexion->getFilasAfectadas();
        $conexion->desconectar();
        return $filas > 0;
    }

    public function getPrecioHabitacion($id){
        $conexion = new Conexion();
        $conexion->conectar();
        $conexion->queryPreparada("SELECT precio FROM habitaciones WHERE id = ?", 'i', $id);
        $hab = $conexion->getResult()->fetch_assoc();
        $conexion->desconectar();
        return $hab['precio'];
    }

    public function getMetodosPago() {
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "SELECT id, name FROM metodos_de_pago";
        $conexion->query($sql);
        $result = $conexion->getResult();
        $_SESSION['metodoDePago'] = $result->fetch_all(MYSQLI_ASSOC);
        $conexion->desconectar();
        return $_SESSION['metodoDePago'];
    }

    public function reservasHechas($id) {
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "SELECT r.id, h.num_habitacion, r.fecha_inicio, r.fecha_final, r.estado 
        FROM reservas r 
        JOIN habitaciones h ON r.id_habitacion = h.id 
        WHERE r.id_users = $id and r.estado = 'realizado'";
        $conexion->query($sql);
        $result = $conexion->getResult();
        $_SESSION['reservas'] = $result->fetch_all(MYSQLI_ASSOC);
        $conexion->desconectar();
        return $_SESSION['reservas'];
    }

    public function categorias(){
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "SELECT * FROM categorias";  
        $conexion->query($sql);
        $result = $conexion->getResult();
        $_SESSION['categorias'] = $result->fetch_all(MYSQLI_ASSOC);        
        $conexion->desconectar();
        return $_SESSION['categorias'];
    }

    public function getHabitacionesPorCategoria($categoriaId){
        $conexion = new Conexion();
        $conexion->conectar();
        $conexion->queryPreparada("SELECT id, num_habitacion FROM habitaciones WHERE id_categorias = ? AND id_estado = '1'", 'i', $categoriaId);
        $filas = $conexion->getResult()->fetch_all(MYSQLI_ASSOC);
        $conexion->desconectar();
        return $filas;

    }

    public function actualizar($data){
        $conexion = new Conexion();
        $conexion->conectar();
        $noches = (new DateTime($data['fecha_inicio']))->diff(new DateTime($data['fecha_fin']))->days;
        $precio = $this->getPrecioHabitacion($data['habitacion_id']) * $noches;
        $conexion->queryPreparada(
            "UPDATE reservas SET fecha_inicio=?, fecha_final=?, num_personas=?, id_habitacion=?, id_metodo_pago=?, precio=? WHERE id=?",
            'ssiiddi', $data['fecha_inicio'], $data['fecha_fin'], $data['num_personas'], $data['habitacion_id'], $data['id_metodo_pago'], $precio, $data['id']
        );
        $filas = $conexion->getFilasAfectadas();
        $conexion->desconectar();
        return $filas > 0;
    }

    public function getById($id){
        $conexion = new Conexion();
        $conexion->conectar();
        $conexion->queryPreparada("SELECT r.id,r.fecha_inicio,r.fecha_final,r.num_personas,r.estado,r.precio,h.id as id_habitacion,h.num_habitacion,c.id as id_categoria,c.name, r.id_metodo_pago,m.name
            FROM reservas r 
            JOIN habitaciones h
            ON r.id_habitacion = h.id 
            JOIN categorias c
            ON h.id_categorias = c.id
            JOIN metodos_de_pago m
            ON r.id_metodo_pago = m.id
            WHERE r.id = ?", 'i', $id);
        $result = $conexion->getResult()->fetch_assoc();
        $conexion->desconectar();
        return $result;
    }

    public function cambiarACancelado($id){
        $conexion = new Conexion();
        $conexion->conectar();
        $conexion->queryPreparada(
            "UPDATE reservas SET estado = ? WHERE id=?",
            'si', "Cancelado",$id
        );
        $filas = $conexion->getFilasAfectadas();
        $conexion->desconectar();
        return $filas > 0;
    }
}
?>