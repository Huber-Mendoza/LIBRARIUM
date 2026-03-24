<?php
// api/get_books.php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once '../config/database.php';

try {
    $stmt = $pdo->prepare("SELECT id, title, author, genre, pages as chapters, publish_year as year, stars, cover, description FROM books ORDER BY id DESC");
    $stmt->execute();
    
    $books = $stmt->fetchAll();
    
    $formatted_books = array_map(function($book) {
        return [
            'id' => (int)$book['id'],
            'title' => $book['title'],
            'author' => $book['author'],
            'genre' => $book['genre'],
            'chapters' => (int)$book['chapters'], // we use chapters in Madara theme
            'year' => (int)$book['year'],
            'stars' => (int)$book['stars'],
            'cover' => $book['cover'],
            'description' => $book['description']
        ];
    }, $books);

    echo json_encode(['success' => true, 'data' => $formatted_books]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error al obtener los libros: ' . $e->getMessage()]);
}
?>
