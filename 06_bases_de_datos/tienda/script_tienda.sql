 

    
CREATE SCHEMA tienda_bd;
USE tienda_bd;

CREATE TABLE categorias (
	nombre VARCHAR(30) PRIMARY KEY,
    descripcion VARCHAR(255)
   
);

-- Crear la tabla productos
CREATE TABLE  productos (
    id_producto INT(6) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    precio NUMERIC(6,2),
    categoria VARCHAR(30),
    stock INT DEFAULT 0,
    descripcion VARCHAR(255),
    imagen VARCHAR(60),
    FOREIGN KEY (categoria) REFERENCES categorias(nombre)
);


-- Insertar datos en la tabla categorías
INSERT INTO categorias (nombre, descripcion) 
VALUES ('deporte', 'equipamiento y accesorios de deporte');
INSERT INTO categorias (nombre, descripcion) 
VALUES ('libro', 'libros de diversos géneros y categorías');
INSERT INTO categorias (nombre, descripcion) 
VALUES ('tecnología', 'dispositivos electrónicos y gadgets');
INSERT INTO categorias (nombre, descripcion) 
VALUES ('hogar', 'artículos para el hogar y decoración');

-- Insertar datos en la tabla productos
INSERT INTO productos (nombre, precio, categoria, stock, descripcion, imagen)
VALUES ('bicicleta de montaña', 150.00, 'deporte', 8, 'bicicleta de montaña con marco de aluminio y suspensión completa', NULL);

INSERT INTO productos (nombre, precio, categoria, stock, descripcion, imagen)
VALUES ('libro de cocina', 19.99, 'libro', 7, 'recetas y técnicas de cocina', NULL);

INSERT INTO productos (nombre, precio, categoria, stock, descripcion, imagen)
VALUES ('balón de fútbol', 25.00, 'deporte', 15, 'balón oficial para partidos profesionales', NULL);

INSERT INTO productos (nombre, precio, categoria, stock, descripcion, imagen)
VALUES ('raqueta de tenis', 80.00, 'deporte', 10, 'raqueta ligera con marco de grafito', NULL);

INSERT INTO productos (nombre, precio, categoria, stock, descripcion, imagen)
VALUES ('computadora portátil', 750.00, 'tecnología', 5, 'laptop con procesador Intel Core i7 y 16GB RAM', NULL);

INSERT INTO productos (nombre, precio, categoria, stock, descripcion, imagen)
VALUES ('smartphone', 699.99, 'tecnología', 12, 'teléfono inteligente con pantalla AMOLED y cámara de 108MP', NULL);

INSERT INTO productos (nombre, precio, categoria, stock, descripcion, imagen)
VALUES ('aspiradora robótica', 300.00, 'hogar', 8, 'aspiradora automática con programación y control por app', NULL);

INSERT INTO productos (nombre, precio, categoria, stock, descripcion, imagen)
VALUES ('cafetera eléctrica', 120.00, 'hogar', 10, 'cafetera con temporizador y función de autolimpieza', NULL);

INSERT INTO productos (nombre, precio, categoria, stock, descripcion, imagen)
VALUES ('patines en línea', 90.00, 'deporte', 6, 'patines ajustables con ruedas de alta resistencia', NULL);

INSERT INTO productos (nombre, precio, categoria, stock, descripcion, imagen)
VALUES ('guitarra acústica', 150.00, 'deporte', 4, 'guitarra clásica ideal para principiantes', NULL);
  