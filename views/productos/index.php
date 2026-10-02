<?php require_once '../views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>💊 Productos</h2>
    <a href="index.php?c=Producto&a=crear" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Nuevo Producto
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th><th>Código</th><th>Nombre</th><th>Categoría</th>
                <th>P. Venta</th><th>Stock</th><th>Vence</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= htmlspecialchars($p['codigo_barras'] ?? '-') ?></td>
                <td><?= htmlspecialchars($p['nombre']) ?></td>
                <td><?= htmlspecialchars($p['categoria'] ?? '-') ?></td>
                <td>S/ <?= number_format($p['precio_venta'], 2) ?></td>
                <td>
                    <span class="badge bg-<?= $p['stock'] <= $p['stock_minimo'] ? 'danger' : 'success' ?>">
                        <?= $p['stock'] ?>
                    </span>
                </td>
                <td><?= $p['fecha_vencimiento'] ?? '-' ?></td>
                <td>
                    <a href="index.php?c=Producto&a=editar&id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <a href="index.php?c=Producto&a=eliminar&id=<?= $p['id'] ?>" 
                       class="btn btn-sm btn-danger" 
                       onclick="return confirm('¿Eliminar producto?')">
                        <i class="bi bi-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if (empty($productos)): ?>
                <tr><td colspan="8" class="text-center text-muted">No hay productos registrados.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once '../views/layouts/footer.php'; ?>