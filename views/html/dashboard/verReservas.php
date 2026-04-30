<?php
$nombreUsuario = $_SESSION['datosUsuario'][0]['name'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Élara — Mis Reservas</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Montserrat:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="views/style/style4.css?v=10001"">
</head>
<body>
<body>
 
  <!-- TOP BAR -->
  <header class=" topbar">
    <div class="logo">
        <div class="diamond"></div>
        <span class="logo-txt">Élara</span>
    </div>
    <a href="<?=SITE_URL ?>index.php?action=signOut">
        <button class="btn-cerrar" ">Cerrar sesión</button>
    </a>
    
    </header>

    <div class="layout">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <nav class="nav">
                <a href="#" class="nav-link active">
                    <span>▣</span> Mis reservas
                </a>
            </nav>
            <div class="user-bar">
                <div class="avatar"></div>
                <div>
                    <div class="u-name"><?php echo $nombreUsuario ?></div>
                    <div class="u-role">Élara member</div>
                </div>
            </div>
        </aside>

        <!-- MAIN -->
        <main class="main">
            <p class="crumb">Panel de huésped</p>
            <h1 class="page-title">Bienvenido <?php echo $nombreUsuario ?></h1>
            <p class="page-sub">Consulta y gestiona todas tus estancias en Élara</p>
            <div class="divider"></div>

            <!-- BIENVENIDA -->
            <div class="welcome">
                <div class="welcome-icon">◈</div>
                <div class="welcome-txt">
                    <h2>Tus reservas</h2>
                    <p>Estas son todas tus reservas registradas en Élara</p>
                </div>
            </div>

            <!-- SECCIÓN RESERVAS -->
            <div class="section-hdr">
                <span class="section-label">Tus reservas</span>
                <a href="<?=SITE_URL ?>index.php?action=getFormReservar">
                    <button class="btn-reservar">
                        + Reservar
                    </button>
                </a>
            </div>

            <!-- ESTADO VACÍO (mostrar cuando no hay reservas) -->
            <div class="empty" id="emptyState" style="display:none;">
                <div class="empty-icon">◇</div>
                <p>No tienes reservas creadas</p>
                <small>Haz clic en <strong>+ Reservar</strong> para comenzar</small>
            </div>

            <!-- TABLA DE RESERVAS -->
            <div class="table-wrap" id="tableWrap">
                <table>
                    <thead>
                        <tr>
                            <th>Habitación</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php if(empty($reservas)): ?>
                            <script>document.getElementById('emptyState').style.display='block'; document.getElementById('tableWrap').style.display='none';</script>
                        <?php else: ?>
                            <?php foreach($reservas as $r): ?>
                            <tr>
                                <td>Habitación <?= $r['num_habitacion'] ?></td>
                                <td><?= $r['fecha_inicio'] ?></td>
                                <td><?= $r['fecha_final'] ?></td>
                                <td><?= $r['estado'] ?></td>
                                <td>
                                    <a href="index.php?action=editarReserva&id=<?= $r['id'] ?>">
                                        <button class="btn-edit">Modificar</button>
                                    </a>
                                    <a href="index.php?action=cancelarReserva&id=<?= $r['id'] ?>">
                                        <button class="btn-delete">Cancelar</button>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </main>
    </div>
    <div class="toast" id="toast"></div>

    </body>

</html>