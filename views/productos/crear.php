<?php require_once '../views/layouts/header.php'; ?>

<h2>➕ Nuevo Producto</h2>
<form method="POST" class="row g-3">
    <div class="col-md-4">
        <label class="form-label">Código de Barras</label>
        <input type="text" name="codigo_barras" class="form-control">
    </div>
    <div class="col-md-8">
        <label class="form-label">Nombre *</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="col-12">
        <label class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-control" rows="2"></textarea>
    </div>
    <div class="col-md-3">
        <label class="form-label">Precio Compra</label>
        <input type="number" step="0.01" name="precio_compra" class="form-control" value="0.00">
    </div>
    <div class="col-md-3">
        <label class="form-label">Precio Venta *</label>
        <input type="number" step="0.01" name="precio_venta" class="form-control" required>
    </div>
    <div class="col-md-2">
        <label class="form-label">Stock *</label>
        <input type="number" name="stock" class="form-control" required value="0">
    </div>
    <div class="col-md-2">
        <label class="form-label">Stock Mínimo</label>
        <input type="number" name="stock_minimo" class="form-control" value="5">
    </div>
    <div class="col-md-2">
        <label class="form-label">Vencimiento</label>
        <input type="date" name="fecha_vencimiento" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label">Categoría</label>
        <select name="categoria_id" class="form-select">
            <option value="">-- Seleccione --</option>
            <option value="1">Analgésicos</option>
            <option value="2">Antibióticos</option>
            <option value="3">Antiinflamatorios</option>
            <option value="4">Vitaminas</option>
            <option value="5">Cuidado Personal</option>
        </select>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="index.php?c=Producto&a=index" class="btn btn-secondary">Cancelar</a>
    </div>
</form>

<?php require_once '../views/layouts/footer.php'; ?>