<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">GameLatam</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarsExample03">
            <ul class="navbar-nav me-auto mb-2 mb-sm-0">

                <li class="nav-item">
                    <a class="nav-link" href="./productos.php">Productos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./carrito.php">Carrito 🛒</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Cuenta
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">

                    <?php if (isset($_SESSION['idUsuario'])): ?>

                        <li>
                            <a class="dropdown-item" href="mi_cuenta.php">
                                👤 Mi cuenta
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="mis_compras.php">
                                🧾 Mis compras
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger" href="logout.php">
                                🚪 Cerrar sesión
                            </a>
                        </li>

                    <?php else: ?>

                        <li>
                            <a class="dropdown-item" href="login.php">
                                🔐 Iniciar sesión
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="registro.php">
                                📝 Registrarse
                            </a>
                        </li>

                    <?php endif; ?>

                    </ul>
                </li>

            </ul>

            <form role="search" action="productos.php" method="GET">
                <input class="form-control" type="search" name="q" placeholder="Buscar juegos...">
            </form>

        </div>
    </div>
</nav>
