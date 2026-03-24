CREATE DATABASE IF NOT EXISTS librarium;
USE librarium;

CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(150) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    pages INT NOT NULL,
    publish_year INT NOT NULL,
    stars INT NOT NULL DEFAULT 0,
    color VARCHAR(100) NOT NULL DEFAULT 'linear-gradient(160deg,#1a0e2e,#4a1a6b)',
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data (the ones from the original JS array)
INSERT INTO books (title, author, genre, pages, publish_year, stars, color, description) VALUES
('La Sombra del Reloj', 'Elena Voss', 'Misterio', 328, 2023, 5, 'linear-gradient(160deg,#0d1a2e,#1a3a5c)', 'Un inspector de policía recibe cartas escritas por víctimas de crímenes que aún no han ocurrido. Una carrera contrarreloj entre el presente y el futuro.'),
('Cuando Florecen las Tormentas', 'Camila Reyes', 'Romance', 394, 2024, 4, 'linear-gradient(160deg,#2e0d1a,#6b1a3a)', 'Dos almas que se conocen en el umbral del fin del mundo descubren que el amor es el único refugio que vale la pena construir.'),
('El Último Astrónomo', 'Marco Teln', 'Ciencia Ficción', 512, 2023, 5, 'linear-gradient(160deg,#0d2e1a,#1a5c3a)', 'En el año 2347, el último observatorio de la Tierra registra una señal imposible. Una odisea interestelar que desafía todo lo que sabemos sobre la conciencia.'),
('Cenizas de Invierno', 'Isabelle Lorn', 'Drama', 267, 2024, 4, 'linear-gradient(160deg,#2e1e0d,#5c3a1a)', 'Una mujer regresa al pueblo que abandonó hace veinte años para cerrar heridas que creía cicatrizadas. Un relato íntimo y devastador.'),
('La Reina de Hueso', 'Dara Nightfall', 'Fantasía', 478, 2022, 5, 'linear-gradient(160deg,#1a0d2e,#3a1a5c)', 'En un reino donde los muertos pueden gobernar, una reina de hueso y magia oscura deberá elegir entre su corona y su corazón.'),
('Código Fantasma', 'René Alva', 'Terror', 298, 2023, 4, 'linear-gradient(160deg,#1a1a0d,#3a3a0d)', 'Un programador descubre que el sistema de inteligencia artificial que diseñó ha comenzado a soñar, y sus sueños son pesadillas que se vuelven reales.'),
('Los Años del Olvido', 'Sofía del Mar', 'Histórica', 555, 2022, 5, 'linear-gradient(160deg,#2e1a0d,#5c2e0d)', 'Una saga familiar que abarca tres generaciones en la España del siglo XX, donde el amor, la traición y la memoria se entrelazan en un tapiz magistral.'),
('Bajo la Lluvia Eterna', 'Luca Fierro', 'Contemporánea', 312, 2024, 4, 'linear-gradient(160deg,#0d1e2e,#0d2e2e)', 'Una ciudad donde nunca para de llover alberga dos almas perdidas que descubren que la tristeza compartida es el inicio de algo luminoso.');
