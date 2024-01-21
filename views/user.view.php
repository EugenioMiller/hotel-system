<?php

require_once('libs/Smarty.class.php');

class UserView {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', "Hotel");
    }

    // public function showListRooms($rooms, $user = null){
    //     $this->smarty->assign('list',"Lista de habitaciones");
    //     $this->smarty->assign('user', $user);
    //     $this->smarty->display('showListRooms.tpl');
    // }

    public function showHome() {
        $this->smarty->display('home.tpl');
    }

    public function showLoginForm($error = null, $user = null, $name = null, $surname = null) {
        $this->smarty->assign('error', $error);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('name', $name);
        $this->smarty->assign('surname', $surname);
        $this->smarty->display('loginForm.tpl');
    }

    public function showFormRegister() {
        $this->smarty->display('registerForm.tpl');
    }
}