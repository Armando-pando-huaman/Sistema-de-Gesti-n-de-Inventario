<?php require_once '../views/layouts/header.php'; ?>

<h2>🔄 Movimientos de Inventario</h2>

<div class="row">
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Registrar Movimiento</div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-2">
                        <label class="form-label">Producto</label>
                        <select name="producto_id" class="form-select" required>
                            <option value="">-- Seleccione --</option>
                            <?php foreach ($productos as $p): ?>
                                <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nombre']) ?> (Stock: <?= $p['stock'] ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Tipo</label>
                        <select name="tipo" class="form-select" required>
                            <option value="entrada">Entrada (+)</option>
                            <option value="salida">Salida (-)</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Cantidad</label>
                        <input type="number" name="cantidad" class="form-control" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Motivo</label>
                        <input type="text" name="motivo" class="form-control" placeholder="Ej: Venta, Compra, Ajuste">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Registrar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="table-responsive">
            <table class="table table-sm table-hover">
                <thead class="table-dark">
                    <tr><th>Fecha</th><th>Producto</th><th>Tipo</th><th>Cantidad</th><th>Motivo</th><th>Usuario</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($movimientos as $m): ?>
                    <tr>
                        <td><?= $m['fecha'] ?></td>
                        <td><?= htmlspecialchars($m['producto'] ?? '-') ?></td>
                        <td>
                            <span class="badge bg-<?= $m['tipo'] === 'entrada' ? 'success' : 'danger' ?>">
                                <?= ucfirst($m['tipo']) ?>
                            </span>
                        </td>
                        <td><?= $m['cantidad'] ?></td>
                        <td><?= htmlspecialchars($m['motivo'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($m['usuario'] ?? '-') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once '../views/layouts/footer.php'; ?>