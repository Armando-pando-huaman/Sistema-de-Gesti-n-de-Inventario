<?php
session_start();
require_once '../config/database.php';

// Autoload de controladores
$controllerName = isset($_GET['c']) ? ucfirst($_GET['c']) . 'Controller' : 'AuthController';
$action = isset($_GET['a']) ? $_GET['a'] : 'login';

$controllerFile = "../controllers/" . $controllerName . ".php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerName();
    
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        die("Acción '$action' no encontrada.");
    }
} else {
    die("Controlador '$controllerName' no encontrado.");
}
?>