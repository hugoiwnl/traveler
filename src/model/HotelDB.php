<?php

require_once "DBInit.php";

class HotelDB{

    public static function getForIds($ids) {
        $db = DBInit::getInstance();

        $id_placeholders = implode(",", array_fill(0, count($ids), "?"));

        $statement = $db->prepare("SELECT id, nm, loc, city, price, rating, stars,  descr, city_id, pic, pic1, pic2 FROM hotels 
            WHERE id IN (" . $id_placeholders . ")");
        $statement->execute($ids);

        return $statement->fetchAll();
    }

    public static function getAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, nm, loc, city, price, rating, stars,  descr, city_id, pic, pic1, pic2 FROM hotels");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function getHotel($id){
        
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, nm, loc, city, price, rating, stars,  descr, city_id, pic, pic1, pic2 
            FROM hotels WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        $hotel = $statement->fetch();

        if ($hotel != null) {
            return $hotel;
        } else {
            throw new InvalidArgumentException("No record with id $id");
        }
        
    }

    public static function getHC($city){
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, nm, loc, city, price, rating, stars,  descr, city_id, pic FROM hotels  
            WHERE city_id LIKE :city");
        $statement->bindValue(":city", '%' . $city . '%');
        $statement->execute();

        return $statement->fetchAll();
    }

}