<?php
$nombreUsuario = $_SESSION['nombre'][0]['name'];
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
  <link rel="stylesheet" href="views/style/style5.css?v=1"">
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

      <!-- STEPPER -->
      <div class="stepper" id="stepper">
        <div class="step">
          <div class="step-num active" id="snum-1">1</div>
          <span class="step-label active" id="slabel-1">Fechas</span>
        </div>
        <div class="step-line"></div>
        <div class="step">
          <div class="step-num" id="snum-2">2</div>
          <span class="step-label" id="slabel-2">Habitación</span>
        </div>
        <div class="step-line"></div>
        <div class="step">
          <div class="step-num" id="snum-3">3</div>
          <span class="step-label" id="slabel-3">Confirmar</span>
        </div>
      </div>

      <!-- FORM -->
      <form id="reservaForm" action="<?=SITE_URL ?>index.php?action=createReserva" method="POST" novalidate>

        <!-- ── PASO 1: FECHAS ── -->
        <?php print_r($_SESSION['metodoPago']);?>
        <div id="step1">
          <div class="card">
            <p class="card-title">Selección de fechas y huéspedes</p>
            <div class="grid-2">
              <div class="field">
                <label for="fecha_inicio">Fecha de llegada <span class="req">*</span></label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" required />
                <span class="field-error" id="err-fecha_inicio">Selecciona la fecha de llegada</span>
              </div>
              <div class="field">
                <label for="fecha_fin">Fecha de salida <span class="req">*</span></label>
                <input type="date" id="fecha_fin" name="fecha_fin" required />
                <span class="field-error" id="err-fecha_fin">Selecciona la fecha de salida</span>
                <span class="field-error" id="err-fechas_orden">La salida debe ser posterior a la llegada</span>
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
            </div>
          </div>

          <div class="form-actions">
            <a href="index.php?action=misReservas" class="btn-secondary">← Volver</a>
            <button type="button" class="btn-primary" onclick="goStep(2)">Continuar →</button>
          </div>
        </div>

        <!-- ── PASO 2: HABITACIÓN ── -->
        <div id="step2" style="display:none;">
          <div class="card">
            <p class="card-title">Elige tu habitación</p>

            <div class="room-grid" id="roomGrid">
              
                <?php $habitaciones = $_SESSION['habitaciones']; ?>
                <?php if (empty($habitaciones)): ?>
                <p>No hay habitaciones disponibles</p>
                <?php else: ?>

                <?php foreach($habitaciones as $hab): ?>
                  <label class="room-card"
                    onclick="selectRoom(this, '<?= $hab['num_habitacion'] ?>', '<?= $hab['id'] ?>', <?= $hab['precio'] ?>)">

                    <input type="radio" name="habitacion_id" value="<?= $hab['id'] ?>">

                    <div class="room-num">Hab. <?= $hab['num_habitacion'] ?></div>

                    <div class="room-price">
                      $<?= number_format($hab['precio'], 0, ',', '.') ?>
                    </div>

                  </label>
                <?php endforeach; ?>

                <?php endif; ?>

            </div>

            <p class="page-sub" style="margin-top:1rem;">
              Las habitaciones disponibles se mostrarán según tus fechas seleccionadas
            </p>
            
            <?php $metodos = $_SESSION['metodoPago']; ?>

            <div class="metodo-grid">

            <?php foreach($metodos as $metodo): ?>

              <label class="metodo-card"
                onclick="selectMetodo(this, <?= $metodo['id'] ?>, '<?= $metodo['nombre'] ?>')">

                <input type="radio" name="id_metodo_pago" value="<?= $metodo['id'] ?>">

                <div class="metodo-icon">💳</div> <!-- puedes mejorar esto luego -->
                <div class="metodo-nombre"><?= $metodo['nombre'] ?></div>
                <div class="metodo-desc">Pago con <?= $metodo['nombre'] ?></div>

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

        <!-- ── PASO 3: CONFIRMAR ── -->
        <div id="step3" style="display:none;">
          <div class="card">
            <p class="card-title">Resumen de tu reserva</p>
            <div class="summary-box">
              <div class="summary-row">
                <span class="s-label">Habitación</span>
                <span class="s-val" id="sum-habitacion">—</span>
              </div>
              <div class="summary-row">
                <span class="s-label">Llegada</span>
                <span class="s-val" id="sum-llegada">—</span>
              </div>
              <div class="summary-row">
                <span class="s-label">Salida</span>
                <span class="s-val" id="sum-salida">—</span>
              </div>
              <div class="summary-row">
                <span class="s-label">Noches</span>
                <span class="s-val" id="sum-noches">—</span>
              </div>
              <div class="summary-row">
                <span class="s-label">Huéspedes</span>
                <span class="s-val" id="sum-huespedes">—</span>
              </div>
              <div class="summary-row s-total">
                <span class="s-label">Total estimado</span>
                <span class="s-val" id="sum-total">—</span>
              </div>
            </div>
          </div>
          <!-- Hidden fields para envío -->
          <input type="hidden" name="habitacion_num" id="hidden_num" />
          <input type="hidden" name="precio_noche" id="hidden_precio" />

          <div class="form-actions">
            <button type="button" class="btn-secondary" onclick="goStep(2)">← Atrás</button>
            <button type="submit" class="btn-primary">Confirmar reserva</button>
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

  <script>
    /* ── Estado ─────────────────────────────────── */
    let selRoom = { num: '101', tipo: 'Deluxe King', precio: 320000 };
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('fecha_inicio').min = today;
    document.getElementById('fecha_fin').min = today;

    /* ── Stepper ────────────────────────────────── */
    function goStep(n) {
      if (n === 2 && !validateStep1()) return;
      if (n === 3 && !validateStep2()) return;
      if (n === 3) buildSummary();

      [1, 2, 3].forEach(i => {
        document.getElementById('step' + i).style.display = i === n ? 'block' : 'none';
        const num = document.getElementById('snum-' + i);
        const label = document.getElementById('slabel-' + i);
        num.classList.remove('active', 'done');
        label.classList.remove('active');
        if (i < n) { num.classList.add('done'); num.textContent = '✓'; }
        if (i === n) { num.classList.add('active'); num.textContent = i; label.classList.add('active'); }
        if (i > n) { num.textContent = i; }
      });
    }

    /* ── Validaciones ───────────────────────────── */
    function showErr(id, show) {
      const el = document.getElementById('err-' + id);
      if (el) el.classList.toggle('visible', show);
    }
    function markField(id, error) {
      const el = document.getElementById(id);
      if (el) el.classList.toggle('error', error);
    }

    function validateStep1() {
      const fi = document.getElementById('fecha_inicio').value;
      const ff = document.getElementById('fecha_fin').value;
      const ad = document.getElementById('adultos').value;
      let ok = true;

      if (!fi) { showErr('fecha_inicio', true); markField('fecha_inicio', true); ok = false; }
      else { showErr('fecha_inicio', false); markField('fecha_inicio', false); }

      if (!ff) { showErr('fecha_fin', true); markField('fecha_fin', true); ok = false; }
      else { showErr('fecha_fin', false); markField('fecha_fin', false); }

      if (fi && ff && ff <= fi) {
        showErr('fechas_orden', true); markField('fecha_fin', true); ok = false;
      } else {
        showErr('fechas_orden', false);
      }
      return ok;
    }

    function validateStep2() {
      const sel = document.querySelector('input[name="habitacion_id"]:checked');
      const ok = !!sel;
      showErr('habitacion', !ok);
      return ok;
    }

    function validateStep3() {
      const nombre = document.getElementById('nombre').value.trim();
      const email = document.getElementById('email').value.trim();
      const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      let ok = true;
      if (!nombre) { showErr('nombre', true); markField('nombre', true); ok = false; }
      else { showErr('nombre', false); markField('nombre', false); }
      if (!re.test(email)) { showErr('email', true); markField('email', true); ok = false; }
      else { showErr('email', false); markField('email', false); }
      return ok;
    }

    /* ── Habitaciones ───────────────────────────── */
    function selectRoom(el, num, tipo, precio) {
      document.querySelectorAll('.room-card').forEach(c => c.classList.remove('selected'));
      el.classList.add('selected');
      selRoom = { num, tipo, precio };
      document.getElementById('hidden_num').value = num;
      document.getElementById('hidden_precio').value = precio;
    }

    /* ── Resumen ────────────────────────────────── */
    function buildSummary() {
      const fi = document.getElementById('fecha_inicio').value;
      const ff = document.getElementById('fecha_fin').value;
      const ad = document.getElementById('adultos').value;
      const mn = document.getElementById('menores').value;
      const ms = ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'];
      const fmt = d => { const p = d.split('-'); return `${parseInt(p[2])} ${ms[parseInt(p[1]) - 1]}. ${p[0]}`; };
      const noches = Math.round((new Date(ff) - new Date(fi)) / 86400000);
      const total = noches * selRoom.precio;

      document.getElementById('sum-habitacion').textContent = `Hab. ${selRoom.num} — ${selRoom.tipo}`;
      document.getElementById('sum-llegada').textContent = fmt(fi);
      document.getElementById('sum-salida').textContent = fmt(ff);
      document.getElementById('sum-noches').textContent = `${noches} noche${noches !== 1 ? 's' : ''}`;
      document.getElementById('sum-huespedes').textContent = `${ad} adulto${ad > 1 ? 's' : ''}${mn > 0 ? `, ${mn} menor${mn > 1 ? 'es' : ''}` : ''}`;
      document.getElementById('sum-total').textContent = '$' + total.toLocaleString('es-CO');
    }

    /* ── Submit ─────────────────────────────────── */
    document.getElementById('reservaForm').addEventListener('submit', function(e) {

      if (!validateStep3()) {
        e.preventDefault(); // SOLO bloquea si hay error
        return;
      }

    });

    function showSuccess(id) {
      
      document.getElementById('reservaForm').style.display = 'none';
      document.getElementById('stepper').style.display = 'none';
      const sc = document.getElementById('successScreen');
      sc.style.display = 'flex';
      document.getElementById('success-id-num').textContent = id;
    }

    /* ── Fecha mínima dinámica ───────────────────── */
    document.getElementById('fecha_inicio').addEventListener('change', function () {
      document.getElementById('fecha_fin').min = this.value;
      document.getElementById('fecha_fin').value = '';
    });
  </script>
  </body>

</html>