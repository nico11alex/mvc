<?php
    class ControllerBase{
        public function verPagina($pagina){
            include_once $pagina;
        }

        public function registerUser($datos){
            unset($_SESSION['errors']);
            unset($_SESSION['old']);
            unset($_SESSION['success']);

            $errores = $this->validateData($datos);
            var_dump($errores);
            if(count($errores)>0){
                $_SESSION['errors']= $errores;
                $_SESSION['old']=$datos;

                header('location: ' .SITE_URL. 'index.php?action=getFormRegisterUser');
                exit;
            }

            $user = new User();
            $existe = $user->validateUser($datos);
            if($existe>0){
                $_SESSION['errors']= ['general' => 'El usuario ya existe.'];
                $_SESSION['old'] = $datos;

                header('location: ' .SITE_URL. 'index.php?action=getFormRegisterUser');
                exit;
            }

            $password = password_hash($datos['password'],PASSWORD_DEFAULT);
            $datos['password'] = $password;

            $resultado = $user->registerUser($datos);
            if($resultado>0){
                $_SESSION['success'] = 'Usuario registrado exitosamente';
                header('location: ' .SITE_URL. 'index.php?action=getFormRegisterUser');
                exit;

            }else{
                $_SESSION['errors']=['general' => 'Error al registrar el usuario. Intentalo de nuevo.'];
                $_SESSION['old']=$datos;
                header('location: ' .SITE_URL. 'index.php?action=getFormRegisterUser');
                exit;
            }
        }

        public function validateData($datos){
            $Errores= [];

            $nombre = trim($datos["nombre"]);
            $email = trim($datos["email"]);
            $contraseña = $datos["contraseña"];
            $confirmContraseña = $datos["confirmContraseña"];


            if(empty($nombre)){
                $Errores["nombre"] = "El nombre es obligatorio";
            }

            if(empty($email)){
                $Errores["email"] = "El email es obligatorio";
            }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $Errores["email"] = "El email " .$email. " no tiene un formato valido";
            }

            if(empty($contraseña)){
                $Errores["contraseña"] = "La contraseña es obligatorio";
            }elseif(strlen($contraseña) <8){
                $Errores["contraseña"] = "La contraseña debe tener minimo 8 caracteres";
            }elseif(!preg_match("/[A-Z]/",$contraseña)){
                $Errores["contraseña"] = "La contraseña debe tener minimo 1 letra en mayuscula";
            }elseif(!preg_match("/[a-z]/",$contraseña)){
                $Errores["contraseña"] = "La contraseña debe tener minimo 1 letra en minuscula";
            }elseif(!preg_match("/[0-9]/",$contraseña)){
                $Errores["contraseña"] = "La contraseña debe tener minimo 1 número";
            }elseif(!preg_match("/[@$!%*#?&]/",$contraseña)){
                $Errores["contraseña"] = "La contraseña debe tener minimo 1 caracter especial";
            }

            if(empty($confirmContraseña)){
                $Errores["confirmContraseña"] = "Debes confirmar la contraseña";
            }elseif($confirmContraseña !== $contraseña){
                $Errores["confirmContraseña"] = "ERROR CONTRASEÑA INVALIDA";
            }

            return $Errores;
        }

        public function logear($datos){
            unset($_SESSION['errors']);
            unset($_SESSION['success']);

            $Errores= [];
            
            $user = new User();
            $existe = $user->validateUser($datos);
            if($existe == 0 ){
                $_SESSION['errors']= ['email' => 'El email no aparece'];
                header('location: ' .SITE_URL. 'index.php?action=getFormLogin');
                exit;
            }
            $existe = $user->confirmPassword($datos);
            if($existe == 0){
                $_SESSION['errors']= ['password' => 'Error en la contraseña'];
                header('location: ' .SITE_URL. 'index.php?action=getFormLogin');
                exit;
            }

            $_SESSION['success'] = 'Bienvenido';
            header('location: ' .SITE_URL. 'index.php?action=getFormLogin');
            exit;

        }
    }
?>
