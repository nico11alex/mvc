<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Élara Hotel & Spa — Reservas</title>
  <link rel="stylesheet" href="views/style/style1.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;1,400;1,500&family=DM+Sans:wght@200;300;400;500&display=swap" rel="stylesheet"/>
</head>
<body>

  <nav class="navbar" id="navbar">
    <a href="#" class="nav-logo">
      <span class="logo-icon">◈</span>
      <span>Élara</span>
    </a>
    <div class="nav-actions">
      <a href="<?=SITE_URL ?>index.php?action=getFormRegisterUser" class="nav-cta">Registrarse</a>
      <a href="<?=SITE_URL ?>index.php?action=getFormLogin" class="nav-cta">Iniciar Sesion</a>
    </div>
  </nav>

  <section class="hero">
    <div class="hero-bg">
      <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=1800&q=90" alt="Hotel Élara"/>
    </div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <div class="hero-tag">Hotel & Spa · 5 Estrellas</div>
      <h1 class="hero-title">
        Donde el lujo<br/>
        <em>encuentra la calma</em>
      </h1>
      <p class="hero-sub">
        Sumérgete en una experiencia de hospitalidad inigualable<br/>en el corazón de la naturaleza colombiana.
      </p>
    </div>
    <div class="booking-widget">
      <div class="widget-header">
        <span>◈</span> Busca tu estadía perfecta
      </div>
      <div class="widget-fields">
        <div class="field-group">
          <label>Llegada</label>
          <input type="date" id="arrival"/>
        </div>
        <div class="field-divider"></div>
        <div class="field-group">
          <label>Salida</label>
          <input type="date" id="departure"/>
        </div>
        <div class="field-divider"></div>
        <div class="field-group">
          <label>Huéspedes</label>
          <div class="guests-select">
            <select>
              <option>1 adulto</option>
              <option>2 adultos</option>
              <option>2 adultos, 1 niño</option>
              <option>2 adultos, 2 niños</option>
              <option>Grupo +5</option>
            </select>
          </div>
        </div>
        <div class="field-divider"></div>
        <div class="field-group">
          <label>Habitación</label>
          <div class="guests-select">
            <select>
              <option>Cualquier tipo</option>
              <option>Suite Deluxe</option>
              <option>Suite Junior</option>
              <option>Villa Privada</option>
              <option>Penthouse</option>
            </select>
          </div>
        </div>
        <button class="widget-btn" onclick="document.getElementById('reserva').scrollIntoView({behavior:'smooth'})">
          Verificar Disponibilidad
        </button>
      </div>
    </div>

    <div class="hero-scroll-hint">
      <div class="scroll-dot"></div>
      <span>Explorar</span>
    </div>
  </section>

  <div class="stats-strip">
    <div class="stat-item">
      <span class="stat-n">48</span>
      <span class="stat-l">Suites exclusivas</span>
    </div>
    <div class="stat-sep">◈</div>
    <div class="stat-item">
      <span class="stat-n">5★</span>
      <span class="stat-l">Certificación AAA</span>
    </div>
    <div class="stat-sep">◈</div>
    <div class="stat-item">
      <span class="stat-n">2</span>
      <span class="stat-l">Piscinas infinitas</span>
    </div>
    <div class="stat-sep">◈</div>
    <div class="stat-item">
      <span class="stat-n">4.9</span>
      <span class="stat-l">Valoración media</span>
    </div>
    <div class="stat-sep">◈</div>
    <div class="stat-item">
      <span class="stat-n">12</span>
      <span class="stat-l">Años de excelencia</span>
    </div>
  </div>

  <section class="rooms" id="habitaciones">
    <div class="rooms-header">
      <div>
        <p class="label">Nuestras Suites</p>
        <h2 class="title">Espacios diseñados<br/><em>para el descanso absoluto</em></h2>
      </div>
    </div>

    <div class="rooms-grid">

      <div class="room-card room-large">
        <div class="room-img">
          <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=900&q=80" alt="Suite Deluxe"/>
          <div class="room-overlay">
            <a href="#reserva" class="room-book-btn">Reservar esta Suite</a>
          </div>
        </div>
        <div class="room-info">
          <div class="room-top">
            <div>
              <span class="room-tag">Más Solicitada</span>
              <h3>Suite Deluxe</h3>
            </div>
            <div class="room-price">
              <span class="price-from">desde</span>
              <span class="price-amt">$420.000</span>
              <span class="price-night">/noche</span>
            </div>
          </div>
          <p>Vista panorámica al jardín, cama king size, bañera exenta y sala de estar privada con chimenea.</p>
          <div class="room-amenities">
            <span>🛏 King Size</span>
            <span>🛁 Bañera Exenta</span>
            <span>🌿 Vista Jardín</span>
            <span>📶 WiFi 1Gbps</span>
          </div>
        </div>
      </div>

      <div class="room-card">
        <div class="room-img">
          <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=600&q=80" alt="Suite Junior"/>
          <div class="room-overlay">
            <a href="#reserva" class="room-book-btn">Reservar</a>
          </div>
        </div>
        <div class="room-info">
          <div class="room-top">
            <div>
              <h3>Suite Junior</h3>
            </div>
            <div class="room-price">
              <span class="price-from">desde</span>
              <span class="price-amt">$280.000</span>
              <span class="price-night">/noche</span>
            </div>
          </div>
          <p>Balcón privado, ducha lluvia y minibar premium.</p>
          <div class="room-amenities">
            <span>🛏 Queen</span>
            <span>🚿 Ducha lluvia</span>
            <span>🍾 Minibar</span>
          </div>
        </div>
      </div>

      <div class="room-card">
        <div class="room-img">
          <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=600&q=80" alt="Villa Privada"/>
          <div class="room-overlay">
            <a href="#reserva" class="room-book-btn">Reservar</a>
          </div>
        </div>
        <div class="room-info">
          <div class="room-top">
            <div>
              <span class="room-tag premium">Premium</span>
              <h3>Villa Privada</h3>
            </div>
            <div class="room-price">
              <span class="price-from">desde</span>
              <span class="price-amt">$890.000</span>
              <span class="price-night">/noche</span>
            </div>
          </div>
          <p>Piscina privada, jardín exclusivo y mayordomo 24h.</p>
          <div class="room-amenities">
            <span>🏊 Piscina</span>
            <span>🧑‍💼 Mayordomo</span>
            <span>🌺 Jardín</span>
          </div>
        </div>
      </div>

    </div>
  </section>

  <section class="experiences">
    <div class="exp-bg">
      <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=1600&q=80" alt="Spa"/>
    </div>
    <div class="exp-overlay"></div>
    <div class="exp-content">
      <p class="label label-light">Más que un hotel</p>
      <h2 class="title title-light">Una experiencia<br/><em>que transforma</em></h2>
      <div class="exp-grid">
        <div class="exp-item">
          <div class="exp-icon">◎</div>
          <h4>Spa & Bienestar</h4>
          <p>Tratamientos personalizados con productos naturales de la región andina.</p>
        </div>
        <div class="exp-item">
          <div class="exp-icon">◎</div>
          <h4>Alta Gastronomía</h4>
          <p>Restaurante gourmet con menú de temporada y maridaje de vinos seleccionados.</p>
        </div>
        <div class="exp-item">
          <div class="exp-icon">◎</div>
          <h4>Eventos & Bodas</h4>
          <p>Salones elegantes para celebrar momentos únicos con atención personalizada.</p>
        </div>
        <div class="exp-item">
          <div class="exp-icon">◎</div>
          <h4>Turismo Aventura</h4>
          <p>Rutas guiadas, cabalgatas y avistamiento de aves en paisajes naturales.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="gallery">
    <div class="gallery-header">
      <p class="label">Galería</p>
      <h2 class="title">El hotel en<br/><em>imágenes</em></h2>
    </div>
    <div class="gallery-mosaic">
      <div class="gal-item gal-tall">
        <img src="https://images.unsplash.com/photo-1445019980597-93fa8acb246c?w=600&q=80" alt="Pool"/>
      </div>
      <div class="gal-item">
        <img src="https://images.unsplash.com/photo-1560347876-aeef00ee58a1?w=600&q=80" alt="Room"/>
      </div>
      <div class="gal-item">
        <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=600&q=80" alt="Lobby"/>
      </div>
      <div class="gal-item gal-wide">
        <img src="https://images.unsplash.com/photo-1455587734955-081b22074882?w=900&q=80" alt="Dining"/>
      </div>
      <div class="gal-item">
        <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=600&q=80" alt="View"/>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="footer-inner">
      <div class="footer-brand">
        <div class="footer-logo"><span class="logo-icon">◈</span> Élara Hotel & Spa</div>
      </div>

      <div class="footer-col">
        <h5>Habitaciones</h5>
        <ul>
          <li><a href="#">Suite Deluxe</a></li>
          <li><a href="#">Suite Junior</a></li>
          <li><a href="#">Villa Privada</a></li>
          <li><a href="#">Penthouse</a></li>
          <li><a href="#">Tarifas especiales</a></li>
        </ul>
      </div>
    </div>
  </footer>

</body>
</html>