<?php
    class User{

    public function validateUser($data){
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "SELECT * FROM users WHERE email = '$data[email]'";
        $conexion->query($sql);
        $result = $conexion->getResult();
        $conexion->desconectar();
        if($result->num_rows>0){
            return 1;
        }
        return 0;
    }

    public function registerUser($data){
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "INSERT INTO users(name,email,password)
        VALUES ('$data[nombre]','$data[email]','$data[password]')";
        $conexion->query($sql);
        return $conexion->getFilasAfectadas();
    }
    
    public function confirmPassword($data){
        $conexion = new Conexion();
        $conexion->conectar();
        $contraseña = $data['password'];
        $sql = "SELECT * FROM users WHERE email = '$data[email]'";
        $conexion->query($sql);
        $result = $conexion->getResult();
        $fila = $result->fetch_assoc();
        $contraseñaBaseDeDatos = $fila['password'];
        $conexion->desconectar();
        if(password_verify($contraseña,$contraseñaBaseDeDatos)){
            return 1;
        }
        return 0;
    }

    }
?>