<?php
require_once '../models/Producto.php';
require_once '../models/Movimiento.php';

class DashboardController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?c=Auth&a=login");
            exit;
        }

        $productoModel = new Producto();
        $movimientoModel = new Movimiento();

        $totalProductos = $productoModel->contar();
        $totalMovimientos = $movimientoModel->contar();
        $productosBajos = $productoModel->stockBajo();
        $ultimosMovimientos = $movimientoModel->getAll();

        require_once '../views/dashboard/index.php';
    }
}
?>