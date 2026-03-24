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

  grid.innerHTML = filtered.map((b, i) => `
    <div class="book-card" style="animation-delay: ${i * 0.1}s" onclick="openBookModal(${b.id})">
      <div class="book-cover" style="--cover-color: ${b.color};">
        <div class="cover-bg" style="background: ${b.color};"></div>
        <div class="cover-pattern"></div>
        <div class="cover-spine"></div>
        <div class="cover-content">
          <div class="cover-ornament">✦</div>
          <div class="cover-title">${b.title}</div>
          <div class="cover-author">— ${b.author} —</div>
        </div>
      </div>
      <div class="stars">${'★'.repeat(b.stars)}${'☆'.repeat(5-b.stars)}</div>
      <div class="book-card-title">${b.title}</div>
      <div class="book-card-author">${b.author}</div>
      <div class="book-card-genre">${b.genre.toUpperCase()} · ${b.year}</div>
    </div>
  `).join('');
}

function filterBooks() {
  searchTerm = document.getElementById('searchInput').value;
  renderBooks();
}

function filterGenre(genre) {
  activeGenre = activeGenre === genre ? null : genre;
  searchTerm = '';
  document.getElementById('searchInput').value = '';
  document.getElementById('catalogo').scrollIntoView({ behavior: 'smooth' });
  renderBooks();
}

function openBookModal(id) {
  const b = books.find(x => x.id === id);
  if (!b) return;
  document.getElementById('modal-book-content').innerHTML = `
    <p class="featured-badge" style="margin-bottom:1.2rem;">✦ ${b.genre.toUpperCase()}</p>
    <h2 class="featured-title" style="font-size:1.8rem; margin-bottom:0.5rem;">${b.title}</h2>
    <p class="featured-author">por ${b.author}</p>
    <div class="stars" style="margin:1rem 0;">${'★'.repeat(b.stars)}${'☆'.repeat(5-b.stars)}</div>
    <div class="featured-meta" style="margin-bottom:1.5rem;">
      <div class="meta-item"><span class="meta-label">PÁGINAS</span><span class="meta-value">${b.pages}</span></div>
      <div class="meta-item"><span class="meta-label">AÑO</span><span class="meta-value">${b.year}</span></div>
    </div>
    <p class="featured-desc">${b.description}</p>
    <a href="#" class="btn filled">Comenzar a leer</a>
  `;
  document.getElementById('modal-book').classList.add('open');
}

function openModal(id) {
  const el = document.getElementById(id);
  if (el) el.classList.add('open');
}

function closeModal(event, id) {
  if (event.target === event.currentTarget) {
    document.getElementById(id).classList.remove('open');
  }
}

// ── SCROLL PROGRESS ──
window.addEventListener('scroll', () => {
  const scrollTop = window.scrollY;
  const docHeight = document.documentElement.scrollHeight - window.innerHeight;
  const progressBar = document.getElementById('progressBar');
  if (progressBar) progressBar.style.width = (scrollTop / docHeight * 100) + '%';
});

// ── SCROLL REVEAL ──
const observer = new IntersectionObserver((entries) => {
  entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
}, { threshold: 0.1 });

// Initialize when DOM is fully loaded
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
  fetchBooks();
});
