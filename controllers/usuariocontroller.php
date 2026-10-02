<?php
class usuarioController {
    
    public function index() {
        // Aquí llamaríamos al modelo para obtener datos
        // require_once '../models/Usuario.php';
        // $model = new Usuario();
        // $usuarios = $model->getAll();
        
        // Cargar la vista
        require_once '../views/usuarios/index.php';
    }

    public function login() {
        if($_POST) {
            // Lógica de autenticación
            // ...
        }
        require_once '../views/usuarios/login.php';
    }
}
?>