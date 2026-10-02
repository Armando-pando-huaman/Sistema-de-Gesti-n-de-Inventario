<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botica System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?c=Dashboard&a=index">
        <i class="bi bi-capsule-pill"></i> Botica System
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php?c=Dashboard&a=index">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?c=Producto&a=index">
                <i class="bi bi-box-seam"></i> Productos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?c=Movimiento&a=index">
                <i class="bi bi-arrow-left-right"></i> Movimientos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?c=Venta&a=index">
                <i class="bi bi-cart-check"></i> Ventas
            </a>
        </li>
        <?php if (($_SESSION['user_rol'] ?? '') === 'admin'): ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?c=Usuario&a=index">
                    <i class="bi bi-people"></i> Usuarios
                </a>
            </li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['user_nombre'] ?? 'Invitado') ?>
                <span class="badge bg-light text-primary ms-1"><?= $_SESSION['user_rol'] ?? '' ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> Mi Perfil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger" href="index.php?c=Auth&a=logout">
                        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                    </a>
                </li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<main class="container-fluid mt-4 px-4">