# Módulo de productos MySQL para la Landing Yeezy

## 1. Crear la base de datos
Importa `database.sql` en MySQL/phpMyAdmin.

Ejemplo:
mysql -u root -p < database.sql

## 2. Configurar conexión
Edita `config.php`:
- host
- db
- user
- pass

## 3. Copiar el módulo
Coloca los archivos en la misma carpeta de tu landing.

Estructura:
config.php
database.sql
admin/
  index.php
  guardar.php
  eliminar.php
api/
  products.php

## 4. Administrar productos
Abre:
http://TU-DOMINIO/admin/index.php

Desde ahí puedes cargar:
- Nombre
- Descripción
- Precio
- Imagen
- Stock

## 5. API
Los productos activos quedan disponibles en:
http://TU-DOMINIO/api/products.php

## Importante
La landing original está guardada como `index_original.html`.
La versión `catalogo.php` demuestra cómo leer los productos desde MySQL.

Para convertir la landing original completa para que el producto, precio, imágenes y tallas sean dinámicos, hay que integrar estas consultas directamente en su HTML actual.
