CREATE SCHEMA tienda_bd;
USE tienda_bd;

CREATE TABLE usuarios (
	usuario VARCHAR(15) PRIMARY KEY,
    contrasena VARCHAR(255) NULL
);

CREATE TABLE categorias (
	categoria VARCHAR(30) PRIMARY KEY,
    descripcion VARCHAR(255)
);

CREATE TABLE productos (
	id_producto INT(6) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    precio NUMERIC(6,2),
    categoria VARCHAR(30),
    stock INT(3) DEFAULT 0,
    imagen VARCHAR(60),
    descripcion VARCHAR(255),
    CONSTRAINT fk_productos_categoria FOREIGN KEY (categoria) REFERENCES categorias(categoria) ON DELETE CASCADE ON UPDATE CASCADE
);

SET sql_safe_updates = 0;

INSERT INTO categorias (categoria, descripcion) 
VALUES 
('deporte', 'Equipamiento y accesorios de deporte'),
('libro', 'Libros de diversos géneros y categorías'),
('tecnología', 'Dispositivos electrónicos y gadgets'),
('hogar', 'Artículos para el hogar y decoración');

-- Insertar datos en la tabla productos
INSERT INTO productos (nombre, precio, categoria, stock, descripcion, imagen)
VALUES 
('Bicicleta de montaña', 150.00, 'deporte', 8, 'Bicicleta de montaña con marco de aluminio y suspensión completa', NULL),
('Libro de cocina', 19.99, 'libro', 7, 'Recetas y técnicas de cocina', NULL),
('Balón de fútbol', 25.00, 'deporte', 15, 'Balón oficial para partidos profesionales', NULL),
('Raqueta de tenis', 80.00, 'deporte', 10, 'Raqueta ligera con marco de grafito', NULL),
('Computadora portátil', 750.00, 'tecnología', 5, 'Laptop con procesador Intel Core i7 y 16GB RAM', NULL),
('Smartphone', 699.99, 'tecnología', 12, 'Teléfono inteligente con pantalla AMOLED y cámara de 108MP', NULL),
('Aspiradora robótica', 300.00, 'hogar', 8, 'Aspiradora automática con programación y control por app', NULL),
('Cafetera eléctrica', 120.00, 'hogar', 10, 'Cafetera con temporizador y función de autolimpieza', NULL),
('Patines en línea', 90.00, 'deporte', 6, 'Patines ajustables con ruedas de alta resistencia', NULL),
('Guitarra acústica', 150.00, 'hogar', 4, 'Guitarra clásica ideal para principiantes', NULL);