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

    //Agrego una nueva reserva a la base de datos
    public function saveReserve($room_number, $user_id, $check_in, $check_out) {
        $sentence = $this->db->prepare("INSERT INTO bookings(fk_room_number, fk_user_id, check_in, check_out) VALUE (?, ?, ?, ?)");
        return $sentence->execute([$room_number, $user_id, $check_in, $check_out]);
    }

    //Función para traer todas las reservas de una usuario
    public function getBookingsByUserId($user_id){
        $sentence = $this->db->prepare("SELECT * FROM bookings WHERE fk_user_id = ?");
        //ejecuto sentencia
        $sentence->execute([$user_id]);
        $bookings = $sentence->fetchAll(PDO::FETCH_OBJ);

        return $bookings;
    }

    //Función para eliminar una reserva de la base de datos
    public function deleteById($booking_id){
        $sentence = $this->db->prepare("DELETE FROM bookings WHERE booking_id = ?");
        //ejecuto sentencia
        return $sentence->execute([$booking_id]);
    }

    //Función para traer de base de datos todas las reservaciones en orden cronológico
    public function getAllByDate(){
        $sentence = $this->db->prepare("SELECT * FROM bookings JOIN users WHERE bookings.fk_user_id = users.user_id ORDER BY check_in ASC");
        $sentence->execute();
        $bookings = $sentence->fetchAll(PDO::FETCH_OBJ);

        return $bookings;
    }
}