<?php
session_start();
include "config/conexion.php";

if (!isset($_SESSION['idUsuario'])) {
    header("Location: login.php");
    exit();
}

$idUsuario = $_SESSION['idUsuario'];

$carrito = $conexion->query("
SELECT j.idJuego, j.precio, c.cantidad 
FROM carrito c
JOIN juego j ON c.idJuego = j.idJuego
WHERE c.idUsuario = $idUsuario
");

$total = 0;
while($item = $carrito->fetch_assoc()){
    $total += $item['precio'] * $item['cantidad'];
}

// Crear compra
$conexion->query("INSERT INTO compras (idUsuario, total) VALUES ($idUsuario, $total)");
$idCompra = $conexion->insert_id;

// Reinsertar datos
$carrito = $conexion->query("
SELECT j.idJuego, j.precio, c.cantidad 
FROM carrito c
JOIN juego j ON c.idJuego = j.idJuego
WHERE c.idUsuario = $idUsuario
");

while($item = $carrito->fetch_assoc()){
    $conexion->query("
    INSERT INTO compra_detalle (idCompra, idJuego, precio, cantidad)
    VALUES ($idCompra, {$item['idJuego']}, {$item['precio']}, {$item['cantidad']})
    ");
}

// Limpiar carrito
$conexion->query("DELETE FROM carrito WHERE idUsuario = $idUsuario");

header("Location: mis_compras.php");
exit();
?>
