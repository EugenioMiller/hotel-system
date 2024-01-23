<?php

require_once('libs/Smarty.class.php');

class UserView {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', "Hotel");
    }

    public function showHome($userName = null, $admin = null, $user_id = null, $error = null) {
        $this->smarty->assign('userName', $userName);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('user_id', $user_id);
        $this->smarty->assign('error', $error);
        $this->smarty->display('home.tpl');
    }

    public function showLoginForm($error = null, $name = null, $surname = null) {
        $this->smarty->assign('error', $error);
        $this->smarty->assign('name', $name);
        $this->smarty->assign('surname', $surname);
        $this->smarty->display('loginForm.tpl');
    }

    public function showFormRegister() {
        $this->smarty->display('registerForm.tpl');
    }

    public function showResults($userName = null, $admin = null, $rooms = null, $user_id = null, $check_in, $check_out){
        $this->smarty->assign('userName', $userName);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('rooms', $rooms);
        $this->smarty->assign('user_id', $user_id);
        $this->smarty->assign('check_in', $check_in);
        $this->smarty->assign('check_out', $check_out);
        $this->smarty->display('results.tpl');
    }

    public function reserveComplete($userName = null, $admin = null, $room_number, $user_id, $check_in, $check_out) {
        $this->smarty->assign('userName', $userName);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('room_number', $room_number);
        $this->smarty->assign('user_id', $user_id);
        $this->smarty->assign('check_in', $check_in);
        $this->smarty->assign('check_out', $check_out);
        $this->smarty->display('successReserve.tpl');
    }

    public function error($userName = null, $admin = null, $room_number, $user_id, $check_in, $check_out) {
        $this->smarty->assign('userName', $userName);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('room_number', $room_number);
        $this->smarty->assign('user_id', $user_id);
        $this->smarty->assign('check_in', $check_in);
        $this->smarty->assign('check_out', $check_out);
        $this->smarty->display('errorReserved.tpl');
    }

    public function showBookings($userName = null, $admin = null, $user_id = null, $bookings){
        $this->smarty->assign('userName', $userName);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('user_id', $user_id);
        $this->smarty->assign('bookings', $bookings);
        $this->smarty->display('bookings.tpl');
    }

    public function successCancel($userName = null, $admin = null,  $user_id, ) {
        $this->smarty->assign('userName', $userName);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('user_id', $user_id);
        $this->smarty->display('successCancel.tpl');
    }

    public function failCancel($userName = null, $admin = null,  $user_id, ) {
        $this->smarty->assign('userName', $userName);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('user_id', $user_id);
        $this->smarty->display('failCancel.tpl');
    }
}