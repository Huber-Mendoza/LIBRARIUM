<?php
// admin/upload.php
require_once '../config/database.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $genre = $_POST['genre'] ?? '';
    $pages = (int)($_POST['pages'] ?? 0);
    $year = (int)($_POST['year'] ?? 0);
    $stars = (int)($_POST['stars'] ?? 0);
    $color = $_POST['color'] ?? 'linear-gradient(160deg,#1a0e2e,#4a1a6b)';
    $description = $_POST['description'] ?? '';

    if ($title && $author && $genre && $description) {
        try {
            $stmt = $pdo->prepare("INSERT INTO books (title, author, genre, pages, publish_year, stars, color, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$title, $author, $genre, $pages, $year, $stars, $color, $description]);
            $message = "<div class='success'>¡Novela añadida exitosamente al catálogo!</div>";
        } catch (PDOException $e) {
            $message = "<div class='error'>Error al añadir la novela: " . $e->getMessage() . "</div>";
        }
    } else {
        $message = "<div class='error'>Por favor, completa todos los campos requeridos.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Librarium - Panel de Administración</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600&family=Cinzel:wght@400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --ink: #1a1209;
      --parchment: #f5ede0;
      --gold: #b8882a;
      --border: rgba(184,136,42,0.4);
    }
    body {
      background-color: var(--ink);
      color: var(--parchment);
      font-family: 'Cormorant Garamond', serif;
      margin: 0; padding: 0;
    }
    .admin-container {
      max-width: 800px;
      margin: 4rem auto;
      padding: 3rem;
      border: 1px solid var(--border);
      background: rgba(255,255,255,0.02);
    }
    h1 {
      font-family: 'Cinzel', serif;
      text-align: center;
      color: var(--gold);
      margin-bottom: 2rem;
    }
    .form-group {
      margin-bottom: 1.5rem;
    }
    label {
      display: block;
      font-family: 'Cinzel', serif;
      font-size: 0.8rem;
      letter-spacing: 0.1em;
      color: var(--gold);
      margin-bottom: 0.5rem;
    }
    input, select, textarea {
      width: 100%;
      background: rgba(255,255,255,0.05);
      border: 1px solid var(--border);
      padding: 0.8rem;
      color: var(--parchment);
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.1rem;
      outline: none;
      box-sizing: border-box;
    }
    input:focus, select:focus, textarea:focus {
      border-color: var(--gold);
    }
    .btn {
      font-family: 'Cinzel', serif;
      padding: 1rem 2rem;
      background: var(--gold);
      color: var(--ink);
      border: none;
      cursor: pointer;
      font-size: 1rem;
      width: 100%;
      margin-top: 1rem;
      transition: opacity 0.3s;
    }
    .btn:hover {
      opacity: 0.9;
    }
    .success {
      background: rgba(46, 139, 87, 0.2);
      border: 1px solid #2e8b57;
      color: #98fb98;
      padding: 1rem;
      margin-bottom: 2rem;
      text-align: center;
    }
    .error {
      background: rgba(178, 34, 34, 0.2);
      border: 1px solid #b22222;
      color: #ff9999;
      padding: 1rem;
      margin-bottom: 2rem;
      text-align: center;
    }
    .back-link {
        display: block;
        text-align: center;
        margin-top: 2rem;
        color: var(--gold);
        text-decoration: none;
        font-family: 'Cinzel', serif;
        font-size: 0.8rem;
    }
  </style>
</head>
<body>
  <div class="admin-container">
    <h1>✦ Añadir Nueva Novela ✦</h1>
    
    <?php echo $message; ?>

    <form method="POST" action="">
      <div class="form-group">
        <label>Título de la Novela *</label>
        <input type="text" name="title" required>
      </div>

      <div class="form-group">
        <label>Autor *</label>
        <input type="text" name="author" required>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
        <div class="form-group">
          <label>Género *</label>
          <select name="genre" required style="color: black;">
            <option value="Fantasía">Fantasía</option>
            <option value="Romance">Romance</option>
            <option value="Misterio">Misterio</option>
            <option value="Ciencia Ficción">Ciencia Ficción</option>
            <option value="Drama">Drama</option>
            <option value="Terror">Terror</option>
            <option value="Histórica">Histórica</option>
            <option value="Contemporánea">Contemporánea</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>Valoración (Estrellas)</label>
          <select name="stars" style="color: black;">
            <option value="5">5 Estrellas</option>
            <option value="4">4 Estrellas</option>
            <option value="3">3 Estrellas</option>
            <option value="2">2 Estrellas</option>
            <option value="1">1 Estrella</option>
          </select>
        </div>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
        <div class="form-group">
          <label>Número de Páginas</label>
          <input type="number" name="pages" value="300">
        </div>
        
        <div class="form-group">
          <label>Año de Publicación</label>
          <input type="number" name="year" value="2024">
        </div>
      </div>

      <div class="form-group">
        <label>Color de Portada (CSS Gradient o Color)</label>
        <input type="text" name="color" value="linear-gradient(160deg,#1a0e2e,#4a1a6b)">
        <small style="opacity: 0.6; font-size: 0.9rem;">Ejemplo: linear-gradient(160deg, #2e0d1a, #6b1a3a)</small>
      </div>

      <div class="form-group">
        <label>Sinopsis *</label>
        <textarea name="description" rows="5" required></textarea>
      </div>

      <button type="submit" class="btn">Subir Novela</button>
    </form>
    
    <a href="../index.php" class="back-link">← Volver a la Biblioteca</a>
  </div>
</body>
</html>
