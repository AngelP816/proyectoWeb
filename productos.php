<?php
include "config/conexion.php";

$buscar = "";
$idGenero = "";
$idPlataforma = "";

// Buscar por nombre
if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
    $buscar = trim($_GET['q']);
}

// Filtrar por género
if (isset($_GET['genero'])) {
    $idGenero = $_GET['genero'];
}

// Filtrar por plataforma
if (isset($_GET['plataforma'])) {
    $idPlataforma = $_GET['plataforma'];
}

// Obtener géneros y plataformas
$generos = $conexion->query("SELECT * FROM generos");
$plataformas = $conexion->query("SELECT * FROM plataformas");

// Consulta base
$sql = "
SELECT j.idJuego, j.nombre, j.descripcion, j.precio, j.imagen, 
       GROUP_CONCAT(DISTINCT p.nombre_plataforma SEPARATOR ', ') AS plataformas,
       GROUP_CONCAT(DISTINCT g.nombre_genero SEPARATOR ', ') AS generos
FROM juego j
LEFT JOIN juego_plataforma jp ON j.idJuego = jp.idJuego
LEFT JOIN plataformas p ON jp.idPlataforma = p.idPlataforma
LEFT JOIN juego_genero jg ON j.idJuego = jg.idJuego
LEFT JOIN generos g ON jg.idGenero = g.idGenero
WHERE 1=1
";

// Condicionales
if ($buscar != "") {
    $sql .= " AND j.nombre LIKE ? ";
}

if ($idGenero != "") {
    $sql .= " AND j.idJuego IN (SELECT idJuego FROM juego_genero WHERE idGenero = ?) ";
}

if ($idPlataforma != "") {
    $sql .= " AND j.idJuego IN (SELECT idJuego FROM juego_plataforma WHERE idPlataforma = ?) ";
}

$sql .= " GROUP BY j.idJuego";

// Preparar
$stmt = $conexion->prepare($sql);

// Bind dinámico
$tipos = "";
$valores = [];

if ($buscar != "") {
    $tipos .= "s";
    $valores[] = "%".$buscar."%";
}

if ($idGenero != "") {
    $tipos .= "i";
    $valores[] = $idGenero;
}

if ($idPlataforma != "") {
    $tipos .= "i";
    $valores[] = $idPlataforma;
}

if (!empty($valores)) {
    $stmt->bind_param($tipos, ...$valores);
}

$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos - GameLatam</title>
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
        }

        .card:hover {
            transform: scale(1.03);
            transition: 0.2s;
        }

        select {
            max-width: 250px;
        }
    </style>

</head>
<body>

<?php include "navbar.php"; ?>

<div class="container mt-4">

    <h2 class="text-center mb-3">🎮 Catálogo de Juegos</h2>

    <!-- FILTROS -->
    <form method="GET" class="row mb-4 justify-content-center g-2">

        <div class="col-md-3">
            <input type="text" 
                   name="q" 
                   class="form-control" 
                   placeholder="Buscar juego..." 
                   value="<?= htmlspecialchars($buscar) ?>">
        </div>

        <div class="col-md-3">
            <select name="genero" class="form-select">
                <option value="">🎯 Todos los géneros</option>
                <?php while($g = $generos->fetch_assoc()): ?>
                    <option value="<?= $g['idGenero']; ?>" <?= ($g['idGenero']==$idGenero) ? 'selected' : '' ?>>
                        <?= $g['nombre_genero']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="col-md-3">
            <select name="plataforma" class="form-select">
                <option value="">🕹 Todas las plataformas</option>
                <?php while($p = $plataformas->fetch_assoc()): ?>
                    <option value="<?= $p['idPlataforma']; ?>" <?= ($p['idPlataforma']==$idPlataforma) ? 'selected' : '' ?>>
                        <?= $p['nombre_plataforma']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="col-md-2">
            <button class="btn btn-info w-100">Filtrar</button>
        </div>
    </form>

    <!-- RESULTADOS -->
    <div class="row">

        <?php if($resultado->num_rows == 0): ?>
            <div class="col-12 text-center">
                <div class="alert alert-warning">No se encontraron juegos 😢</div>
            </div>
        <?php endif; ?>

        <?php while($juego = $resultado->fetch_assoc()): ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg h-100">
                <img src="img/juegos/<?= $juego['imagen']; ?>" height="220" class="card-img-top">

                <div class="card-body d-flex flex-column">
                    <h5><?= $juego['nombre']; ?></h5>
                    <small><?= $juego['descripcion']; ?></small>

                    <p class="mt-2"><b>🎮 Géneros:</b> <?= $juego['generos']; ?></p>
                    <p><b>🕹 Plataforma:</b> <?= $juego['plataformas']; ?></p>
                    <h5 class="mt-auto">$<?= $juego['precio']; ?></h5>

                    <a href="carrito.php?id=<?= $juego['idJuego']; ?>" 
                       class="btn btn-success w-100 mt-2">
                        Agregar al carrito
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
