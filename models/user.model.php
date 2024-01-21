<?php

class UserModel {

    public function __construct() {
        $this->db = $this->createConection();
    }

    private function createConection() {
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_hotel';
        $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName , $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public function getUser($email) {
        $sentencia = $this->db->prepare("SELECT users.name, users.surname, users.user_id, users.email, users.password, users.is_admin FROM users WHERE email = ?");
        $sentencia->execute([$email]);
        $usuario= $sentencia->fetch(PDO::FETCH_OBJ);

        return $usuario;
    }

    public function newUser($name, $surname, $email, $encrypt){
        $sentencia = $this->db->prepare("INSERT INTO users(name, surname, email, password, is_admin) VALUE (?,?,?,?,?)");
        return $sentencia->execute([$name, $surname, $email, $encrypt, 0]);
    }

    
}