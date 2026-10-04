<?php
require_once __DIR__ . '/../config.php';

$productos = $pdo->query("SELECT * FROM productos ORDER BY id DESC")->fetchAll();
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Administrar productos</title>
<style>
body{font-family:Arial,sans-serif;background:#0b0b0b;color:#eee;margin:0;padding:30px}
.wrap{max-width:1100px;margin:auto}
h1{margin-bottom:8px}.sub{color:#999;margin-bottom:25px}
.card{background:#151515;border:1px solid #333;border-radius:12px;padding:22px;margin-bottom:20px}
input,textarea{width:100%;box-sizing:border-box;background:#090909;color:#fff;border:1px solid #444;border-radius:6px;padding:11px;margin:6px 0 14px}
button,.btn{background:#eee;color:#111;border:0;border-radius:6px;padding:11px 16px;font-weight:bold;cursor:pointer;text-decoration:none;display:inline-block}
.danger{background:#9b2226;color:#fff}.ok{color:#7ee787}
table{width:100%;border-collapse:collapse}th,td{padding:12px;border-bottom:1px solid #333;text-align:left;vertical-align:top}
img{width:80px;height:80px;object-fit:contain;background:#111;border-radius:6px}
.grid{display:grid;grid-template-columns:1fr 1fr;gap:16px}.full{grid-column:1/-1}
@media(max-width:700px){.grid{grid-template-columns:1fr}.full{grid-column:auto}table{font-size:13px}}
</style>
</head>
<body>
<div class="wrap">
<h1>Productos</h1>
<div class="sub">Módulo de administración de la tienda</div>

<div class="card">
<h2>Agregar producto</h2>
<form action="guardar.php" method="post">
<div class="grid">
<div><label>Nombre *</label><input name="nombre" required></div>
<div><label>Precio *</label><input name="precio" type="number" min="0" step="0.01" required></div>
<div><label>Imagen</label><input name="imagen" placeholder="assets/img/producto.png"></div>
<div><label>Stock total</label><input name="stock" type="number" min="0" value="0"></div>
<div class="full"><label>Descripción</label><textarea name="descripcion" rows="3"></textarea></div>
</div>
<button type="submit">Guardar producto</button>
</form>
</div>

<div class="card">
<h2>Productos cargados</h2>
<table>
<tr><th>ID</th><th>Imagen</th><th>Producto</th><th>Precio</th><th>Stock</th><th>Estado</th><th>Acción</th></tr>
<?php foreach($productos as $p): ?>
<tr>
<td><?= (int)$p['id'] ?></td>
<td><?php if($p['imagen']): ?><img src="../<?= htmlspecialchars($p['imagen']) ?>" alt=""><?php endif; ?></td>
<td><strong><?= htmlspecialchars($p['nombre']) ?></strong><br><small><?= htmlspecialchars($p['descripcion'] ?? '') ?></small></td>
<td>$<?= number_format((float)$p['precio'],0,',','.') ?> COP</td>
<td><?= (int)$p['stock'] ?></td>
<td><?= $p['activo'] ? 'Activo' : 'Inactivo' ?></td>
<td>
<a class="btn danger" href="eliminar.php?id=<?= (int)$p['id'] ?>" onclick="return confirm('¿Eliminar este producto?')">Eliminar</a>
</td>
</tr>
<?php endforeach; ?>
</table>
</div>
</div>
</body>
</html>