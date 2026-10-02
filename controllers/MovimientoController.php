<?php
require_once '../models/Movimiento.php';
require_once '../models/Producto.php';

class MovimientoController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?c=Auth&a=login");
            exit;
        }

        $movModel = new Movimiento();
        $prodModel = new Producto();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $movModel->registrar(
                $_POST['producto_id'],
                $_POST['tipo'],
                $_POST['cantidad'],
                $_POST['motivo'],
                $_SESSION['user_id']
            );
            header("Location: index.php?c=Movimiento&a=index");
            exit;
        }

        $movimientos = $movModel->getAll();
        $productos = $prodModel->getAll();
        require_once '../views/movimientos/index.php';
    }
}
?>