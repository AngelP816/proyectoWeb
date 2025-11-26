<?php
session_start();
include "config/conexion.php";

if (!isset($_SESSION['idUsuario'])) {
    header("Location: login.php");
    exit();
}

$idUsuario = $_SESSION['idUsuario'];

// Agregar al carrito BD
if (isset($_GET['id'])) {
    $idJuego = (int)$_GET['id'];

    $consulta = $conexion->query("SELECT * FROM carrito 
        WHERE idUsuario = $idUsuario AND idJuego = $idJuego");

    if ($consulta->num_rows > 0) {
        $conexion->query("UPDATE carrito 
                          SET cantidad = cantidad + 1 
                          WHERE idUsuario = $idUsuario AND idJuego = $idJuego");
    } else {
        $conexion->query("INSERT INTO carrito (idUsuario, idJuego, cantidad) 
                          VALUES ($idUsuario, $idJuego, 1)");
    }
}

// Obtener carrito del usuario
$carrito = $conexion->query("
SELECT j.*, c.cantidad 
FROM carrito c
JOIN juego j ON c.idJuego = j.idJuego
WHERE c.idUsuario = $idUsuario
");

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include "navbar.php"; ?>

<div class="container mt-5">
    <h2>🛒 Tu Carrito</h2>

    <?php if($carrito->num_rows == 0): ?>
        <div class="alert alert-warning">Tu carrito está vacío 😢</div>
    <?php else: ?>

    <?php while($juego = $carrito->fetch_assoc()): 
        $subtotal = $juego['precio'] * $juego['cantidad'];
        $total += $subtotal;
    ?>
        <div class="border p-3 mb-3 d-flex align-items-center">
            <img src="img/juegos/<?= $juego['imagen'] ?>" width="100" class="me-3">

            <div class="flex-grow-1">
                <h5><?= $juego['nombre'] ?></h5>
                <p><?= $juego['precio'] ?> x <?= $juego['cantidad'] ?></p>
            </div>

            <div>
                <b>$<?= $subtotal ?></b>
            </div>
        </div>
    <?php endwhile; ?>

    <h4>Total: $<?= $total ?></h4>

    <form action="finalizar_compra.php" method="POST">
        <button class="btn btn-success">Finalizar compra</button>
    </form>

    <?php endif; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
