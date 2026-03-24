let books = [];
let activeGenre = null;
let searchTerm = '';

async function fetchBooks() {
  try {
    const response = await fetch('api/get_books.php');
    const result = await response.json();
    if (result.success) {
      books = result.data;
      renderBooks();
    } else {
      console.error(result.message);
    }
  } catch (e) {
    console.error("Error fetching books: ", e);
  }
}

function renderBooks() {
  const grid = document.getElementById('booksGrid');
  const filtered = books.filter(b => {
    const matchGenre = !activeGenre || b.genre === activeGenre;
    const matchSearch = !searchTerm || 
      b.title.toLowerCase().includes(searchTerm.toLowerCase()) ||
      b.author.toLowerCase().includes(searchTerm.toLowerCase()) ||
      b.genre.toLowerCase().includes(searchTerm.toLowerCase());
    return matchGenre && matchSearch;
  });

  if (filtered.length === 0) {
    grid.innerHTML = '<p style="grid-column: 1/-1; color: var(--text-secondary);">No se encontraron resultados.</p>';
    return;
  }

  grid.innerHTML = filtered.map(b => {
    // Madara Cover Image parsing (URL or linear gradient fallback)
    let bgStyle = b.cover.startsWith('http') 
        ? `background-image: url('${b.cover}');` 
        : `background: ${b.cover};`;

    return `
    <div class="manga-card">
      <div class="manga-cover" style="${bgStyle}" onclick="openBookModal(${b.id})">
        <div class="manga-badge">HOT</div>
        <div class="manga-rating">★ ${b.stars}.0</div>
      </div>
      <div class="manga-info">
        <div class="manga-title" onclick="openBookModal(${b.id})">${b.title}</div>
        <div class="chapter-item">
          <a href="#" class="chapter-link">Capítulo ${b.chapters}</a>
          <span>hace 1 día</span>
        </div>
      </div>
    </div>
  `}).join('');
}

function filterSearch() {
  searchTerm = document.getElementById('searchInput').value;
  renderBooks();
}

function filterGenre(genreElement, genre) {
  // Toggle genre
  if (activeGenre === genre) {
    activeGenre = null;
    genreElement.classList.remove('active');
  } else {
    activeGenre = genre;
    document.querySelectorAll('.genre-list li').forEach(li => li.classList.remove('active'));
    genreElement.classList.add('active');
  }
  
  searchTerm = '';
  document.getElementById('searchInput').value = '';
  renderBooks();
}

function openBookModal(id) {
  const b = books.find(x => x.id === id);
  if (!b) return;

  let bgStyle = b.cover.startsWith('http') 
        ? `background-image: url('${b.cover}');` 
        : `background: ${b.cover};`;

  document.getElementById('modal-book-content').innerHTML = `
    <div class="modal-cover" style="${bgStyle}"></div>
    <div class="modal-details">
      <h2 class="modal-title">${b.title}</h2>
      <div class="modal-meta">
        <span>${b.genre}</span>
        <span>★ ${b.stars}.0</span>
        <span>${b.year}</span>
        <span>${b.chapters} Capítulos</span>
      </div>
      <p style="color: var(--accent); font-weight: 600; margin-bottom: 1rem;">Autor: ${b.author}</p>
      <p class="modal-desc">${b.description}</p>
      <a href="#" class="read-btn">Leer Primer Capítulo</a>
    </div>
  `;
  document.getElementById('modal-book').classList.add('open');
}

function closeModal(event, id) {
  if (event.target === event.currentTarget) {
    document.getElementById(id).classList.remove('open');
  }
}

function directCloseModal(id) {
  document.getElementById(id).classList.remove('open');
}

document.addEventListener('DOMContentLoaded', () => {
  fetchBooks();
});
