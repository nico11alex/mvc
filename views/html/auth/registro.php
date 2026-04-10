<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro — Élara Hotel & Spa</title>
  <link rel="stylesheet" href="views/style/style1.css" />
  <link rel="stylesheet" href="views/style/style2.css?v=10000" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;1,400;1,500&family=DM+Sans:wght@200;300;400;500&display=swap" rel="stylesheet"/>
  
</head>
<body class="reg-body">

  <nav class="navbar">
    <a href="index.php" class="nav-logo">
      <span class="logo-icon">◈</span>
      <span>Élara</span>
    </a>
  </nav>

  <div class="reg-layout">
    <div class="reg-left">
      <div class="reg-left-bg">
        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=900&q=80" alt="Suite Élara"/>
      </div>
      <div class="reg-left-overlay"></div>
      <div class="reg-left-content">
      </div>
    </div>
    <div class="reg-right">
      <div class="reg-form-wrap">
        <div class="reg-form-header">
          <p class="label">Nueva cuenta</p>
          <h1 class="reg-title">Crear registro</h1>
          <p class="reg-sub">¿Ya tienes cuenta? <a href="index.php?action=getFormLogin">Inicia sesión aquí →</a></p>
        </div>

        <?php if (isset($_SESSION['success'])){ ?>
          <div class="alert alert-success">
            <span class="alert-icon">✓</span>
            <span>¡Registro exitoso! Ya puedes iniciar sesión.</span>
          </div>
        <?php } ?>

        <?php if (isset($_SESSION['errors']['general'])){ ?>
          <div class="alert mi-alert-danger">
            <span><?php echo $_SESSION['errors']['general']?></span>
          </div>
        <?php } ?>

        <?php if (isset($_SESSION['errorEmail'])){ ?>
          <div class="alert mi-alert-danger">
            <span><?php echo $_SESSION['errorEmail']?></span>
          </div>
        <?php } ?>

        <?php if (isset($_SESSION['errorNumDocument'])){ ?>
          <div class="alert mi-alert-danger">
            <span><?php echo $_SESSION['errorNumDocument']?></span>
          </div>
        <?php } ?>
        

        <form method="POST" action="index.php?action=registerUser" class="reg-form" novalidate>
          <div class="form-field <?= isset($_SESSION['errors']["name"]) ? 'has-error' : '' ?>">
            <label for="name">Nombre completo</label>
            <div class="input-wrap">
              <span class="input-icon">✦</span>
              <input
                type="text"
                id="name"
                name="name"
                placeholder="Tu nombre completo"
                value="<?= htmlspecialchars($_SESSION['old']['name'] ?? '') ?>"
                autocomplete="name"
              />
            </div>
            <?php if (isset($_SESSION['errors']["name"])){ ?>
              <p class="field-error">⚠ <?= $_SESSION['errors']['name'] ?></p>
            <?php } ?>
          </div>

          <div class="form-field <?= isset($_SESSION['errors']["num_document"]) ? 'has-error' : '' ?>">
            <label for="name">Cedula</label>
            <div class="input-wrap">
              <span class="input-icon">✦</span>
              <input
                type="text"
                id="num_document"
                name="num_document"
                placeholder="Tu cedula"
                value="<?= htmlspecialchars($_SESSION['old']['num_document'] ?? '') ?>"
                autocomplete="num_document"
              />
            </div>
            <?php if (isset($_SESSION['errors']["num_document"])){ ?>
              <p class="field-error">⚠ <?= $_SESSION['errors']['num_document'] ?></p>
            <?php } ?>
          </div>

          <div class="form-field <?= isset($_SESSION['errors']["email"]) ? 'has-error' : '' ?>">
            <label for="email">Correo electrónico</label>
            <div class="input-wrap">
              <span class="input-icon">✦</span>
              <input
                type="email"
                id="email"
                name="email"
                placeholder="correo@ejemplo.com"
                value="<?= htmlspecialchars($_SESSION['old']['email'] ?? '') ?>"
                autocomplete="email"
              />
            </div>
            <?php if (isset($_SESSION['errors']["email"])){ ?>
              <p class="field-error">⚠ <?= $_SESSION['errors']["email"] ?></p>
            <?php } ?>
          </div>

          <div class="form-field <?= isset($_SESSION['errors']["password"]) ? 'has-error' : '' ?>">
            <label for="password">Contraseña</label>
            <div class="input-wrap">
              <span class="input-icon">✦</span>
              <input
                type="password"
                id="password"
                name="password"
                placeholder="Mínimo 8 caracteres"
                autocomplete="new-password"
              />
            </div>
            <?php if (isset($_SESSION['errors']["password"])){ ?>
              <p class="field-error">⚠ <?= $_SESSION['errors']["password"] ?></p>
            <?php } ?>
          </div>

          <div class="form-field <?= isset($_SESSION['errors']['confirmPassword']) ? 'has-error' : '' ?>">
            <label for="confirmPassword">Confirmar contraseña</label>
            <div class="input-wrap">
              <span class="input-icon">✦</span>
              <input
                type="password"
                id="confirmPassword"
                name="confirmPassword"
                placeholder="Repite tu contraseña"
                autocomplete="new-password"
              />
            </div>
            <?php if (isset($_SESSION['errors']['confirmPassword'])){ ?>
              <p class="field-error">⚠ <?= $_SESSION['errors']['confirmPassword'] ?></p>
            <?php } ?>
          </div>

          <button type="submit" class="reg-submit">
            <span>Crear mi cuenta</span>
            <span class="submit-arrow">→</span>
          </button>
        </form>
      </div>
    </div>
  </div>

</body>
</html>