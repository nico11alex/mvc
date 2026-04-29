<?php
    class Control{
        public function verPagina($pagina){
            include_once $pagina;
        }

        public function cerrarSesion(){
            session_start();
            session_destroy();
            header('location: ' .SITE_URL. 'index.php');
            exit;
        }
    }
?>