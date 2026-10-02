<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Botica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?c=Dashboard&a=index">
        <i class="bi bi-capsule"></i> Botica System
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="index.php?c=Dashboard&a=index">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?c=Producto&a=index">Productos</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?c=Movimiento&a=index">Movimientos</a></li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
            <span class="navbar-text me-3">
                <i class="bi bi-person-circle"></i> <?= $_SESSION['user_nombre'] ?? 'Invitado' ?>
            </span>
        </li>
        <li class="nav-item">
            <a class="btn btn-outline-light btn-sm" href="index.php?c=Auth&a=logout">Salir</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<main class="container-fluid mt-4">