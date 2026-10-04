<?php
require_once __DIR__ . '/../config.php';

$nombre = trim($_POST['nombre'] ?? '');
$descripcion = trim($_POST['descripcion'] ?? '');
$precio = (float)($_POST['precio'] ?? 0);
$imagen = trim($_POST['imagen'] ?? '');
$stock = (int)($_POST['stock'] ?? 0);

if ($nombre === '' || $precio < 0 || $stock < 0) {
    exit('Datos inválidos.');
}

$stmt = $pdo->prepare(
    "INSERT INTO productos (nombre, descripcion, precio, imagen, stock)
     VALUES (?, ?, ?, ?, ?)"
);
$stmt->execute([$nombre, $descripcion, $precio, $imagen, $stock]);

header('Location: index.php');
exit;
?>