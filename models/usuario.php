<?php
class Usuario {
    private $conn;
    private $table = "usuarios";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function login($email, $password) {
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function crear($nombre, $email, $password, $rol) {
        $query = "INSERT INTO " . $this->table . " (nombre, email, password, rol) 
                  VALUES (:nombre, :email, :password, :rol)";
        $stmt = $this->conn->prepare($query);
        $hash = password_hash($password, PASSWORD_BCRYPT);
        return $stmt->execute([
            ':nombre' => $nombre, 
            ':email' => $email, 
            ':password' => $hash, 
            ':rol' => $rol
        ]);
    }
}
?>