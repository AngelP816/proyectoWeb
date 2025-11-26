<?php
include "config/conexion.php";
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $correo, $password);

    if ($stmt->execute()) {
        $mensaje = "Usuario registrado correctamente ✅";
    } else {
        $mensaje = "Error: El correo ya existe";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5" style="max-width:500px;">
    <div class="card p-4 shadow">
        <h3 class="text-center mb-3">Crear cuenta</h3>

        <?php if($mensaje): ?>
            <div class="alert alert-info"><?= $mensaje ?></div>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="nombre" placeholder="Nombre completo" class="form-control mb-3" required>
            <input type="email" name="correo" placeholder="Correo" class="form-control mb-3" required>
            <input type="password" name="password" placeholder="Contraseña" class="form-control mb-3" required>

            <button class="btn btn-success w-100">Registrarse</button>
        </form>
    </div>
</div>

</body>
</html>
