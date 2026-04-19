<?php
    class User{

    public function validateNumDocument($data){
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "SELECT * FROM users WHERE num_document = '$data[num_document]'";
        $conexion->query($sql);
        $result = $conexion->getResult();
        $conexion->desconectar();
        if($result->num_rows>0){
            return 1;
        }
        return 0;
    }

    public function validateUser($data){
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "SELECT * FROM users WHERE email = '{$data['email']}'";
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
        $sql = "INSERT INTO users(name,email,password,num_document)
        VALUES ('$data[nombre]','$data[email]','$data[password]','$data[num_document]')";
        $conexion->query($sql);
        return $conexion->getFilasAfectadas();
    }

    public function validateLog($data){
        $conexion = new Conexion();
        $conexion->conectar();
        $email = trim($data['email']);
        $password = trim($data['password']);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $conexion->query($sql);
        $result = $conexion->getResult();
        $user = mysqli_fetch_assoc($result);
        if (!$user) {
            return 0;
        }
        if (password_verify($password, $user['password'])) {
            return 1;
        }
        return 0;
    }

        public function validarOption() {
            $conexion = new Conexion();
            $conexion->conectar();
            $sql = "SELECT (id) FROM tipos_de_documentos";  
            $conexion->query($sql);
            $result = $conexion->getResult();
            $opcion =$result->fetch_all(MYSQLI_ASSOC);        
            $conexion->desconectar();
            return $opcion;
        }
        

    }
?>