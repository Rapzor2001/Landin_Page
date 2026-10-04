<?php
require_once __DIR__ . '/config.php';
$productos = $pdo->query("SELECT * FROM productos WHERE activo=1 ORDER BY id DESC")->fetchAll();
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>YEEZY — Catálogo</title>
<style>
body{margin:0;background:#070707;color:#f7f4ee;font-family:Arial,sans-serif}
.container{width:min(1200px,92%);margin:auto}.top{padding:35px 0}.top h1{font-size:52px;margin:0}.top p{color:#999}
.products{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;padding-bottom:60px}
.card{background:#111;border:1px solid #2b2b2b;padding:20px;border-radius:8px}
.card img{width:100%;height:300px;object-fit:contain;background:#0b0b0b}
.card h2{margin:18px 0 8px}.desc{color:#999;min-height:42px}.price{font-size:25px;font-weight:bold;margin:15px 0}
.btn{display:inline-block;background:#eee;color:#111;padding:13px 18px;text-decoration:none;font-weight:bold;border-radius:5px}
.admin{position:fixed;right:20px;bottom:20px;background:#eee;color:#111;padding:12px 15px;text-decoration:none;border-radius:6px;font-weight:bold}
@media(max-width:800px){.products{grid-template-columns:1fr}.top h1{font-size:40px}}
</style>
</head>
<body>
<div class="container">
<div class="top">
<p>CATÁLOGO</p><h1>PRODUCTOS.</h1>
<p>Productos cargados desde MySQL.</p>
</div>
<div class="products">
<?php foreach($productos as $p): ?>
<article class="card">
<?php if($p['imagen']): ?><img src="<?= htmlspecialchars($p['imagen']) ?>" alt="<?= htmlspecialchars($p['nombre']) ?>"><?php endif; ?>
<h2><?= htmlspecialchars($p['nombre']) ?></h2>
<div class="desc"><?= nl2br(htmlspecialchars($p['descripcion'] ?? '')) ?></div>
<div class="price">$<?= number_format((float)$p['precio'],0,',','.') ?> COP</div>
<a class="btn" href="index(7).html#comprar">COMPRAR</a>
</article>
<?php endforeach; ?>
</div>
</div>
<a class="admin" href="admin/index.php">ADMINISTRAR PRODUCTOS</a>
</body>
</html>
