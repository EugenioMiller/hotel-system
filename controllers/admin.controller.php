<?php

require_once 'models/room.model.php';
require_once 'views/admin.view.php';

class AdminController {

    private $roomModel;
    private $view;

    public function __construct() {
        $this->roomModel = new RoomModel();
        $this->view = new AdminView();
    }

    //Barrera de seguridad
    //Compruebo que el usuario que esté logueado sea administrador
    private function checkAdminUser() {

        session_start(); 
        $user = $this->user();
        $admin = $user["is_admin"];

        if ($admin === 0 || !isset($_SESSION['logged'])) {
            header('Location: ' . BASE_URL . 'home');
            die();
        }

    }

    //Chequea que sea administrador para entrar en vista principal
    public function showAdmin() {
        $this->checkAdminUser();
        $this->showAllRooms();
    }

    //Muestra la vista principal de los administradores
    public function showAllRooms(){
        $rooms = $this->roomModel->getAllRooms();
        $this->view->adminTasks(null, null, $rooms);
    }

    public function newRoom() {
        $this->checkAdminUser();
        $this->view->addRoom();
    }

    public function createRoom() {
        $this->checkAdminUser();

        //Tomo datos del formulario
        $room_number= $_POST['room_number'];
        $beds= $_POST['beds'];
        $air=$_POST['air'];
        $tv= $_POST['tv'];
        $wifi= $_POST['wifi'];
        $price= $_POST['price'];

        //Primero compruebo que no lleguen datos vacíos
        if($room_number === "" || $beds === "" || $price === ""){
            $this->view->addRoom(null, null, "Complete todos los datos para poder agregar habitación");
            die();
        }

        //Segundo compruebo que el número de habitación no exista en la DB
        $numberExist = $this->roomModel->getRoomByNumber($room_number); 
        if($numberExist) {
            $this->view->addRoom(null, null, "El número de habitación ya existe");
            die();
        }

        //Si pasa los filtros, agrego la habitación a la DB

        $this->roomModel->addNewRoom($room_number, $beds, $air, $tv, $wifi, $price);
        $this->showAllRooms();

    }

    //Función para eliminar una habitación
    public function delete($room_number){
        //Compruebo que sea un administrador
        $this->checkAdminUser();
        //Busco la habitación a eliminar en la base de datos
        $this->roomModel->deleteRoom($room_number);
        //Mando al viewUsuario los libros
        $this->showAllRooms();  
    }

    //Función que envía a vista de edición de habitación
    public function showEdit($room_number){
        //Compruebo que sea un administrador
        $this->checkAdminUser();
        $room = $this->roomModel->getRoomByNumber($room_number);

        $this->view->editRoom(null, null, null, $room);
    }

    //Función que envía los datos nuevos al modelo
    public function edit($room_number){
        $this->checkAdminUser();
        //Tomo datos del formulario
        $beds= $_POST['beds'];
        $air=$_POST['air'];
        $tv= $_POST['tv'];
        $wifi= $_POST['wifi'];
        $price= $_POST['price'];

        //Primero compruebo que no lleguen datos vacíos
        if($beds === "" || $price === ""){
            $room = $this->roomModel->getRoomByNumber($room_number);
            $this->view->editRoom(null, null, "Complete todos los datos para poder editar habitación", $room);
            die();
        }

        $this->roomModel->updateRoom($room_number, $beds, $air, $tv, $wifi, $price);
        $this->showAllRooms();
    }


    private function user(){
        if (isset($_SESSION['logged'])){
            $user= $_SESSION;
        }
        return $user;
    }
}