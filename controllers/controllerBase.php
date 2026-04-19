<?php
    class ControllerBase{
        public function verPagina($pagina){
            include_once $pagina;
        }

        public function registerUser($datos){
            unset($_SESSION['errors']);
            unset($_SESSION['old']);
            unset($_SESSION['success']);
            unset($_SESSION['errorEmail']);
            unset($_SESSION['errorCedula']);

            $errores = $this->validateData($datos);
            if(count($errores)>0){
                $_SESSION['errors']= $errores;
                $_SESSION['old']=$datos;
                header('location: ' .SITE_URL. 'index.php?action=getFormRegisterUser');
                exit;
            }

            $user = new User();
            $existeEmail = $user->validateUser($datos);
            $existeCedula = $user->validateNumDocument($datos);

            if($existeEmail>0){
                $_SESSION['errorEmail']= 'El correo ya esta registrado con otro usuario';
            }

            if($existeCedula>0){
                $_SESSION['errorNumDocument']= 'La cedula ya esta registrado con otro usuario';
            }

            if(!empty($_SESSION['errorEmail'])||!empty($_SESSION['errorNumDocument'])){
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

            $name = trim($datos["name"]);
            $numDocument = trim($datos["num_document"]);
            $email = trim($datos["email"]);
            $password = $datos["password"];
            $confirmPassword = $datos["confirmPassword"];
            $tipDocumento = trim($datos["tipo_documento"]);

            $user = new User();
            $opciones = $user->validarOption();

            if(empty($name)){
                $Errores["name"] = "El nombre es obligatorio";
            }

            if(empty($tipDocumento)){
                $Errores["tipoDocument"] = "Elija un tipo de documento";
            }elseif(!filter_var($numDocument,FILTER_VALIDATE_INT)){
                $Errores["tipoDocument"] = "Elija una de las opciones";
            }elseif(!in_array($tipDocumento, array_column($opciones, 'id'))) {
                $Errores["tipoDocument"] = "Esa opción no existe elija otra.";
            }

            if(empty($numDocument)){
                $Errores["numDocument"] = "El número de documento es obligatoria";
            }elseif(!filter_var($numDocument,FILTER_VALIDATE_INT)){
                $Errores["numDocument"] = "El número de documento " .$numDocument. " no es un número";
            }elseif(strlen($numDocument)!=10){
                $Errores["numDocument"] = "El número de documento no tiene la cantidad de números correcta revisa";
            }elseif((int)$numDocument<0){
                $Errores["numDocument"] = "El número de documento no tiene el formato adecuado recuerda solo poner números";
            }

            if(empty($email)){
                $Errores["email"] = "El email es obligatorio";
            }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $Errores["email"] = "El email " .$email. " no tiene un formato valido";
            }

            if(empty($password)){
                $Errores["password"] = "la contraseña es obligatorio";
            }elseif(strlen($password) <8){
                $Errores["password"] = "la contraseña debe tener minimo 8 caracteres";
            }elseif(!preg_match("/[A-Z]/",$password)){
                $Errores["password"] = "la contraseña debe tener minimo 1 letra en mayuscula";
            }elseif(!preg_match("/[a-z]/",$password)){
                $Errores["password"] = "la contraseña debe tener minimo 1 letra en minuscula";
            }elseif(!preg_match("/[0-9]/",$password)){
                $Errores["password"] = "la contraseña debe tener minimo 1 número";
            }elseif(!preg_match("/[@$!%*#?&]/",$password)){
                $Errores["password"] = "la contraseña debe tener minimo 1 caracter especial";
            }

            if(empty($confirmPassword)){
                $Errores["confirmpassword"] = "Debes confirmar la contraseña";
            }elseif($confirmPassword !== $password){
                $Errores["confirmpassword"] = "ERROR password INVALIDA";
            }

            return $Errores;
        }

        public function logear($datos){
            unset($_SESSION['errors']);
            unset($_SESSION['success']);

            $user = new User();
            $loginCorrecto = $user->validateLog($datos);

            if($loginCorrecto === 0){
                $_SESSION['errors'] = "Las credenciales son incorrectas";
                header('location: ' .SITE_URL. 'index.php?action=getFormLogin');
                exit;
            }

            
            $_SESSION['successs'] = 'Bienvenido';

            header('location: ' .SITE_URL. 'index.php');
            exit;
        }

        public function index() {
            $conexion = new Conexion();
            $conexion->conectar();
            $sql = "SELECT * FROM tipos_de_documentos";  
            $conexion->query($sql);
            $result = $conexion->getResult();
            $_SESSION['documentTypes'] = $result->fetch_all(MYSQLI_ASSOC);        
            $conexion->desconectar();
            return $_SESSION['documentTypes'];
        }
    }
?>
