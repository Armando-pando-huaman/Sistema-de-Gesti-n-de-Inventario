<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Inventario - Botica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once '../views/layouts/header.php'; ?>

    <div class="container mt-4">
        <h2>Gestión de Usuarios</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí iría un foreach de PHP con los datos -->
                <tr>
                    <td>1</td>
                    <td>Admin</td>
                    <td>admin@botica.com</td>
                    <td>Administrador</td>
                    <td><a href="#" class="btn btn-sm btn-warning">Editar</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php require_once '../views/layouts/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>