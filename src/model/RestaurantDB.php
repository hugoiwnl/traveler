<?php

require_once "DBInit.php";

class RestaurantDB{

    public static function getForIds($ids) {
        $db = DBInit::getInstance();

        $id_placeholders = implode(",", array_fill(0, count($ids), "?"));

        $statement = $db->prepare("SELECT id, nm, loc, food, rating, descr,city_id, city, pic FROM restaurants 
            WHERE id IN (" . $id_placeholders . ")");
        $statement->execute($ids);

        return $statement->fetchAll();
    }

    public static function getAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, nm, loc, food, rating, descr, city_id, city, pic, pic1, site FROM restaurants");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function getResInCity($city){
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, nm, loc, food, rating, descr, city_id, city, pic, pic1, site FROM restaurants  
            WHERE city_id LIKE :city");
        $statement->bindValue(":city", '%' . $city . '%');
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function getRes($id){
        
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, nm, loc, food, rating, descr, city_id, city, pic, pic1, site 
            FROM restaurants WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        $restaurant = $statement->fetch();

        if ($restaurant != null) {
            return $restaurant;
        } else {
            throw new InvalidArgumentException("No restaurant with id of $id");
        }
        
    }

}