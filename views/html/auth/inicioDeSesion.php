<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Élara – Iniciar Sesión</title>
  <link rel="stylesheet" href="views/style/style1.css?v=10001" />
  <link rel="stylesheet" href="views/style/style2.css?v=10000" />
  <link rel="stylesheet" href="views/style/style3.css" />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet"/>
</head>
<body>

  <nav class="navbar">
    <a href="index.php" class="nav-logo">
      <span class="logo-icon">◈</span>
      <span>Élara</span>
    </a>
  </nav>

  <div class="split">
    <div class="form-side">
      <div class="form-card">
        <p class="label-top">Bienvenido de nuevo</p>
        <h1>Iniciar sesión</h1>
        <span class="register-link">
          ¿No tienes cuenta? <a href="index.php?action=getFormRegisterUser">Regístrate aquí →</a>
        </span>

        <?php if (isset($_SESSION['successs'])){ ?>
          <div class="alert alert-success">
            <span class="alert-icon">✓</span>
            <span>Iniciaste Sesion</span>
          </div>
        <?php } ?>
        
        <form method="POST" action="index.php?action=confirmLogin">
          <div class="form-field <?= isset($_SESSION['errorsLogin']) ? 'has-error' : '' ?>">
            <div class="field" id="field-email">
              <label class="field-label" for="email">Correo electrónico</label>
              <div class="input-wrap">
                <span class="bullet"></span>
                <input type="email" id="email" name="email"
                      placeholder="tucorreo@ejemplo.com" autocomplete="email"/>
              </div>
              <?php if (isset($_SESSION['errorsLogin'])){ ?>
                <p class="field-error">⚠ <?= $_SESSION['errorsLogin'] ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="field" id="field-password">
            <label class="field-label" for="password">Contraseña</label>
            <div class="input-wrap">
              <span class="bullet"></span>
              <input type="password" id="password" name="password"
                     placeholder="Tu contraseña" autocomplete="current-password"/>
            </div>
            <?php if (isset($_SESSION['errorsLogin'])){ ?>
                <p class="field-error">⚠ <?= $_SESSION['errorsLogin'] ?></p>
              <?php } ?>
          </div>

          <button type="submit" class="btn-submit" id="submitBtn">
            <span class="btn-text">Iniciar sesión &nbsp;→</span>
            <span class="spinner"></span>
          </button>
        </form>
      </div>
    </div>
    <div class="photo-side">
      <img
        src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=1400&q=80"
        alt="Suite de lujo Élara"
      />
      <div class="photo-overlay">
        <p class="quote">"Cada estancia en Élara es el inicio de un recuerdo que dura toda la vida."</p>
        <p class="quote-author">— Élara, Experiencias de Lujo</p>
      </div>
    </div>

  </div>

</body>
</html>