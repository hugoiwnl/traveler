<?php

require_once "DBInit.php";

class CityDB{

    public static function getAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, nm, descr, pic, pic1, lat, lng FROM city");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function get($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, nm, descr, pic, pic1, lat, lng FROM city 
            WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        $city = $statement->fetch();

        if ($city != null) {
            return $city;
        } else {
            throw new InvalidArgumentException("No record with id $id");
        }
    }

    public static function search($query) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, nm, descr, pic, pic1, lat, lng FROM city 
            WHERE nm LIKE :query");
        $statement->bindValue(":query", '%' . $query . '%');
        $statement->execute();

        return $statement->fetchAll();
    } 

}