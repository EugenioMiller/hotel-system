<?php
    // require_once 'controllers/public.controller.php';
    // require_once 'controllers/admin.controller.php';
    require_once 'controllers/user.controller.php';

    // Se define la URL base de forma dinámica
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    // Se define la acción por defecto
    if (empty($_GET['action'])) {
        $_GET['action'] = 'home';
    } 

    // toma la acción que viene del usuario y parsea los parámetros
    $accion = $_GET['action']; 
    $parametros = explode('/', $accion);

    // decide que camino tomar según TABLA DE RUTEO
    switch ($parametros[0]) {
        case 'home':
            $controller = new UserController();
            $controller->showHome();
        break;
        case 'login':
            $controller = new UserController();
            $controller->showLogin();
        break;
        case "verifyUser": 
            $controller = new UserController();
            $controller->verifyUser();
        break;
        case 'register':
            $controller = new UserController();
            $controller->showRegisterForm();
        break;
        case 'registerComplete':
            $controller = new UserController();
            $controller->sendRegister();
        break;
        case 'logout':
            $controller = new UserController();
            $controller->logout();
        break;
        default:  
            $controller = new UserController();
            $controller->showHome();
        break;

    }