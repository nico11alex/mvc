<?php
$nombreUsuario = $_SESSION['datosUsuario'][0]['name'];
$errores = $_SESSION['errores_reserva'] ?? [];
unset($_SESSION['errores_reserva']);
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
  <link rel="stylesheet" href="views/style/style5.css?v=6">
  <link rel="stylesheet" href="views/style/style6.css">
</head>
<body>

  <!-- TOP BAR -->
  <header class=" topbar">
  <div class="topbar-logo">
    <div class="logo-diamond"></div>
    <span class="logo-text">Élara</span>
  </div>
  <a href="">
    <button class="topbar-btn">Cerrar sesión</button>
  </a>
  </header>

  <div class="layout">

    <!-- SIDEBAR -->
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

    <!-- MAIN -->
    <main class="main">
      <h1 class="page-title">Nueva reserva</h1>

      <form id="reservaForm" action="<?=SITE_URL ?>index.php?action=createReserva" method="POST" novalidate>
      <div class="card">
          <p class="card-title">Nueva reserva</p>
          <div class="grid-2">
            <div class="field">
              <label for="fecha_inicio">Fecha de llegada <span class="req">*</span></label>
              <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?= htmlspecialchars($_SESSION['old']['fecha_inicio'] ?? '') ?>" required />
              <?php if(isset($errores['fecha_inicio'])): ?>
                <p class="error-text">⚠ <?= $errores['fecha_inicio'] ?></p>
              <?php endif; ?>
            </div>
            <div class="field">
              <label for="fecha_fin">Fecha de salida <span class="req">*</span></label>
              <input type="date" id="fecha_fin" name="fecha_fin" value="<?= htmlspecialchars($_SESSION['old']['fecha_fin'] ?? '') ?>" required />
              <?php if(isset($errores['fecha_final'])): ?>
                <p class="error-text">⚠ <?= $errores['fecha_final'] ?></p>
              <?php endif; ?>
            </div>
            <div class="field">
              <label for="adultos">Adultos <span class="req">*</span></label>
              <select id="adultos" name="adultos" required>
                <?php $antiguoAdultos = $_SESSION['old']['adultos'] ?? ''; ?>
                <option value="" <?php echo ($antiguoAdultos == "") ? 'selected' : ''; ?>>Seleccionar</option>
                <option value="1" <?php echo ($antiguoAdultos == "1") ? 'selected' : ''; ?>>1 adulto</option>
                <option value="2" <?php echo ($antiguoAdultos == "2") ? 'selected' : ''; ?>>2 adultos</option>
                <option value="3" <?php echo ($antiguoAdultos == "3") ? 'selected' : ''; ?>>3 adultos</option>
                <option value="4" <?php echo ($antiguoAdultos == "4") ? 'selected' : ''; ?>>4 adultos</option>
              </select>
              
          
              <?php if(isset($errores['adultos'])): ?>
                  <p class="error-text">⚠ <?= $errores['adultos'] ?></p>
              <?php endif; ?>
            </div>
            <div class="field">
              <label for="menores">Menores de edad</label>
              <select id="menores" name="menores">
                <?php $antiguo = $_SESSION['old']['menores'] ?? '0'; ?>
                <option value="0" <?php echo ($antiguo == "0") ? 'selected' : ''; ?>>Ninguno</option>
                <option value="1" <?php echo ($antiguo == "1") ? 'selected' : ''; ?>>1 menor</option>
                <option value="2" <?php echo ($antiguo == "2") ? 'selected' : ''; ?>>2 menores</option>
                <option value="3" <?php echo ($antiguo == "3") ? 'selected' : ''; ?>>3 menores</option>
              </select>
            </div>

            <div class="field">
              <label for="categoria_id">Categoría de habitación <span class="req">*</span></label>
              <select id="categoria_id" name="categoria_id" required>
                <option value="">Seleccionar</option>
                <?php foreach($categorias as $cat): ?>
                  <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?> - <?= $cat['description'] ?></option>
                <?php endforeach; ?>
              </select>
              <?php if(isset($errores['categorias'])): ?>
                  <p class="error-text">⚠ <?= $errores['categorias'] ?></p>
              <?php endif; ?>
            </div>

            <div class="field" id="habitacion-select-wrap">
              <label for="habitacion_id">Habitación <span class="req">*</span></label>
              <select id="habitacion_id" name="habitacion_id">
                <option value="">Seleccione una habitacion</option>
              </select>
              <?php if(isset($errores['habitacion_id'])): ?>
                  <p class="error-text">⚠ <?= $errores['habitacion_id'] ?></p>
              <?php endif; ?>
            </div>

            <div class="field">
              <label for="id_metodo_pago">Método de pago <span class="req">*</span></label>
              <select id="id_metodo_pago" name="id_metodo_pago" required>
                <option value="">Seleccionar</option>
                <?php foreach($metodos as $metodo): ?>
                  <option value="<?= $metodo['id'] ?>"><?= $metodo['name'] ?></option>
                <?php endforeach; ?>
              </select>
              <?php if(isset($errores['id_metodo_pago'])): ?>
                  <p class="error-text">⚠ <?= $errores['id_metodo_pago'] ?></p>
              <?php endif; ?>
            </div>
          </div>
          <br>
          <div class="form-actions">
              <button type="submit">
                Revisar reserva →
              </button>
            </div>
          </div>
      </form>
    </main>
  </div>
  <script src="views/js/reservar.js"></script>
  </body>

</html>