<?php

require_once 'models/user.model.php';
require_once 'models/room.model.php';
require_once 'models/booking.model.php';
require_once 'views/user.view.php';

class UserController {

    private $userModel;
    private $view;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->roomModel = new RoomModel();
        $this->bookingModel = new BookingModel();
        $this->view = new UserView();
    }

    //Barrera de seguridad
    //Chequeo que el usuario esté logueado
    private function checkLoggedUser() {

        session_start(); 

        if (!isset($_SESSION['logged'])) {
            header('Location: ' . BASE_URL . 'login');
            die();
        }

    }

    //Chequeo que el usuario no esté logueado
    private function checkNotLoggedUser() {

        session_start(); 

        if (isset($_SESSION['logged'])) {
            header('Location: ' . BASE_URL . 'home');
            die();
        }

    }

    public function showHome() {
        //Compruebo que el usuario esté logueado para ingresar al home
        $this->checkLoggedUser();
        $user = $this->user();
        $userName = $user["username"];
        $admin = $user["is_admin"];
        $user_id = $user["user_id"];
        $this->view->showHome($userName, $admin, $user_id);
    }

    public function showLogin() {
        //Compruebo que el usuario no esté logueado
        $this->checkNotLoggedUser();
        $this->view->showLoginForm();
    }

    public function showRegisterForm() {
        //Compruebo que el usuario no esté logueado
        $this->checkNotLoggedUser();
        $this->view->showFormRegister();
    }

    public function sendRegister(){
        $user= $this->user();
        $name= $_POST['name'];
        $surname= $_POST['surname'];
        $email= $_POST['email'];
        $password= $_POST['password'];

        
        //Compruebo que no queden campos sin completar
        if (!empty($name) && !empty($surname) &&!empty($email) && !empty($password)){
            //Compruebo que el email ingresado no exista en la base de datos
            $succes= $this->userModel->getUser($email);
            if ($succes){
                $this->view->showError("El email ingresado ya está registrado", $user);
            }
            else{
            $encrypt = password_hash ($password, PASSWORD_DEFAULT); //Encripto contraseña de usuario
            $succes = $this->userModel->newUser($name, $surname, $email, $encrypt);
                if ($succes){
                    $this->view->showLoginForm(null, null, $name, $surname);
                }
            }
        }
        else{
            $this->view->showError("No completó todos los campos", $user);
            die();
        }
    }

    //Compruebo si es un usaurio existe en la base de datos
    public function verifyUser() {
        $usermail = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userModel->getUser($usermail);

        if ($user && password_verify($password, $user->password)) { 

            session_start();
            $_SESSION['logged'] = true;
            $_SESSION['user_id'] = $user->user_id;
            $_SESSION['usermail'] = $user->email;
            $_SESSION['username'] = $user->name;
            $_SESSION['usersurname'] = $user->surname;
            $_SESSION['is_admin']= $user->is_admin;
            
            header("Location: " . BASE_URL . "home");
        }

        //var_dump($user);

        if (!$user)
            $this->view->showLoginForm("El mail ingresado no está registado");
        else
            $this->view->showLoginForm("La contraseña es incorrecta");
        
    }

    //Método de deslogueo
    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . 'login');
    }

    //Función de búsqueda de habitaciones por fecha
    public function search() {
        $this->checkLoggedUser();
        //Tomo los valores de búsqueda
        $check_in = $_POST['check_in'];
        $check_out = $_POST['check_out'];

        $user = $this->user();
        $userName = $user["username"];
        $admin =  $user["is_admin"];
        $user_id = $user["user_id"];

        //Compruebo que los campos no estén vacíos
        if(empty($check_in) || empty($check_out)){
            $this->view->showHome($userName, $admin, "Indique ambas fechas para realizar la búsqueda");
            die();
        }

        $rooms = $this->roomModel->getFreeRooms($check_in, $check_out);

        $this->view->showResults($userName, $admin, $rooms, $user_id, $check_in, $check_out);
    }

    //Método que envía la reserva al modelo
    public function reserve($room_number, $user_id, $check_in, $check_out) {
        $this->checkLoggedUser();
        //Envío los datos al modelo de booking para que realice la reserva
        $succes = $this->bookingModel->saveReserve($room_number, $user_id, $check_in, $check_out);

        $user = $this->user();
        $userName = $user["username"];
        $admin =  $user["is_admin"];

        if($succes)
            $this->view->reserveComplete($userName, $admin, $room_number, $user_id, $check_in, $check_out);
        else 
            $this->view->error($userName, $admin, $room_number, $check_in, $check_out. "Ocurrió un error inseperado al intentar reservar la habitación");
    }

    //Redirecciona a la vista de todas las reservas realizadas por una persona
    public function showReserves($user_id){
        //Compruebo que sea un usuario logueado
        $this->checkLoggedUser();

        //Traigo todas las reservas de ese usuario
        $bookings = $this->bookingModel->getBookingsByUserId($user_id);

        $user = $this->user();
        $userName = $user["username"];
        $admin =  $user["is_admin"];
        $user_id = $user["user_id"];

        $this->view->showBookings($userName, $admin, $user_id, $bookings);
    }

    //Envía la información al modelo para eliminar una reserva realizada
    public function deleteBooking($booking_id){
        //Compruebo que sea un usuario logueado
        $this->checkLoggedUser();

        $user = $this->user();
        $userName = $user["username"];
        $admin =  $user["is_admin"];
        $user_id = $user["user_id"];

        $success = $this->bookingModel->deleteById($booking_id);

        if($success)
            $this->view->successCancel($userName, $admin, $user_id);
        else
            $this->view->failCancel($userName, $admin, $user_id);
    }

    //Tomo el usuario que está logueado
    private function user(){
        if (isset($_SESSION['logged'])){
            $user= $_SESSION;
        }
        return $user;
    }
}