<?php
// admin/upload.php
require_once '../config/database.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $genre = $_POST['genre'] ?? '';
    $chapters = (int)($_POST['chapters'] ?? 0);
    $year = (int)($_POST['year'] ?? 0);
    $stars = (int)($_POST['stars'] ?? 0);
    $cover = $_POST['cover'] ?? '';
    $description = $_POST['description'] ?? '';

    if ($title && $author && $genre && $description && $cover) {
        try {
            $stmt = $pdo->prepare("INSERT INTO books (title, author, genre, pages, publish_year, stars, cover, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$title, $author, $genre, $chapters, $year, $stars, $cover, $description]);
            $message = "<div class='success'>¡Proyecto añadido exitosamente!</div>";
        } catch (PDOException $e) {
            $message = "<div class='error'>Error al añadir: " . $e->getMessage() . "</div>";
        }
    } else {
        $message = "<div class='error'>Por favor, completa todos los campos requeridos, incluyendo la portada.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Admin - Madara Upload</title>
  <style>
    :root {
      --bg: #16151d;
      --card: #1f1f1f;
      --text: #cccccc;
      --accent: #eb3349;
      --border: #333;
    }
    body {
      background-color: var(--bg);
      color: var(--text);
      font-family: 'Poppins', sans-serif;
      margin: 0; padding: 0;
    }
    .admin-container {
      max-width: 700px;
      margin: 4rem auto;
      padding: 2.5rem;
      background: var(--card);
      border-radius: 8px;
    }
    h1 {
      text-align: center;
      color: #fff;
      margin-bottom: 2rem;
    }
    .form-group {
      margin-bottom: 1.2rem;
    }
    label {
      display: block;
      font-size: 0.9rem;
      color: #aaa;
      margin-bottom: 0.4rem;
    }
    input, select, textarea {
      width: 100%;
      background: #111;
      border: 1px solid var(--border);
      padding: 0.8rem;
      color: #fff;
      border-radius: 4px;
      outline: none;
      box-sizing: border-box;
    }
    input:focus, select:focus, textarea:focus {
      border-color: var(--accent);
    }
    .btn {
      padding: 1rem 2rem;
      background: var(--accent);
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-weight: bold;
      width: 100%;
      margin-top: 1rem;
      transition: opacity 0.3s;
    }
    .btn:hover {
      opacity: 0.9;
    }
    .success { color: #5cb85c; padding: 1rem; margin-bottom: 1rem; background: rgba(92,184,92,0.1); border-left: 4px solid #5cb85c; }
    .error { color: #d9534f; padding: 1rem; margin-bottom: 1rem; background: rgba(217,83,79,0.1); border-left: 4px solid #d9534f; }
    .back-link { display: block; text-align: center; margin-top: 2rem; color: var(--accent); text-decoration: none; }
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
  <div class="admin-container">
    <h1>Añadir Nuevo Manga/Novela</h1>
    
    <?php echo $message; ?>

    <form method="POST" action="">
      <div class="form-group">
        <label>Título *</label>
        <input type="text" name="title" required>
      </div>

      <div class="form-group">
        <label>Autor *</label>
        <input type="text" name="author" required>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
        <div class="form-group">
          <label>Género *</label>
          <select name="genre" required>
            <option value="Acción">Acción</option>
            <option value="Fantasía">Fantasía</option>
            <option value="Romance">Romance</option>
            <option value="Isekai">Isekai</option>
            <option value="Drama">Drama</option>
            <option value="Misterio">Misterio</option>
            <option value="Sci-Fi">Sci-Fi</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>Valoración</label>
          <select name="stars">
            <option value="5">★★★★★</option>
            <option value="4">★★★★☆</option>
            <option value="3">★★★☆☆</option>
            <option value="2">★★☆☆☆</option>
            <option value="1">★☆☆☆☆</option>
          </select>
        </div>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
        <div class="form-group">
          <label>Capítulos / Páginas</label>
          <input type="number" name="chapters" value="1">
        </div>
        
        <div class="form-group">
          <label>Año</label>
          <input type="number" name="year" value="2024">
        </div>
      </div>

      <div class="form-group">
        <label>URL de la Portada * (Imagen JPG/PNG o CSS Gradient)</label>
        <input type="text" name="cover" value="" placeholder="https://ejemplo.com/cover.jpg" required>
      </div>

      <div class="form-group">
        <label>Sinopsis *</label>
        <textarea name="description" rows="5" required></textarea>
      </div>

      <button type="submit" class="btn">Publicar Manga / Novela</button>
    </form>
    
    <a href="../index.php" class="back-link">← Volver al Inicio</a>
  </div>
</body>
</html>
