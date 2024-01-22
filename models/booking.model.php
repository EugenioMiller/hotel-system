<?php

class BookingModel {

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

    public function saveReserve($room_number, $user_id, $check_in, $check_out) {
        $sentence = $this->db->prepare("INSERT INTO bookings(fk_room_number, fk_user_id, check_in, check_out) VALUE (?, ?, ?, ?)");
        return $sentence->execute([$room_number, $user_id, $check_in, $check_out]);
    }
}