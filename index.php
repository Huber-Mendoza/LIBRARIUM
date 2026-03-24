<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Librarium - Madara Theme</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <!-- HEADER -->
  <header class="site-header">
    <div class="header-container">
      <a href="#" class="site-logo">
        LIBR<span>ARIUM</span>
      </a>
      
      <nav class="main-nav">
        <a href="#" class="active">Inicio</a>
        <a href="#">Manga</a>
        <a href="#">Novelas</a>
        <a href="#">Ranking</a>
        <a href="#">Bookmarks</a>
      </nav>

      <div class="header-actions">
        <div class="search-form">
          <input type="text" id="searchInput" class="search-input" placeholder="Buscar novela o manga..." oninput="filterSearch()">
        </div>
        <a href="admin/upload.php" class="admin-btn">Subir</a>
      </div>
    </div>
  </header>

  <!-- MAIN LAYOUT -->
  <div class="container">
    
    <!-- LEFT CONTENT: GRID -->
    <main class="main-content">
      <div class="hero-section">
         <h2 class="section-title">Últimas Actualizaciones</h2>
         <div class="manga-grid" id="booksGrid">
           <!-- Books rendered dynamically from api/get_books.php -->
         </div>
      </div>
    </main>

    <!-- RIGHT CONTENT: SIDEBAR -->
    <aside class="sidebar">
      
      <div class="widget">
        <h3 class="widget-title">Top Semanal</h3>
        <p style="color: var(--text-muted); font-size: 0.9rem;">Próximamente un ranking dinámico...</p>
      </div>

      <div class="widget">
        <h3 class="widget-title">Explorar Géneros</h3>
        <ul class="genre-list">
          <li onclick="filterGenre(this, 'Fantasía')">Fantasía</li>
          <li onclick="filterGenre(this, 'Isekai')">Isekai</li>
          <li onclick="filterGenre(this, 'Romance')">Romance</li>
          <li onclick="filterGenre(this, 'Acción')">Acción</li>
          <li onclick="filterGenre(this, 'Drama')">Drama</li>
          <li onclick="filterGenre(this, 'Ciencia Ficción')">Sci-Fi</li>
          <li onclick="filterGenre(this, 'Misterio')">Misterio</li>
        </ul>
      </div>
      
    </aside>

  </div>

  <!-- FOOTER -->
  <footer>
    <p>© 2024 Librarium Manga. Todos los derechos reservados.</p>
  </footer>

  <!-- BOOK MODAL -->
  <div class="modal-overlay" id="modal-book" onclick="closeModal(event, 'modal-book')">
    <div class="modal">
      <button class="modal-close" onclick="directCloseModal('modal-book')">✕</button>
      <div id="modal-book-content" style="display:contents;"></div>
    </div>
  </div>

  <script src="assets/js/script.js"></script>
</body>
</html>
