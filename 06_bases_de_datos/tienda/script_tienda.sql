 
  
    
CREATE SCHEMA tienda_bd;
USE tienda_bd;

CREATE TABLE categorias (
	nombre VARCHAR(30) PRIMARY KEY,
    descripcion VARCHAR(255)
   
);

CREATE TABLE productos (
	id_producto INT (6) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    precio NUMERIC(6,2),
    categoria  VARCHAR(30),
     stock  INT DEFAULT 0,
     descripcion VARCHAR(255),
     imagen VARCHAR(60),
    FOREIGN KEY (categoria) REFERENCES categorias(nombre)
);
INSERT INTO categorias VALUES ('deporte', 'euipamiento y accesirios  deporte');
INSERT INTO categorias VALUES ('libro', 'libro de diversos generos y categoria');
    
   
INSERT INTO productos VALUES 
	(1,),
    (2,'libro de cocina',19.99,'libro',7,'receta y tecnica de cocina',NULL),
    
INSERT INTO PRODUCTOS ( nombre, precio, categoria,stock,descripcion,imagen) 
	VALUES ('bicicleta de montaña',150,'deporte',8,'bicicleta de montaña con marco de aluminio y suspension completa',NULL);
    

  
  