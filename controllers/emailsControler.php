<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class emailcontroler {

    public function enviarCorreo($correo, $datos) {
        
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            
            $mail->Host       = $_ENV['SMTP_HOST']; 
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV['SMTP_USER']; 
            $mail->Password   = $_ENV['SMTP_PASS']; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = $_ENV['SMTP_PORT']; 

            $mail->setFrom($_ENV['SMTP_USER'], 'Hotel Elara');
            $mail->addAddress($correo);

            $nombre      = htmlspecialchars($datos['nombre']);
            $habitacion  = htmlspecialchars($datos['habitacion']);
            $fechaInicio = date('d \d\e F, Y', strtotime($datos['fecha_inicio']));
            $fechaFin    = date('d \d\e F, Y', strtotime($datos['fecha_fin']));
            $noches      = $datos['noches'];
            $numPersonas = $datos['num_personas'];
            $precio      = number_format($datos['precio'], 2);

            $mail->isHTML(true);

            $mail->Subject = 'Reserva Exitosa';

            ob_start();

            include 'views/emails/reservaExitosa.php';

            $body = ob_get_clean();

            $mail->Body = $body;

            $mail->send();
        } catch (Exception $e) {
            echo "Error al enviar: {$mail->ErrorInfo}";
        }
    }

    public function correoCuentaCreada($correo,$nombre,$fechaRegistro){
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            
            $mail->Host       = $_ENV['SMTP_HOST']; 
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV['SMTP_USER']; 
            $mail->Password   = $_ENV['SMTP_PASS']; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = $_ENV['SMTP_PORT']; 

            $mail->setFrom($_ENV['SMTP_USER'], 'Hotel Élara');
            $mail->addAddress($correo);

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $mail->Subject = 'Bienvenido al Hotel Élara';

            ob_start();

            include 'views/emails/creacionUsuario.php';

            $body = ob_get_clean();

            $mail->Body = $body;

            $mail->send();
        } catch (Exception $e) {
            echo "Error al enviar: {$mail->ErrorInfo}";
        }
    }
}

?>