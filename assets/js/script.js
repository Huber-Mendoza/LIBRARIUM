const books = [
  { id: 1, title: 'Solo Leveling', author: 'Chugong', genre: 'Fantasía', chapters: 200, year: 2018, stars: 5, cover: 'https://upload.wikimedia.org/wikipedia/en/e/e0/Solo_Leveling_Webtoon.png', description: 'En un mundo donde cazadores con habilidades mágicas protegen a la humanidad de mortales monstruos, un cazador notoriamente débil llamado Sung Jinwoo se encuentra en una mazmorra que cambiará su destino.' },
  { id: 2, title: 'Omniscient Reader', author: 'Sing Shong', genre: 'Fantasía', chapters: 551, year: 2018, stars: 5, cover: 'https://i.pinimg.com/736x/89/54/25/8954252f9a74be8b2e3526c71be3974d.jpg', description: 'Kim Dokja, un oficinista ordinario cuyo único hobby es leer su novela web favorita, de repente se encuentra en un mundo donde dicha novela se ha convertido en realidad.' },
  { id: 3, title: 'La Sombra del Reloj', author: 'Elena Voss', genre: 'Misterio', chapters: 123, year: 2023, stars: 5, cover: 'linear-gradient(160deg,#0d1a2e,#1a3a5c)', description: 'Un inspector de policía recibe cartas escritas por víctimas de crímenes que aún no han ocurrido.' },
  { id: 4, title: 'Cuando Florecen las Tormentas', author: 'Camila Reyes', genre: 'Romance', chapters: 85, year: 2024, stars: 4, cover: 'linear-gradient(160deg,#2e0d1a,#6b1a3a)', description: 'Dos almas que se conocen en el umbral del fin del mundo descubren el amor verdadero.' },
  { id: 5, title: 'El Último Astrónomo', author: 'Marco Teln', genre: 'Ciencia Ficción', chapters: 312, year: 2023, stars: 5, cover: 'linear-gradient(160deg,#0d2e1a,#1a5c3a)', description: 'En el año 2347, el observatorio registra una señal que desafía todo.' }
];

document.addEventListener('DOMContentLoaded', () => {
  const path = window.location.pathname;
  if(path.includes('manga-detail.html')) renderDetailPage();
  else if(path.includes('read.html')) renderReadPage();
  else if(path.includes('catalog.html')) renderCatalogPage();
  else renderHomePage();
});

// Helper for Background style
function getCoverStyle(coverStr) {
  return coverStr.startsWith('http') ? `background-image: url('${coverStr}');` : `background: ${coverStr};`;
}

// ----------------------------------------
// HOME PAGE LOGIC (index.html)
// ----------------------------------------
function renderHomePage() {
  const grid = document.getElementById('booksGrid');
  if(!grid) return;
  const reversed = [...books].reverse().slice(0, 10); // show latest 10
  grid.innerHTML = generateGridHTML(reversed);
}

// ----------------------------------------
// CATALOG PAGE LOGIC (catalog.html)
// ----------------------------------------
function renderCatalogPage() {
  const urlParams = new URLSearchParams(window.location.search);
  const paramGenre = urlParams.get('genre');
  let currentSearch = '';
  let currentGenre = paramGenre || '';

  const grid = document.getElementById('booksGrid');
  const searchInput = document.getElementById('searchInput');

  // Activate proper filter button
  if(currentGenre) {
    document.querySelectorAll('.filter-btn').forEach(b => {
      if(b.innerText.toLowerCase() === currentGenre.toLowerCase()) {
        document.querySelector('.filter-btn.active')?.classList.remove('active');
        b.classList.add('active');
      }
    });
  }

  window.handleSearch = function() {
    currentSearch = searchInput.value;
    updateGrid();
  }

  window.setFilterGenre = function(btn, genre) {
    document.querySelector('.filter-btn.active')?.classList.remove('active');
    btn.classList.add('active');
    currentGenre = genre;
    updateGrid();
  }

  function updateGrid() {
    const filtered = books.filter(b => {
      const matchGenre = !currentGenre || b.genre === currentGenre;
      const matchSearch = !currentSearch || b.title.toLowerCase().includes(currentSearch.toLowerCase());
      return matchGenre && matchSearch;
    });

    if(filtered.length === 0) {
      grid.innerHTML = '<p style="color:var(--text-secondary);">No hay resultados.</p>';
    } else {
      grid.innerHTML = generateGridHTML(filtered);
    }
  }

  updateGrid();
}

// ----------------------------------------
// UNIVERSAL SEARCH TRAP (for index.html header search)
// ----------------------------------------
// If searching on index, maybe redirect to catalog
window.handleSearch = function() {
  const val = document.getElementById('searchInput').value;
  if(val && window.location.pathname.includes('index.html')) {
     window.location.href = `catalog.html?search=${encodeURIComponent(val)}`;
  }
}

// ----------------------------------------
// SHARED HTML GENERATOR
// ----------------------------------------
function generateGridHTML(booksArray) {
  return booksArray.map(b => {
    return `
    <div class="manga-card">
      <a href="manga-detail.html?id=${b.id}">
        <div class="manga-cover" style="${getCoverStyle(b.cover)}">
          <div class="manga-badge">HOT</div>
          <div class="manga-rating">★ ${b.stars}.0</div>
        </div>
      </a>
      <div class="manga-info">
        <a href="manga-detail.html?id=${b.id}" class="manga-title">${b.title}</a>
        <div class="chapter-item">
          <a href="read.html?id=${b.id}&chap=${b.chapters}" class="chapter-link">Capítulo ${b.chapters}</a>
          <span>nuevo</span>
        </div>
      </div>
    </div>
  `}).join('');
}


// ----------------------------------------
// DETAIL PAGE LOGIC (manga-detail.html)
// ----------------------------------------
function renderDetailPage() {
  const urlParams = new URLSearchParams(window.location.search);
  const id = parseInt(urlParams.get('id'));
  const b = books.find(x => x.id === id);

  if(!b) {
    document.getElementById('detailContainer').innerHTML = '<h2>Libro no encontrado</h2>';
    return;
  }

  // Generate Chapters List
  let chaptersHTML = '';
  for(let i = b.chapters; i >= 1; i--) {
     chaptersHTML += `
       <li>
         <a href="read.html?id=${b.id}&chap=${i}">Capítulo ${i}</a>
         <span>hace ${Math.floor(Math.random() * 30 + 1)} días</span>
       </li>
     `;
  }

  document.getElementById('detailContainer').innerHTML = `
    <div class="detail-header">
      <div class="detail-cover-img" style="${getCoverStyle(b.cover)}"></div>
      <div class="detail-info">
         <h1 class="detail-title">${b.title}</h1>
         <div class="detail-author">Autores: ${b.author}</div>
         <div class="detail-meta-tags">
            <span>${b.genre}</span>
            <span>★ ${b.stars}.0</span>
            <span>${b.year}</span>
         </div>
         <p class="detail-desc">${b.description}</p>
         <div style="display:flex; gap:1rem;">
           <a href="read.html?id=${b.id}&chap=1" class="btn-read">Leer Primer Capítulo</a>
           <a href="read.html?id=${b.id}&chap=${b.chapters}" class="btn-read" style="background:var(--bg-tertiary);">Leer Último</a>
         </div>
      </div>
    </div>
    <div class="detail-chapters">
       <h3>Todos los Capítulos (${b.chapters})</h3>
       <ul class="chapter-list">
         ${chaptersHTML}
       </ul>
    </div>
  `;
}


// ----------------------------------------
// READER PAGE LOGIC (read.html)
// ----------------------------------------
function renderReadPage() {
  const urlParams = new URLSearchParams(window.location.search);
  const id = parseInt(urlParams.get('id'));
  let chap = parseInt(urlParams.get('chap'));
  const b = books.find(x => x.id === id);

  if(!b) return;

  document.getElementById('backToMangaBtn').href = `manga-detail.html?id=${b.id}`;
  document.getElementById('readerTitle').innerText = `${b.title} - Capítulo ${chap}`;

  // Fake Reader Content
  document.getElementById('readerContent').innerHTML = `
    <h1 style="text-align:center; color: var(--accent); margin-bottom: 2rem;">Capítulo ${chap}</h1>
    <p>Esta es una demostración de la vista de lectura para el capítulo ${chap} de <strong>${b.title}</strong>.</p>
    <p>Aquí se mostrarían las imágenes del Webtoon apiladas verticalmente o el texto si es una novela ligera. Todo el diseño está pensando para ser no intrusivo y oscuro, de modo que la vista descanse al leer.</p>
    <p>...</p>
    <p>Continúa leyendo en el próximo capítulo.</p>
  `;

  const prevBtn = document.getElementById('prevChapBtn');
  const nextBtn = document.getElementById('nextChapBtn');

  if(chap <= 1) prevBtn.disabled = true;
  else prevBtn.onclick = () => window.location.href = `read.html?id=${b.id}&chap=${chap - 1}`;

  if(chap >= b.chapters) nextBtn.disabled = true;
  else nextBtn.onclick = () => window.location.href = `read.html?id=${b.id}&chap=${chap + 1}`;
}
