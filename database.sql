CREATE DATABASE IF NOT EXISTS tienda_yeezy
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE tienda_yeezy;

CREATE TABLE IF NOT EXISTS productos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT NULL,
    precio DECIMAL(12,2) NOT NULL DEFAULT 0,
    imagen VARCHAR(255) NULL,
    stock INT NOT NULL DEFAULT 0,
    activo TINYINT(1) NOT NULL DEFAULT 1,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS tallas (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    producto_id INT UNSIGNED NOT NULL,
    talla VARCHAR(20) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    activo TINYINT(1) NOT NULL DEFAULT 1,
    UNIQUE KEY uq_producto_talla (producto_id, talla),
    CONSTRAINT fk_talla_producto
      FOREIGN KEY (producto_id) REFERENCES productos(id)
      ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO productos (nombre, descripcion, precio, imagen, stock)
SELECT 'Yeezy 350 Triple Black',
       'Una silueta icónica en negro total. Diseño minimalista, estética urbana y una presencia que destaca.',
       180000,
       'assets/img/yeezy-01.png',
       10
WHERE NOT EXISTS (
    SELECT 1 FROM productos WHERE nombre = 'Yeezy 350 Triple Black'
);

SET @producto_id = (
    SELECT id FROM productos WHERE nombre = 'Yeezy 350 Triple Black' LIMIT 1
);

INSERT IGNORE INTO tallas (producto_id, talla, stock) VALUES
(@producto_id,'36',2),(@producto_id,'37',2),(@producto_id,'38',2),
(@producto_id,'39',2),(@producto_id,'40',2),(@producto_id,'41',2),
(@producto_id,'42',2),(@producto_id,'43',2),(@producto_id,'44',2);
