<?php
session_start();
include "config/conexion.php";

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if (isset($_GET['id'])) {
    $_SESSION['carrito'][] = $_GET['id'];
}

$carrito = $_SESSION['carrito'];
$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include "navbar.php"; ?>

<div class="container mt-5">
    <h2>🛒 Tu Carrito</h2>

    <?php foreach($carrito as $id): 
        $consulta = $conexion->query("SELECT * FROM videojuegos WHERE id=$id");
        $juego = $consulta->fetch_assoc();
        $total += $juego['precio'];
    ?>
        <div class="border p-3 mb-2">
            <h5><?= $juego['nombre']; ?></h5>
            <p>$<?= $juego['precio']; ?></p>
        </div>
    <?php endforeach; ?>

    <h3>Total: $<?= $total; ?></h3>

    <button class="btn btn-primary">Finalizar compra</button>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
