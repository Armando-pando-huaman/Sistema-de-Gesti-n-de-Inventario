<?php
class Database {
    private $host = "sql100.infinityfree.com"; // Tu host de la imagen
    private $db_name = "ifo_40658765_Sistema_de_Gestion_de_Inventario"; // Tu BD
    private $username = "ifo_40658765"; // Tu usuario
    private $password = "gZGM9LZ9Cy9hR3K"; // La que ocultaste
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>