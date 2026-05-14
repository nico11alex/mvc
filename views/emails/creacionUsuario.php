<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bienvenido a Élara</title>
</head>
<body style="margin:0;padding:0;background-color:#080d14;font-family:'Georgia',serif;-webkit-font-smoothing:antialiased;">

<!-- Preheader oculto -->
<div style="display:none;max-height:0;overflow:hidden;mso-hide:all;">
  Tu cuenta en Élara ha sido creada. Comienza a explorar experiencias únicas.&nbsp;‌​‌​‌​‌
</div>

<table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"
  style="background-color:#080d14;padding:40px 16px 56px;">
  <tr>
    <td align="center">

      <table width="600" cellpadding="0" cellspacing="0" border="0" role="presentation"
        style="max-width:600px;width:100%;">


        <!-- ── LOGO MARK ── -->
        <tr>
          <td align="center" style="padding-bottom:24px;">
            <table cellpadding="0" cellspacing="0" border="0" role="presentation">
              <tr>
                <td style="
                  border:1px solid rgba(201,168,76,0.18);
                  border-radius:50%;
                  padding:10px;
                ">
                  <div style="
                    width:44px;height:44px;
                    background:linear-gradient(135deg,#b8892e 0%,#e8c97a 50%,#c9a84c 100%);
                    transform:rotate(45deg);
                    border-radius:6px;
                    box-shadow:0 0 24px rgba(201,168,76,0.35);
                  "></div>
                </td>
              </tr>
            </table>
          </td>
        </tr>


        <!-- ── HEADER ── -->
        <tr>
          <td style="
            background:linear-gradient(170deg,#182030 0%,#0d1520 60%,#0a1018 100%);
            border-top:2px solid #c9a84c;
            border-left:1px solid rgba(201,168,76,0.12);
            border-right:1px solid rgba(201,168,76,0.12);
            border-radius:14px 14px 0 0;
            padding:56px 48px 48px;
            text-align:center;
          ">
            <p style="
              margin:0 0 10px;
              font-family:Arial,Helvetica,sans-serif;
              font-size:10px;
              letter-spacing:6px;
              color:#c9a84c;
              text-transform:uppercase;
            ">Hotel Boutique</p>

            <h1 style="
              margin:0;
              font-family:'Georgia',serif;
              font-size:52px;
              font-weight:400;
              color:#f5efe6;
              letter-spacing:4px;
              line-height:1;
            ">Élara</h1>

            <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"
              style="margin:22px 0;">
              <tr>
                <td style="height:1px;background:linear-gradient(90deg,transparent,rgba(201,168,76,0.5),transparent);"></td>
              </tr>
            </table>

            <p style="
              margin:0;
              font-family:Arial,Helvetica,sans-serif;
              font-size:11px;
              letter-spacing:5px;
              color:#8a9bac;
              text-transform:uppercase;
            ">Cuenta Creada</p>
          </td>
        </tr>


        <!-- ── BODY ── -->
        <tr>
          <td style="
            background:#faf8f4;
            border-left:1px solid rgba(201,168,76,0.10);
            border-right:1px solid rgba(201,168,76,0.10);
            padding:52px 48px 44px;
          ">

            <!-- Greeting -->
            <h2 style="
              margin:0 0 12px;
              font-family:'Georgia',serif;
              font-size:28px;
              font-weight:400;
              color:#182030;
              letter-spacing:0.5px;
            ">Hola, <?= $nombre ?></h2>

            <p style="
              margin:0 0 40px;
              font-family:Arial,Helvetica,sans-serif;
              font-size:15px;
              color:#6d6560;
              line-height:1.8;
            ">
              Tu cuenta ha sido creada exitosamente. Ahora formas
              parte de Élara, donde cada detalle está pensado para
              ofrecerte una experiencia inolvidable.
            </p>


            <!-- ── DATOS DE ACCESO ── -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation" style="
              background:linear-gradient(160deg,#182030 0%,#0f1820 100%);
              border-radius:12px;
              overflow:hidden;
              margin-bottom:36px;
              border:1px solid rgba(201,168,76,0.15);
            ">
              <!-- Card header -->
              <tr>
                <td style="
                  padding:16px 28px;
                  background:rgba(201,168,76,0.06);
                  border-bottom:1px solid rgba(201,168,76,0.18);
                ">
                  <p style="
                    margin:0;
                    font-family:Arial,Helvetica,sans-serif;
                    font-size:9px;
                    letter-spacing:5px;
                    color:#c9a84c;
                    text-transform:uppercase;
                  ">Tus datos de acceso</p>
                </td>
              </tr>

              <!-- Card body -->
              <tr>
                <td style="padding:30px 28px 28px;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation">

                    <!-- Nombre completo -->
                    <tr>
                      <td style="padding-bottom:22px;vertical-align:top;">
                        <p style="margin:0 0 6px;font-family:Arial,Helvetica,sans-serif;font-size:9px;letter-spacing:4px;color:#5a7080;text-transform:uppercase;">Nombre completo</p>
                        <p style="margin:0;font-family:'Georgia',serif;font-size:19px;color:#f5efe6;"><?= $nombre ?></p>
                      </td>
                    </tr>

                    <!-- Línea separadora -->
                    <tr>
                      <td style="padding-bottom:22px;">
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation">
                          <tr><td style="height:1px;background:rgba(201,168,76,0.12);"></td></tr>
                        </table>
                      </td>
                    </tr>

                    <!-- Correo -->
                    <tr>
                        <td style="padding-bottom:22px;vertical-align:top;">
                            <p style="margin:0 0 6px;font-family:Arial,Helvetica,sans-serif;font-size:9px;letter-spacing:4px;color:#5a7080;text-transform:uppercase;">Correo electrónico</p>
                            <p style="margin:0;font-family:'Georgia',serif;font-size:19px;">
                            <a href="mailto:<?= $correo ?>" style="color:#f5efe6; text-decoration:none !important; -webkit-text-size-adjust:none;">
                                <?= $correo ?>
                            </a>
                            </p>
                        </td>
                    </tr>


                    <!-- Línea separadora -->
                    <tr>
                      <td style="padding-bottom:22px;">
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation">
                          <tr><td style="height:1px;background:rgba(201,168,76,0.12);"></td></tr>
                        </table>
                      </td>
                    </tr>

                    <!-- Fecha de registro -->
                    <tr>
                      <td style="padding-bottom:4px;vertical-align:top;">
                        <p style="margin:0 0 6px;font-family:Arial,Helvetica,sans-serif;font-size:9px;letter-spacing:4px;color:#5a7080;text-transform:uppercase;">Miembro desde</p>
                        <p style="margin:0;font-family:'Georgia',serif;font-size:19px;color:#c9a84c;"><?= $fechaRegistro ?></p>
                      </td>
                    </tr>

                  </table>
                </td>
              </tr>
            </table>
            <!-- /DATOS DE ACCESO -->


            <!-- ── BENEFICIOS ── -->
            <p style="
              margin:0 0 18px;
              font-family:Arial,Helvetica,sans-serif;
              font-size:10px;
              letter-spacing:4px;
              color:#8a7e72;
              text-transform:uppercase;
              text-align:center;
            ">Lo que te espera en Élara</p>

            <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"
              style="margin-bottom:40px;">
              <tr>
                <td width="33%" align="center" style="padding:0 6px;vertical-align:top;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"
                    style="background:#f0ece4;border-radius:10px;">
                    <tr>
                      <td align="center" style="padding:20px 12px 18px;">
                        <p style="margin:0 0 8px;font-size:22px;">🌙</p>
                        <p style="margin:0 0 4px;font-family:Arial,Helvetica,sans-serif;font-size:10px;letter-spacing:2px;color:#8a7e72;text-transform:uppercase;">Reservas</p>
                        <p style="margin:0;font-family:'Georgia',serif;font-size:12px;color:#3a3028;">Exclusivas</p>
                      </td>
                    </tr>
                  </table>
                </td>
                <td width="33%" align="center" style="padding:0 6px;vertical-align:top;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"
                    style="background:#f0ece4;border-radius:10px;">
                    <tr>
                      <td align="center" style="padding:20px 12px 18px;">
                        <p style="margin:0 0 8px;font-size:22px;">✨</p>
                        <p style="margin:0 0 4px;font-family:Arial,Helvetica,sans-serif;font-size:10px;letter-spacing:2px;color:#8a7e72;text-transform:uppercase;">Beneficios</p>
                        <p style="margin:0;font-family:'Georgia',serif;font-size:12px;color:#3a3028;">Especiales</p>
                      </td>
                    </tr>
                  </table>
                </td>
                <td width="33%" align="center" style="padding:0 6px;vertical-align:top;">
                  <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"
                    style="background:#f0ece4;border-radius:10px;">
                    <tr>
                      <td align="center" style="padding:20px 12px 18px;">
                        <p style="margin:0 0 8px;font-size:22px;">🛎️</p>
                        <p style="margin:0 0 4px;font-family:Arial,Helvetica,sans-serif;font-size:10px;letter-spacing:2px;color:#8a7e72;text-transform:uppercase;">Servicio</p>
                        <p style="margin:0;font-family:'Georgia',serif;font-size:12px;color:#3a3028;">Personalizado</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>


            <!-- ── DIVIDER ── -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"
              style="margin:0 0 32px;">
              <tr>
                <td style="height:1px;background:linear-gradient(90deg,transparent,#ddd8ce,transparent);"></td>
              </tr>
            </table>
            
          </td>
        </tr>


        <!-- ── FOOTER ── -->
        <tr>
          <td style="
            background:linear-gradient(160deg,#182030 0%,#0d1520 100%);
            border-radius:0 0 14px 14px;
            border-top:1px solid rgba(201,168,76,0.15);
            border-left:1px solid rgba(201,168,76,0.10);
            border-right:1px solid rgba(201,168,76,0.10);
            border-bottom:1px solid rgba(201,168,76,0.10);
            padding:36px 48px 40px;
            text-align:center;
          ">
            <p style="
              margin:0 0 4px;
              font-family:'Georgia',serif;
              font-size:18px;
              letter-spacing:3px;
              color:#c9a84c;
            ">Élara</p>
            <p style="
              margin:0 0 24px;
              font-family:Arial,Helvetica,sans-serif;
              font-size:11px;
              color:#3a5060;
              letter-spacing:2px;
              text-transform:uppercase;
            ">Hotel Boutique · Bogotá, Colombia</p>

            <table width="40%" cellpadding="0" cellspacing="0" border="0" role="presentation"
              style="margin:0 auto 24px;">
              <tr><td style="height:1px;background:rgba(201,168,76,0.2);"></td></tr>
            </table>

            <p style="margin:0 0 24px;">
              <a href="#" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#3e5568;text-decoration:none;margin:0 10px;letter-spacing:1px;">Política de privacidad</a>
              <span style="color:rgba(201,168,76,0.3);">·</span>
              <a href="#" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#3e5568;text-decoration:none;margin:0 10px;letter-spacing:1px;">Cancelación</a>
              <span style="color:rgba(201,168,76,0.3);">·</span>
              <a href="#" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#3e5568;text-decoration:none;margin:0 10px;letter-spacing:1px;">Contacto</a>
            </p>

            <p style="
              margin:0;
              font-family:Arial,Helvetica,sans-serif;
              font-size:11px;
              color:#253545;
              letter-spacing:0.5px;
            ">© 2026 Élara · Todos los derechos reservados</p>
          </td>
        </tr>

        <tr><td style="height:48px;"></td></tr>

      </table>

    </td>
  </tr>
</table>

</body>
</html>