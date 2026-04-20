<?php
$nombreUsuario = $_SESSION['nombre'][0]['name'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Élara — Mis Reservas</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="views/style/style4.css">
</head>
<body>
<!-- TOP BAR -->
<nav class="topbar">
  <a class="topbar-logo" href="#">
    <span class="logo-diamond"></span>
    <span class="logo-name">Élara</span>
  </a>
  <a href="index.php?action=signOut" class="btn-signout">Cerrar sesión</a>
</nav>

<!-- SIDEBAR -->
<aside class="sidebar">
  <nav class="sidebar-nav">
    <a class="nav-item active" href="#">
      <svg class="nav-icon" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="1" y="3" width="14" height="11" rx="1" stroke="currentColor" stroke-width="1.2"/>
        <path d="M5 3V1M11 3V1" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
        <line x1="1" y1="6.5" x2="15" y2="6.5" stroke="currentColor" stroke-width="1"/>
        <rect x="3.5" y="8.5" width="2.5" height="2.5" rx="0.4" fill="currentColor" opacity="0.7"/>
        <rect x="6.75" y="8.5" width="2.5" height="2.5" rx="0.4" fill="currentColor" opacity="0.4"/>
        <rect x="10" y="8.5" width="2.5" height="2.5" rx="0.4" fill="currentColor" opacity="0.4"/>
      </svg>
      Mis reservas
    </a>
  </nav>

  <div class="sidebar-footer">
    <div class="avatar">G</div>
    <div class="avatar-info">
      <p><?php echo $nombreUsuario; ?></p>
      <p>élara member</p>
    </div>
  </div>
</aside>

<main class="main">
  <p class="page-eyebrow">Panel de huésped</p>
  <h1 class="page-title">Mis reservas</h1>
  <p class="page-subtitle">Consulta y gestiona todas tus estancias en Élara</p>
  <div class="divider"></div>

  

  </div>
</main>

</body>
</html>