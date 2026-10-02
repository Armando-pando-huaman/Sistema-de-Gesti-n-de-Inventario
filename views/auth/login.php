<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Botica System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="login-body">

<div class="login-container">
    <div class="login-card">
        <div class="login-logo">
            <i class="bi bi-capsule-pill"></i>
            <h2>Botica System</h2>
            <p>Sistema de Gestión de Inventario</p>
        </div>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-triangle"></i> <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <div id="alertaLogin" class="alert alert-danger" style="display:none;"></div>

        <form method="POST" id="loginForm">
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-envelope"></i> Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" 
                       placeholder="usuario@botica.com" required autofocus>
            </div>s
            <div class="mb-4">
                <label class="form-label"><i class="bi bi-lock"></i> Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" 
                       placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn-login" id="btnLogin">
                <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
            </button>
        </form>

        <div class="login-footer">
            &copy; <?= date('Y') ?> Botica System - Todos los derechos reservados
        </div>
    </div>
</div>

<script src="js/script.js"></script>
</body>
</html>