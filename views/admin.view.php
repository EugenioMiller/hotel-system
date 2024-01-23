<?php

require_once('libs/Smarty.class.php');

class AdminView {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('titulo', "Hotel");
    }

    public function adminTasks($userName = null, $admin = null, $rooms = null, $user_id) {
        $this->smarty->assign('userName', $userName);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('rooms', $rooms);
        $this->smarty->assign('user_id', $user_id);
        $this->smarty->display('admin.tpl');
    }

    public function addRoom($userName = null, $admin = null, $error = null) {
        $this->smarty->assign('userName', $userName);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('error', $error);
        $this->smarty->display('formAddRoom.tpl');
    }

    public function editRoom($userName = null, $admin = null, $error = null, $room = null) {
        $this->smarty->assign('userName', $userName);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('room', $room);
        $this->smarty->display('formEditRoom.tpl');
    }
}