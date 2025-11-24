<?php
include "config/conexion.php";

$resultado = $conexion->query("SELECT * FROM juego");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include "navbar.php"; ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">🎮 Catálogo</h2>
    <div class="row">

        <?php while($juego = $resultado->fetch_assoc()): ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg h-100">
                <img src="<?= $juego['imagen']; ?>" class="card-img-top" height="200">
                <div class="card-body">
                    <h5 class="card-title"><?= $juego['nombre']; ?></h5>
                    <p><?= $juego['descripcion']; ?></p>
                    <p><b>Plataforma:</b> <?= $juego['plataforma']; ?></p>
                    <p><b>$<?= $juego['precio']; ?></b></p>
                    <a href="carrito.php?id=<?= $juego['id']; ?>" class="btn btn-success">Agregar al carrito</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
