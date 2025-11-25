<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS propio -->
    <link rel="stylesheet" href="CSS/style.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>GameLatam</title>
</head>

<body>

<?php include "navbar.php"; include "buttonTheme.php"; ?>

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

<!-- 🌟 Sección informativa gamer -->
<section class="section-info container text-center">
    <h2 class="mb-5 neon-text">¿Por qué elegir GameLatam?</h2>

    <div class="row g-4">  

        <div class="col-md-4">
            <div class="info-card">
                <div class="info-icon">🎮</div>
                <h4>Los mejores juegos</h4>
                <p>Catálogo actualizado con los mejores juegos multiplataforma.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-card">
                <div class="info-icon">⚡</div>
                <h4>Entrega rápida</h4>
                <p>Compra digital al instante o envíos físicos rápidos.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-card">
                <div class="info-icon">💎</div>
                <h4>Precios competitivos</h4>
                <p>Las mejores ofertas para todos los gamers.</p>
            </div>
        </div>

    </div>
</section>

<!-- Footer sencillo -->
<footer class="text-center py-4 mt-5" style="background:#020617;">
    <p>© 2025 GameLatam - Todos los derechos reservados 🎮</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
