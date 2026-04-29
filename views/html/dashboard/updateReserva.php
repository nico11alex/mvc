<?php
$nombreUsuario = $_SESSION['datosUsuario'][0]['name'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Élara — Nueva Reserva</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Jost:wght@300;400;500&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="views/style/style5.css?v=4">
</head>
<body>

  <!-- TOP BAR -->
  <header class=" topbar">
  <div class="topbar-logo">
    <div class="logo-diamond"></div>
    <span class="logo-text">Élara</span>
  </div>
  <button class="topbar-btn">Cerrar sesión</button>
  </header>

  <div class="layout">

    <aside class="sidebar">
      <nav class="nav">
        <a href="index.php?action=misReservas" class="nav-item active">
          <span class="nav-icon">▣</span> Mis reservas
        </a>
      </nav>
      <div class="user-bar">
        <div class="user-avatar"> </div>
          <div>
            <div class="user-name">
              
            </div>
            <div class="user-role">Élara member</div>
          </div>
        </div>
    </aside>

    <main class="main">
      <h1 class="page-title">Modificar reserva</h1>
      <form id="reservaForm" action="<?=SITE_URL ?>index.php?action=updateReserva" method="POST">
        <input type="hidden" name="id" value="<?= $reserva['id'] ?>">
        <div class="card">
            <p class="card-title">Modificar reserva</p>
            <?php
            print_r($reserva);
            ?>
            <div class="grid-2">
            <div class="field">
                <label>Fecha de llegada <span class="req">*</span></label>
                <input type="date" name="fecha_inicio" value="<?= $reserva['fecha_inicio'] ?>" required />
            </div>
            <div class="field">
                <label>Fecha de salida <span class="req">*</span></label>
                <input type="date" name="fecha_fin" value="<?= $reserva['fecha_final'] ?>" required />
            </div>
            <div class="field">
                <label>Cantidad de personas <span class="req">*</span></label>
                <input type="number" name="num_personas" value="<?= $reserva['num_personas'] ?>" min="1" max="10" required />
            </div>
            <div class="field">
              <label>Categoría <span class="req">*</span></label>
              <select name="categoria_id" id="categoria_id" required>
                <?php foreach($categorias as $cat): ?>
                  <option value="<?= $cat['id'] ?>" <?= $cat['id']==$reserva['id_categoria'] ? 'selected' : '' ?>><?= $cat['name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="field">
                <label>Habitación <span class="req">*</span></label>
                <select name="habitacion_id" id="habitacion_id">
                  <option value="<?= $reserva['id_habitacion'] ?>" selected>Habitación actual</option>
                </select>
            </div>
            <div class="field">
                <label>Método de pago <span class="req">*</span></label>
                <select name="id_metodo_pago" required>
                <?php foreach($metodos as $metodo): ?>
                    <option value="<?= $metodo['id'] ?>" <?= $metodo['id']==$reserva['id_metodo_pago'] ? 'selected' : '' ?>>
                    <?= $metodo['name'] ?>
                    </option>
                <?php endforeach; ?>
                </select>
            </div>
            </div>
            <div class="form-actions">
            <a href="index.php?action=misReservas"><button type="button" class="btn-secondary">← Atrás</button></a>
            <button type="submit" class="btn-primary">Guardar cambios</button>
            </div>
        </div>
      </form>
    </main>
  </div>

  <script src="views/js/update.js"></script>
  </body>

</html>