<?php
require_once __DIR__ . '/../config.php';

header('Content-Type: application/json; charset=utf-8');

$stmt = $pdo->query(
    "SELECT id, nombre, descripcion, precio, imagen, stock
     FROM productos
     WHERE activo = 1
     ORDER BY id DESC"
);

echo json_encode([
    'ok' => true,
    'productos' => $stmt->fetchAll()
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>