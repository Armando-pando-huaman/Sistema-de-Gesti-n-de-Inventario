<?php require_once '../views/layouts/header.php'; ?>

<h2>✏️ Editar Producto</h2>
<form method="POST" class="row g-3">
    <div class="col-md-4">
        <label class="form-label">Código de Barras</label>
        <input type="text" name="codigo_barras" class="form-control" value="<?= htmlspecialchars($producto['codigo_barras']) ?>">
    </div>
    <div class="col-md-8">
        <label class="form-label">Nombre *</label>
        <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($producto['nombre']) ?>" required>
    </div>
    <div class="col-12">
        <label class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-control" rows="2"><?= htmlspecialchars($producto['descripcion']) ?></textarea>
    </div>
    <div class="col-md-3">
        <label class="form-label">Precio Compra</label>
        <input type="number" step="0.01" name="precio_compra" class="form-control" value="<?= $producto['precio_compra'] ?>">
    </div>
    <div class="col-md-3">
        <label class="form-label">Precio Venta *</label>
        <input type="number" step="0.01" name="precio_venta" class="form-control" value="<?= $producto['precio_venta'] ?>" required>
    </div>
    <div class="col-md-2">
        <label class="form-label">Stock *</label>
        <input type="number" name="stock" class="form-control" value="<?= $producto['stock'] ?>" required>
    </div>
    <div class="col-md-2">
        <label class="form-label">Stock Mínimo</label>
        <input type="number" name="stock_minimo" class="form-control" value="<?= $producto['stock_minimo'] ?>">
    </div>
    <div class="col-md-2">
        <label class="form-label">Vencimiento</label>
        <input type="date" name="fecha_vencimiento" class="form-control" value="<?= $producto['fecha_vencimiento'] ?>">
    </div>
    <div class="col-md-6">
        <label class="form-label">Categoría</label>
        <select name="categoria_id" class="form-select">
            <option value="">-- Seleccione --</option>
            <?php 
            $cats = [1=>'Analgésicos',2=>'Antibióticos',3=>'Antiinflamatorios',4=>'Vitaminas',5=>'Cuidado Personal'];
            foreach($cats as $id => $nombre): ?>
                <option value="<?= $id ?>" <?= $producto['categoria_id'] == $id ? 'selected' : '' ?>><?= $nombre ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="index.php?c=Producto&a=index" class="btn btn-secondary">Cancelar</a>
    </div>
</form>

<?php require_once '../views/layouts/footer.php'; ?>