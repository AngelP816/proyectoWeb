<?php
include "config/conexion.php";

// Juegos destacados (random)
$destacados = $conexion->query("
SELECT j.idJuego, j.nombre, j.precio, j.imagen
FROM juego j
ORDER BY RAND()
LIMIT 6
");

// Juegos recientes
$recientes = $conexion->query("
SELECT j.idJuego, j.nombre, j.precio, j.imagen
FROM juego j
ORDER BY j.idJuego DESC
LIMIT 6
");

// Todos los géneros
$generos = $conexion->query("SELECT * FROM generos");

// Todos los juegos
$todos = $conexion->query("SELECT * FROM juego");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>GameLatam - Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0e1621;
            color: white;
        }

        .card {
            background: #1b2838;
            color: white;
            border: none;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .hero {
            background: linear-gradient(120deg, #171a21, #0e1621);
            padding: 60px 20px;
            text-align: center;
        }

        .categoria-btn {
            margin: 5px;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>

<?php include "navbar.php"; ?>

<!-- 🔥 Carrusel mejorado -->
<div id="myCarousel" class="carousel slide mb-5" data-bs-ride="carousel">

<div class="carousel-indicators">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"></button>
</div>

<div class="carousel-inner">

    <div class="carousel-item active">
        <img src="img/banner1.jpg" class="d-block w-100">
        <div class="carousel-caption text-start">
            <h1 class="neon-text">Explora tu nuevo mundo</h1>
            <p>Descubre aventuras épicas con los mejores títulos del momento</p>
            <a href="productos.php" class="btn btn-primary btn-lg">Ver catálogo</a>
        </div>
    </div>

    <div class="carousel-item">
        <img src="img/banner2.jpg" class="d-block w-100">
        <div class="carousel-caption">
            <h1 class="neon-text">Ofertas épicas 🎮</h1>
            <p>Descuentos exclusivos para gamers de verdad</p>
            <a href="productos.php" class="btn btn-danger btn-lg">Ver ofertas</a>
        </div>
    </div>

    <div class="carousel-item">
        <img src="img/banner3.jpg" class="d-block w-100">
        <div class="carousel-caption text-end">
            <h1 class="neon-text">GameLatam</h1>
            <p>Tu tienda gamer número 1 en Latinoamérica</p>
            <a href="productos.php" class="btn btn-success btn-lg">Comprar ahora</a>
        </div>
    </div>

</div>

<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
</button>

<button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
</button>

</div>

<!-- HERO -->
<div class="hero">
    <h1>🎮 Bienvenido a <span class="text-info">GameLatam</span></h1>
    <p>La tienda gamer número 1 de Latinoamérica</p>
</div>

<!-- FILTROS -->
<div class="container mt-4 text-center">
    <h4>Explorar por género</h4>

    <?php while($g = $generos->fetch_assoc()): ?>
        <a href="productos.php?genero=<?= $g['idGenero']; ?>" 
           class="btn btn-outline-info categoria-btn">
           <?= $g['nombre_genero']; ?>
        </a>
    <?php endwhile; ?>
</div>

<!-- DESTACADOS -->
<div class="container mt-5">
    <h3 class="mb-3">🔥 Juegos destacados</h3>
    <div class="row">

        <?php while($juego = $destacados->fetch_assoc()): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <img src="img/juegos/<?= $juego['imagen']; ?>" height="200">
                <div class="card-body">
                    <h5><?= $juego['nombre']; ?></h5>
                    <p>$<?= $juego['precio']; ?></p>
                    <a href="ver_juego.php?id=<?= $juego['idJuego'] ?>" class="btn btn-primary w-100">
                        Ver juego
                    </a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>

    </div>
</div>

<!-- RECIENTES -->
<div class="container mt-5">
    <h3 class="mb-3">🆕 Últimos agregados</h3>
    <div class="row">

        <?php while($juego = $recientes->fetch_assoc()): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <img src="img/juegos/<?= $juego['imagen']; ?>" height="200">
                <div class="card-body">
                    <h5><?= $juego['nombre']; ?></h5>
                    <p>$<?= $juego['precio']; ?></p>
                    <a href="ver_juego.php?id=<?= $juego['idJuego'] ?>" class="btn btn-primary w-100">
                        Ver juego
                    </a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>

    </div>
</div>

<!-- TODOS -->
<div class="container mt-5">
    <h3 class="mb-3">📚 Todos los juegos</h3>

    <div class="row">
        <?php while($juego = $todos->fetch_assoc()): ?>
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow">
                <img src="img/juegos/<?= $juego['imagen']; ?>" height="180">
                <div class="card-body text-center">
                    <h6><?= $juego['nombre']; ?></h6>
                    <p>$<?= $juego['precio']; ?></p>
                    <a href="ver_juego.php?id=<?= $juego['idJuego'] ?>" class="btn btn-success btn-sm">
                        Comprar
                    </a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
