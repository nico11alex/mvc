<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reserva Confirmada – Élara</title>
</head>
<body style="margin:0;padding:0;background-color:#0d1117;font-family:'Georgia',serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#0d1117;padding:48px 20px;">
  <tr>
    <td align="center">

      <!-- Wrapper -->
      <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;">

        <!-- TOP DIAMOND LOGO MARK -->
        <tr>
          <td align="center" style="padding-bottom:28px;">
            <div style="
              width:48px;height:48px;
              background:linear-gradient(135deg,#c9a84c,#e8c97a);
              transform:rotate(45deg);
              display:inline-block;
              border-radius:4px;
            "></div>
          </td>
        </tr>

        <!-- HEADER -->
        <tr>
          <td style="
            background:linear-gradient(160deg,#192132 0%,#0f1820 100%);
            border-top:2px solid #c9a84c;
            border-radius:12px 12px 0 0;
            padding:52px 48px 44px;
            text-align:center;
          ">
            <p style="
              margin:0 0 6px;
              font-family:'Georgia',serif;
              font-size:11px;
              letter-spacing:5px;
              color:#c9a84c;
              text-transform:uppercase;
            ">Hotel Boutique</p>

            <h1 style="
              margin:0 0 6px;
              font-family:'Georgia',serif;
              font-size:44px;
              font-weight:400;
              color:#f5efe6;
              letter-spacing:3px;
            ">Élara</h1>

            <!-- Gold divider -->
            <table width="60" cellpadding="0" cellspacing="0" style="margin:18px auto;">
              <tr>
                <td style="height:1px;background:#c9a84c;opacity:0.6;"></td>
              </tr>
            </table>

            <p style="
              margin:0;
              font-size:13px;
              letter-spacing:4px;
              color:#b0a898;
              text-transform:uppercase;
            ">Reserva Confirmada</p>
          </td>
        </tr>

        <!-- BODY -->
        <tr>
          <td style="
            background:#faf8f4;
            padding:52px 48px 40px;
          ">

            <!-- Greeting -->
            <h2 style="
              margin:0 0 14px;
              font-family:'Georgia',serif;
              font-size:26px;
              font-weight:400;
              color:#192132;
            ">Bienvenido, <?= $nombre ?></h2>

            <p style="
              margin:0 0 36px;
              font-family:Arial,sans-serif;
              font-size:15px;
              color:#6b6560;
              line-height:1.75;
            ">
              Tu reserva ha sido confirmada. Nos complace recibirte
              en Élara y estamos listos para brindarte una experiencia
              excepcional.
            </p>

            <!-- Reservation Card -->
            <table width="100%" cellpadding="0" cellspacing="0" style="
              background:#192132;
              border-radius:10px;
              overflow:hidden;
              margin-bottom:32px;
            ">
              <!-- Card header -->
              <tr>
                <td style="
                  padding:18px 28px;
                  border-bottom:1px solid rgba(201,168,76,0.25);
                ">
                  <p style="
                    margin:0;
                    font-family:Arial,sans-serif;
                    font-size:10px;
                    letter-spacing:4px;
                    color:#c9a84c;
                    text-transform:uppercase;
                  ">Detalle de tu estancia</p>
                </td>
              </tr>
              <!-- Card rows -->
              <tr>
                <td style="padding:28px 28px 0;">
                  <table width="100%" cellpadding="0" cellspacing="0">

                    <tr>
                      <td style="padding-bottom:20px;width:50%;vertical-align:top;">
                        <p style="margin:0 0 5px;font-family:Arial,sans-serif;font-size:10px;letter-spacing:3px;color:#7a8a9a;text-transform:uppercase;">Habitación</p>
                        <p style="margin:0;font-family:'Georgia',serif;font-size:18px;color:#f5efe6;">Habitación <?= $habitacion ?></p>
                      </td>
                      <td style="padding-bottom:20px;width:50%;vertical-align:top;">
                        <p style="margin:0 0 5px;font-family:Arial,sans-serif;font-size:10px;letter-spacing:3px;color:#7a8a9a;text-transform:uppercase;">Estado</p>
                        <p style="margin:0;">
                          <span style="
                            font-family:Arial,sans-serif;
                            font-size:12px;
                            background:rgba(201,168,76,0.15);
                            color:#c9a84c;
                            padding:4px 12px;
                            border-radius:20px;
                            border:1px solid rgba(201,168,76,0.3);
                            letter-spacing:1px;
                          ">✓ Confirmado</span>
                        </p>
                      </td>
                    </tr>

                    <tr>
                      <td style="padding-bottom:24px;vertical-align:top;">
                        <p style="margin:0 0 5px;font-family:Arial,sans-serif;font-size:10px;letter-spacing:3px;color:#7a8a9a;text-transform:uppercase;">Check-in</p>
                        <p style="margin:0;font-family:'Georgia',serif;font-size:18px;color:#f5efe6;"><?= $fechaInicio ?></p>
                        
                      </td>
                      <td style="padding-bottom:24px;vertical-align:top;">
                        <p style="margin:0 0 5px;font-family:Arial,sans-serif;font-size:10px;letter-spacing:3px;color:#7a8a9a;text-transform:uppercase;">Check-out</p>
                        <p style="margin:0;font-family:'Georgia',serif;font-size:18px;color:#f5efe6;"><?= $fechaFin ?></p>
                        
                      </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom:24px;vertical-align:top;">
                            <p style="margin:0 0 5px;font-family:Arial,sans-serif;font-size:10px;letter-spacing:3px;color:#7a8a9a;text-transform:uppercase;">Personas</p>
                            <p style="margin:0;font-family:'Georgia',serif;font-size:18px;color:#f5efe6;"><?= $numPersonas ?></p>
                        </td>
                        <td style="padding-bottom:24px;vertical-align:top;">
                            <p style="margin:0 0 5px;font-family:Arial,sans-serif;font-size:10px;letter-spacing:3px;color:#7a8a9a;text-transform:uppercase;">Total</p>
                            <p style="margin:0;font-family:'Georgia',serif;font-size:18px;color:#c9a84c;">$<?= $precio ?></p>
                        </td>
                    </tr>

                  </table>

                  <!-- Gold separator -->
                  <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:20px;">
                    <tr><td style="height:1px;background:rgba(201,168,76,0.2);"></td></tr>
                  </table>

                  <!-- Duration badge -->
                  <table width="100%" cellpadding="0" cellspacing="0" style="padding-bottom:24px;">
                    <tr>
                      <td style="vertical-align:middle;">
                        <p style="margin:0;font-family:Arial,sans-serif;font-size:10px;letter-spacing:3px;color:#7a8a9a;text-transform:uppercase;">Duración</p>
                      </td>
                      <td align="right" style="vertical-align:middle;">
                        <p style="margin:0;font-family:'Georgia',serif;font-size:16px;color:#c9a84c;">Noches: <?= $noches ?></p>
                      </td>
                    </tr>
                  </table>

                </td>
              </tr>
            </table>

            <!-- CTA Button -->
            <table width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center" style="padding-top:8px;">
                  <a href="#" style="
                    display:inline-block;
                    background:linear-gradient(135deg,#c9a84c,#b8922e);
                    color:#0f1820;
                    text-decoration:none;
                    font-family:Arial,sans-serif;
                    font-size:11px;
                    font-weight:700;
                    letter-spacing:3px;
                    text-transform:uppercase;
                    padding:16px 40px;
                    border-radius:4px;
                  ">Ver mi reserva</a>
                </td>
              </tr>
            </table>

            <!-- Divider -->
            <table width="100%" cellpadding="0" cellspacing="0" style="margin:40px 0 28px;">
              <tr><td style="height:1px;background:#e8e3db;"></td></tr>
            </table>

            <!-- Info note -->
            <p style="
              margin:0;
              font-family:Arial,sans-serif;
              font-size:13px;
              color:#9a9490;
              line-height:1.7;
              text-align:center;
            ">
              ¿Tienes alguna solicitud especial? Escríbenos a
              <a href="mailto:hola@hotelElara.com" style="color:#c9a84c;text-decoration:none;">hola@hotelElara.com</a>
              con gusto te atendemos.
            </p>

          </td>
        </tr>

        <!-- FOOTER -->
        <tr>
          <td style="
            background:#192132;
            border-radius:0 0 12px 12px;
            border-top:1px solid rgba(201,168,76,0.2);
            padding:32px 48px;
            text-align:center;
          ">
            <p style="
              margin:0 0 8px;
              font-family:'Georgia',serif;
              font-size:16px;
              letter-spacing:2px;
              color:#c9a84c;
            ">Élara</p>
            <p style="
              margin:0 0 16px;
              font-family:Arial,sans-serif;
              font-size:12px;
              color:#4a5a6a;
              letter-spacing:1px;
            ">Hotel Boutique · Bogotá, Colombia</p>

            <table width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center">
                  <a href="#" style="font-family:Arial,sans-serif;font-size:11px;color:#4a5a6a;text-decoration:none;margin:0 12px;">Política de privacidad</a>
                  <span style="color:#c9a84c;opacity:0.4;">·</span>
                  <a href="#" style="font-family:Arial,sans-serif;font-size:11px;color:#4a5a6a;text-decoration:none;margin:0 12px;">Cancelación</a>
                  <span style="color:#c9a84c;opacity:0.4;">·</span>
                  <a href="#" style="font-family:Arial,sans-serif;font-size:11px;color:#4a5a6a;text-decoration:none;margin:0 12px;">Contacto</a>
                </td>
              </tr>
            </table>

            <p style="
              margin:20px 0 0;
              font-family:Arial,sans-serif;
              font-size:11px;
              color:#2e3f50;
            ">© 2026 Élara · Todos los derechos reservados</p>
          </td>
        </tr>

      </table>
    </td>
  </tr>
</table>

</body>
</html>