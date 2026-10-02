<?php
class Producto {
    private $conn;
    private $table = "productos";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAll() {
        $query = "SELECT p.*, c.nombre AS categoria 
                  FROM " . $this->table . " p
                  LEFT JOIN categorias c ON p.categoria_id = c.id
                  ORDER BY p.id DESC";
        return $this->conn->query($query)->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function crear($data) {
        $query = "INSERT INTO " . $this->table . " 
                  (codigo_barras, nombre, descripcion, precio_compra, precio_venta, stock, stock_minimo, fecha_vencimiento, categoria_id) 
                  VALUES (:codigo, :nombre, :descripcion, :p_compra, :p_venta, :stock, :stock_min, :fecha_venc, :categoria)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }

    public function actualizar($data) {
        $query = "UPDATE " . $this->table . " SET 
                  codigo_barras = :codigo, nombre = :nombre, descripcion = :descripcion,
                  precio_compra = :p_compra, precio_venta = :p_venta, stock = :stock,
                  stock_minimo = :stock_min, fecha_vencimiento = :fecha_venc, categoria_id = :categoria
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }

    public function eliminar($id) {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table . " WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function contar() {
        return $this->conn->query("SELECT COUNT(*) FROM " . $this->table)->fetchColumn();
    }

    public function stockBajo() {
        return $this->conn->query("SELECT * FROM " . $this->table . " WHERE stock <= stock_minimo")->fetchAll();
    }
}
?>