<?php

require_once 'models/room.model.php';

class RoomModel {

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

    public function getAllRooms(){
        $sentence=$this->db->prepare("SELECT * FROM rooms ORDER BY room_number ASC");
        $sentence->execute();
        $rooms= $sentence->fetchAll(PDO::FETCH_OBJ);
        
        return $rooms;
    }

    //Función para traer datos de una habitación por su número 
    public function getRoomByNumber($number){
        $sentence = $this->db->prepare("SELECT * FROM rooms WHERE room_number = ?");
        //ejecuto sentencia
        $sentence->execute([$number]);
        $room= $sentence->fetch(PDO::FETCH_OBJ);

        return $room;
    }

    //Función para agregar una nueva habitación a la DB
    public function addNewRoom($room_number, $beds, $air, $tv, $wifi, $price) {
        $sentence = $this->db->prepare("INSERT INTO rooms(room_number, beds, air, tv, wifi, price) VALUE (?, ?, ?, ?, ?, ?)");
        $sentence->execute([$room_number, $beds, $air, $tv, $wifi, $price]);
    }

    //Función que elimina una habitación
    public function deleteRoom($room_number){
        $sentence = $this->db->prepare("DELETE FROM rooms WHERE room_number = ?");
        //ejecuto sentencia
        $sentence->execute([$room_number]);
    }

    //Función para editar una habitación en la base de datos
    public function updateRoom($room_number, $beds, $air, $tv, $wifi, $price){
        $sentence= $this->db->prepare("UPDATE rooms SET beds=?, air=?, tv=?, wifi=?, price=? WHERE rooms.room_number=?");
        $sentence->execute([$beds, $air, $tv, $wifi, $price, $room_number]);
    }
}