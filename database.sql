CREATE DATABASE IF NOT EXISTS librarium;
USE librarium;

CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(150) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    pages INT NOT NULL, -- using pages as 'chapters'
    publish_year INT NOT NULL,
    stars INT NOT NULL DEFAULT 0,
    cover VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data with Madara-style examples
INSERT INTO books (title, author, genre, pages, publish_year, stars, cover, description) VALUES
('Solo Leveling', 'Chugong', 'Fantasía', 200, 2018, 5, 'https://upload.wikimedia.org/wikipedia/en/e/e0/Solo_Leveling_Webtoon.png', 'En un mundo donde cazadores con habilidades mágicas protegen a la humanidad de mortales monstruos, un cazador notoriamente débil llamado Sung Jinwoo se encuentra en una mazmorra que cambiará su destino zau ever.'),
('Omniscient Reader', 'Sing Shong', 'Fantasía', 551, 2018, 5, 'https://upload.wikimedia.org/wikipedia/en/0/07/Omniscient_Reader.jpg', 'Kim Dokja, un oficinista ordinario cuyo único hobby es leer su novela web favorita, de repente se encuentra en un mundo donde dicha novela se ha convertido en realidad.'),
('La Sombra del Reloj', 'Elena Voss', 'Misterio', 123, 2023, 5, 'linear-gradient(160deg,#0d1a2e,#1a3a5c)', 'Un inspector de policía recibe cartas escritas por víctimas de crímenes que aún no han ocurrido.'),
('Cuando Florecen las Tormentas', 'Camila Reyes', 'Romance', 85, 2024, 4, 'linear-gradient(160deg,#2e0d1a,#6b1a3a)', 'Dos almas que se conocen en el umbral del fin del mundo descubren el amor verdadero.'),
('El Último Astrónomo', 'Marco Teln', 'Ciencia Ficción', 312, 2023, 5, 'linear-gradient(160deg,#0d2e1a,#1a5c3a)', 'En el año 2347, el observatorio registra una señal que desafía todo.');
