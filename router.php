<?php
    require_once 'controllers/admin.controller.php';
    require_once 'controllers/user.controller.php';

    // Se define la URL base de forma dinámica
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    // Se define la acción por defecto
    if (empty($_GET['action'])) {
        $_GET['action'] = 'home';
    } 

    // toma la acción que viene del usuario y parsea los parámetros
    $accion = $_GET['action']; 
    $params = explode('/', $accion);

    //Instancio controladores
    $userController = new UserController();
    $adminController = new AdminController();

    // decide que camino tomar según TABLA DE RUTEO
    switch ($params[0]) {
        case 'home':
            $userController->showHome();
        break;
        case 'login':
            $userController->showLogin();
        break;
        case "verifyUser": 
            $userController->verifyUser();
        break;
        case 'register':
            $userController->showRegisterForm();
        break;
        case 'registerComplete':
            $userController->sendRegister();
        break;
        case 'logout':
            $userController->logout();
        break;
        case 'searchRooms':
            $userController->search();
        break;
        case 'reserveRoom':
            $userController->reserve($params[1], $params[2], $params[3], $params[4]);
        break;
        case 'admin':
            $adminController->showAdmin();
        break;
        case 'addRoom':
            $adminController->newRoom();
        break;
        case 'createRoom':
            $adminController->createRoom();
        break;
        case 'editRoom':
            $adminController->showEdit($params[1]);
        break;
        case 'saveChanges':
            $adminController->edit($params[1]);
        break;
        case 'deleteRoom':
            $adminController->delete($params[1]);
        break;
        default:  
            $userController->showHome();
        break;

    }