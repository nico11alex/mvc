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
              <input type="date" id="fecha_inicio" name="fecha_inicio" required />
            </div>
            <div class="field">
              <label for="fecha_fin">Fecha de salida <span class="req">*</span></label>
              <input type="date" id="fecha_fin" name="fecha_fin" required />
            </div>
            <div class="field">
              <label for="adultos">Adultos <span class="req">*</span></label>
              <select id="adultos" name="adultos" required>
                <option value="">Seleccionar</option>
                <option value="1">1 adulto</option>
                <option value="2" selected>2 adultos</option>
                <option value="3">3 adultos</option>
                <option value="4">4 adultos</option>
              </select>
            </div>
            <div class="field">
              <label for="menores">Menores de edad</label>
              <select id="menores" name="menores">
                <option value="0" selected>Ninguno</option>
                <option value="1">1 menor</option>
                <option value="2">2 menores</option>
                <option value="3">3 menores</option>
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
            </div>
            <div class="field" id="habitacion-select-wrap" style="margin-top:1rem;">
              <label for="habitacion_id">Habitación <span class="req">*</span></label>
              <select id="habitacion_id" name="habitacion_id">
                <option value="">Seleccione una habitacion</option>
              </select>
            </div>

            <div class="field">
              <label for="id_metodo_pago">Método de pago <span class="req">*</span></label>
              <select id="id_metodo_pago" name="id_metodo_pago" required>
                <option value="">Seleccionar</option>
                <?php foreach($metodos as $metodo): ?>
                  <option value="<?= $metodo['id'] ?>"><?= $metodo['name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
      </form>

      <!-- SUCCESS -->
      <div class="success-screen" id="successScreen">

            <div class="room-grid" id="roomGrid">
              
                
                <?php if (empty($categorias)): ?>
                <p>No hay categorias disponibles</p>
                <?php else: ?>

                <?php foreach($categorias as $hab): ?>
                    <label class="room-card" onclick="selectCategoria(this, '<?= $hab['id'] ?>')">
                      <input type="radio" name="categoria_id" value="<?= $hab['id'] ?>">
                      <div class="room-num"><?= $hab['description'] ?></div>
                    </label>
                <?php endforeach; ?>

                <?php endif; ?>

            </div>
            <p class="card-title">Elige tu metodo de pago</p>
            <div class="metodo-grid">
              

            <?php foreach($metodos as $metodo): ?>

              <label class="metodo-card" onclick="selectMetodo(this)">

                <input type="radio" name="id_metodo_pago" value="<?= $metodo['id'] ?>">

                <div class="metodo-icon">💳</div>
                <div class="metodo-nombre"><?= $metodo['name'] ?></div>
              </label>

            <?php endforeach; ?>

            </div>
            
            <span class="field-error section-gap" id="err-habitacion">
              Selecciona una habitación
            </span>
          </div>


          <div class="form-actions">
            <button type="button" class="btn-secondary" onclick="goStep(1)">← Atrás</button>
            <button type="button" class="btn-primary" onclick="goStep(3)">
              Revisar reserva →
            </button>
          </div>
        </div>



      </form>

      <!-- SUCCESS -->
      <div class="success-screen" id="successScreen">
        <div class="success-icon">◈</div>
        <h2 class="success-title">¡Reserva confirmada!</h2>
        <p class="success-sub">Tu estancia en Élara ha sido registrada. Recibirás un correo de confirmación.</p>
        <div class="success-id">
          Número de reserva: <strong id="success-id-num">#0024</strong>
        </div>
        <a href="views/html/resultado.php" class="btn-primary" style="text-decoration:none;display:inline-block;">
          Ver mis reservas
        </a>
      </div>

    </main>
  </div>
  <script src="views/js/reservar.js"></script>
  </body>

</html>