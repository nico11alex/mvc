<?php
class Reporte{

    public function infoReporte($id){

        $conexion = new Conexion();
        $conexion->conectar();

        $conexion->queryPreparada("SELECT 
                r.id,
                r.fecha_inicio,
                r.fecha_final,
                r.num_personas,
                r.estado,
                r.precio,

                h.id as id_habitacion,
                h.num_habitacion,

                c.id as id_categoria,
                c.name as categoria,

                r.id_metodo_pago,
                m.name as metodo_pago

            FROM reservas r 

            JOIN habitaciones h
            ON r.id_habitacion = h.id 

            JOIN categorias c
            ON h.id_categorias = c.id

            JOIN metodos_de_pago m
            ON r.id_metodo_pago = m.id

            JOIN usuarios u
            ON u.id = r.id_users

            WHERE u.id = ?",'i',$id);

        $result = $conexion->getResult();

        $reservas = [];

        while($fila = $result->fetch_assoc()){
            $reservas[] = $fila;
        }

        $conexion->desconectar();

        return $reservas;
    }
}

?>