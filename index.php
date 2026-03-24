<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Biblioteca de Novelas</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Cinzel:wght@400;600&family=IM+Fell+English:ital@0;1&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <!-- Progress bar -->
  <div class="progress-bar" id="progressBar"></div>

  <!-- NAV -->
  <nav>
    <a href="#" class="nav-brand">✦ LIBRARIUM</a>
    <ul class="nav-links">
      <li><a href="#catalogo">Catálogo</a></li>
      <li><a href="#generos">Géneros</a></li>
      <li><a href="#destacada">Destacada</a></li>
      <li><a href="#newsletter">Novedades</a></li>
      <li><a href="admin/upload.php" style="color:var(--gold);">Admin Panel</a></li>
    </ul>
  </nav>

  <!-- HERO -->
  <header>
    <div class="hero">
      <div class="hero-bg"></div>
      <p class="hero-ornament">✦ &nbsp; EL UNIVERSO EN PÁGINAS &nbsp; ✦</p>
      <h1 class="hero-title">
        LIBRARIUM
        <span>Novelas que transforman</span>
      </h1>
      <div class="hero-divider">
        <span class="hero-divider-icon">❧</span>
      </div>
      <p class="hero-subtitle">
        Un refugio para los que saben que la vida más intensa<br>
        se vive entre las páginas de un buen libro.
      </p>
      <div class="hero-cta">
        <a href="#catalogo" class="btn filled">Explorar catálogo</a>
        <a href="#generos" class="btn">Ver géneros</a>
      </div>
    </div>
  </header>

  <!-- FEATURED BOOK -->
  <div id="destacada" style="background: rgba(26,18,9,0.8); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); padding: 5rem 2rem;">
    <div style="max-width: 1200px; margin: 0 auto;">
      <div class="section-header reveal">
        <p class="section-tag">✦ NOVELA DESTACADA</p>
        <h2 class="section-title">Lectura del Mes</h2>
        <div class="section-line"></div>
      </div>
      <div class="featured reveal">
        <div class="featured-cover-wrap">
          <div class="book-cover" style="--cover-color: linear-gradient(160deg, #1a0e2e, #4a1a6b);" onclick="openModal('modal-featured')">
            <div class="cover-bg" style="background: linear-gradient(160deg, #1a0e2e, #4a1a6b);"></div>
            <div class="cover-pattern"></div>
            <div class="cover-spine"></div>
            <div style="position:absolute; inset:0; background: radial-gradient(circle at 50% 30%, rgba(180,100,255,0.15), transparent 65%);"></div>
            <div class="cover-content">
              <div class="cover-ornament">✦</div>
              <div class="cover-title">El Jardín<br>de los Espejos</div>
              <div class="cover-author">— Amara Sol —</div>
            </div>
          </div>
        </div>
        <div>
          <div class="featured-badge">✦ DESTACADA DEL MES</div>
          <h2 class="featured-title">El Jardín de<br>los Espejos</h2>
          <p class="featured-author">por Amara Sol</p>
          <p class="featured-desc">
            En la ciudad de Velmira, donde los reflejos guardan secretos y los espejos 
            muestran futuros que aún no han ocurrido, Lira descubre que su propio reflejo 
            ha comenzado a moverse por cuenta propia. Una novela sobre identidad, tiempo 
            y los laberintos del alma.
          </p>
          <div class="featured-meta">
            <div class="meta-item">
              <span class="meta-label">GÉNERO</span>
              <span class="meta-value">Fantasía Literaria</span>
            </div>
            <div class="meta-item">
              <span class="meta-label">PÁGINAS</span>
              <span class="meta-value">412</span>
            </div>
            <div class="meta-item">
              <span class="meta-label">AÑO</span>
              <span class="meta-value">2024</span>
            </div>
            <div class="meta-item">
              <span class="meta-label">VALORACIÓN</span>
              <span class="meta-value">★★★★★</span>
            </div>
          </div>
          <a href="#" class="btn filled" style="display: inline-block;">Leer ahora</a>
          &nbsp;&nbsp;
          <a href="#" class="btn" style="display: inline-block;">Añadir a lista</a>
        </div>
      </div>
    </div>
  </div>

  <!-- GENRES -->
  <section id="generos">
    <div class="section-header reveal">
      <p class="section-tag">✦ EXPLORAR</p>
      <h2 class="section-title">Por Géneros</h2>
      <div class="section-line"></div>
    </div>
    <div class="genres-grid reveal">
      <div class="genre-card" onclick="filterGenre('Fantasía')">
        <div class="genre-icon">🌙</div>
        <div class="genre-name">FANTASÍA</div>
      </div>
      <div class="genre-card" onclick="filterGenre('Romance')">
        <div class="genre-icon">🌹</div>
        <div class="genre-name">ROMANCE</div>
      </div>
      <div class="genre-card" onclick="filterGenre('Misterio')">
        <div class="genre-icon">🕯️</div>
        <div class="genre-name">MISTERIO</div>
      </div>
      <div class="genre-card" onclick="filterGenre('Ciencia Ficción')">
        <div class="genre-icon">🚀</div>
        <div class="genre-name">CIENCIA FICCIÓN</div>
      </div>
      <div class="genre-card" onclick="filterGenre('Drama')">
        <div class="genre-icon">🎭</div>
        <div class="genre-name">DRAMA</div>
      </div>
      <div class="genre-card" onclick="filterGenre('Terror')">
        <div class="genre-icon">🦇</div>
        <div class="genre-name">TERROR</div>
      </div>
      <div class="genre-card" onclick="filterGenre('Histórica')">
        <div class="genre-icon">⚔️</div>
        <div class="genre-name">HISTÓRICA</div>
      </div>
      <div class="genre-card" onclick="filterGenre('Contemporánea')">
        <div class="genre-icon">🌿</div>
        <div class="genre-name">CONTEMPORÁNEA</div>
      </div>
    </div>
  </section>

  <!-- QUOTE -->
  <div class="quote-band">
    <p class="quote-text">Un lector vive mil vidas antes de morir. El que nunca lee, vive solo una.</p>
    <p class="quote-author">— GEORGE R.R. MARTIN</p>
  </div>

  <!-- CATALOG -->
  <section id="catalogo">
    <div class="section-header reveal">
      <p class="section-tag">✦ COLECCIÓN</p>
      <h2 class="section-title">Catálogo</h2>
      <div class="section-line"></div>
    </div>
    <div class="search-wrapper reveal">
      <span class="search-icon">🔍</span>
      <input type="text" class="search-input" id="searchInput" placeholder="Buscar por título, autor o género..." oninput="filterBooks()">
    </div>
    <div class="books-grid" id="booksGrid">
      <!-- Books rendered dynamically from api/get_books.php -->
    </div>
  </section>

  <!-- NEWSLETTER -->
  <div class="newsletter-section" id="newsletter">
    <div class="section-header reveal">
      <p class="section-tag">✦ MANTENTE AL DÍA</p>
      <h2 class="section-title">Novedades Literarias</h2>
      <div class="section-line"></div>
      <p style="font-family: 'IM Fell English', serif; font-style: italic; opacity: 0.65; margin-top: 1rem; font-size: 1.1rem;">
        Recibe en tu correo las últimas novedades, reseñas exclusivas y recomendaciones personalizadas.
      </p>
    </div>
    <div class="newsletter-form reveal">
      <input type="email" class="newsletter-input" placeholder="tu@correo.com">
      <button class="btn filled" style="border-left: none; white-space: nowrap;">Suscribirse</button>
    </div>
  </div>

  <!-- FOOTER -->
  <footer>
    <div class="footer-brand">✦ LIBRARIUM</div>
    <p class="footer-tagline">El universo en páginas</p>
    <ul class="footer-links">
      <li><a href="#">Inicio</a></li>
      <li><a href="#">Catálogo</a></li>
      <li><a href="#">Géneros</a></li>
      <li><a href="#">Autores</a></li>
      <li><a href="#">Contacto</a></li>
    </ul>
    <p class="footer-copy">© 2024 Librarium · Todos los derechos reservados</p>
  </footer>

  <!-- MODAL FEATURED -->
  <div class="modal-overlay" id="modal-featured" onclick="closeModal(event, 'modal-featured')">
    <div class="modal">
      <button class="modal-close" onclick="document.getElementById('modal-featured').classList.remove('open')">✕</button>
      <p class="featured-badge" style="margin-bottom:1.2rem;">✦ SINOPSIS</p>
      <h2 class="featured-title" style="font-size:1.8rem; margin-bottom:0.5rem;">El Jardín de los Espejos</h2>
      <p class="featured-author">por Amara Sol</p>
      <div class="stars" style="margin: 1rem 0;">★★★★★</div>
      <p class="featured-desc">
        En la ciudad de Velmira, donde los reflejos guardan secretos y los espejos 
        muestran futuros que aún no han ocurrido, Lira descubre que su propio reflejo 
        ha comenzado a moverse por cuenta propia. Mientras investiga el misterio de su 
        doble especular, se adentra en una conspiración que amenaza el tejido de la realidad.
        <br><br>
        Una novela sobre identidad, tiempo y los laberintos del alma que cautivará a los 
        amantes de la fantasía literaria y el realismo mágico.
      </p>
      <a href="#" class="btn filled">Comenzar a leer</a>
    </div>
  </div>

  <!-- BOOK MODAL (dynamic) -->
  <div class="modal-overlay" id="modal-book" onclick="closeModal(event, 'modal-book')">
    <div class="modal">
      <button class="modal-close" onclick="document.getElementById('modal-book').classList.remove('open')">✕</button>
      <div id="modal-book-content"></div>
    </div>
  </div>

  <script src="assets/js/script.js"></script>
</body>
</html>
