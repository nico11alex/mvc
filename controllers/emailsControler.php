<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class emailControler{
    public function enviarCorreo($correo,$datos){
            
        $mail = new PHPMailer(true);

        try {


            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;

            $mail->Username = 'rodriguezvillotanicolas@gmail.com';
            $mail->Password = 'twom qwvo irfp lwfy';

            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('rodriguezvillotanicolas@gmail.com', 'Hotel Elara');

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

                // capturar HTML
            ob_start();

            include 'views/emails/reservaExitosa.php';

            $body = ob_get_clean();

            $mail->Body = $body;

            $mail->send();

            } catch (Exception $e) {
                echo $mail->ErrorInfo;
            }
        }

}
?>