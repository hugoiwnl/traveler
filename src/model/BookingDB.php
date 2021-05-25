<?php

require_once "DBInit.php";

class BookingDB{

    public static function insertBooking($user_id, $hotel_name, $dates,$price,$people){
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO bookings (user_id,hotel_name, dates,price,people) 
            VALUES (:user_id,:hotel_id, :dates,:price,:people)");
        $statement->bindParam(":user_id", $user_id);
        $statement->bindParam(":hotel_id", $hotel_name);
        $statement->bindParam(":dates", $dates);
        $statement->bindParam(":price", $price);
        $statement->bindParam(":people", $people);
        $statement->execute();
    }

    public static function getBookings($user_id){
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT booking_id,user_id,hotel_name, dates,price,people FROM bookings  
            WHERE user_id LIKE :user_id");
        $statement->bindValue(":user_id", '%' . $user_id . '%');
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function deleteBooking($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("DELETE FROM bookings WHERE booking_id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }
}