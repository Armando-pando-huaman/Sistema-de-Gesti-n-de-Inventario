<?php
class Movimiento {
    private $conn;
    private $table = "movimientos";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAll() {
        $query = "SELECT m.*, p.nombre AS producto, u.nombre AS usuario
                  FROM " . $this->table . " m
                  LEFT JOIN productos p ON m.producto_id = p.id
                  LEFT JOIN usuarios u ON m.usuario_id = u.id
                  ORDER BY m.fecha DESC LIMIT 100";
        return $this->conn->query($query)->fetchAll();
    }

    public function registrar($producto_id, $tipo, $cantidad, $motivo, $usuario_id) {
        // 1. Registrar movimiento
        $query = "INSERT INTO " . $this->table . " (producto_id, tipo, cantidad, motivo, usuario_id) 
                  VALUES (:producto_id, :tipo, :cantidad, :motivo, :usuario_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':producto_id' => $producto_id,
            ':tipo' => $tipo,
            ':cantidad' => $cantidad,
            ':motivo' => $motivo,
            ':usuario_id' => $usuario_id
        ]);

        // 2. Actualizar stock
        $operador = ($tipo === 'entrada') ? '+' : '-';
        $update = "UPDATE productos SET stock = stock $operador :cantidad WHERE id = :id";
        $stmt2 = $this->conn->prepare($update);
        return $stmt2->execute([':cantidad' => $cantidad, ':id' => $producto_id]);
    }

    public function contar() {
        return $this->conn->query("SELECT COUNT(*) FROM " . $this->table)->fetchColumn();
    }
}
?>