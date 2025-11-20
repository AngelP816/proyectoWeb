<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <!-- bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>GameLatam</title>
</head>
<body>
    <?php include "navbar.php"; ?>
    <!-- Carrusel -->
    <div id="myCarousel" class="carousel slide mb-5" data-bs-ride="carousel">

    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">

    <div class="carousel-item active">
      <img src="img/banner1.jpg" class="d-block w-100" style="object-fit:cover;">
      <div class="carousel-caption text-start">
        <h1 class="neon-text">Explora tu nuevo mundo</h1>
        <p>Crea tu propia historia, ahora con la proxima actualización</p>
        <a href="productos.php" class="btn btn-primary btn-lg">Ver catálogo</a>
      </div>
    </div>

    <div class="carousel-item">
      <img src="img/banner2.jpg" class="d-block w-100" style="object-fit:cover;">
      <div class="carousel-caption">
        <h1 class="neon-text">Ofertas épicas 🎮</h1>
        <p>Descuentos semanales para gamers</p>
        <a href="productos.php" class="btn btn-danger btn-lg">Ver ofertas</a>
      </div>
    </div>

    <div class="carousel-item">
      <img src="img/banner3.jpg" class="d-block w-100" style="object-fit:cover;">
      <div class="carousel-caption text-end">
        <h1 class="neon-text">GameLatam</h1>
        <p>Tu tienda gamer número 1</p>
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


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>     