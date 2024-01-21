<?php

require_once 'models/user.model.php';
require_once 'views/user.view.php';

class UserController {

    private $userModel;
    private $view;

    public function __construct() {
        $this->userModel = new UserModel();
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
        $this->view->showHome();
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

        if (!$user){
            $this->view->showLoginForm("El mail ingresado no está registado");
        } else{
            $this->view->showLoginForm("contraseña incorrecta");
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . 'login');
    }

    private function user(){
        if (session_start()){
            $user= $_SESSION;
        }
        return $user;
    }
}