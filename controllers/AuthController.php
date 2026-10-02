<?php
require_once '../models/Usuario.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $usuarioModel = new Usuario();
            $user = $usuarioModel->login($email, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_nombre'] = $user['nombre'];
                $_SESSION['user_rol'] = $user['rol'];
                header("Location: index.php?c=Dashboard&a=index");
                exit;
            } else {
                $error = "Credenciales incorrectas.";
            }
        }
        require_once '../views/auth/login.php';
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?c=Auth&a=login");
        exit;
    }
}
?>