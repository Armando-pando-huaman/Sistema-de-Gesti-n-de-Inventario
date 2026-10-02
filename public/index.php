<?php
require_once '../config/database.php';

// Autoload simple de controladores
$controller = isset($_GET['c']) ? $_GET['c'] : 'Usuario';
$action = isset($_GET['a']) ? $_GET['a'] : 'index';

$controllerFile = "../controllers/" . $controller . "Controller.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClass = $controller . "Controller";
    $obj = new $controllerClass();
    
    if (method_exists($obj, $action)) {
        $obj->$action();
    } else {
        echo "Acción no encontrada.";
    }
} else {
    echo "Controlador no encontrado.";
}
?>