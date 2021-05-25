<?php

require_once "DBInit.php";

class ReviewDB{


    public static function insertReview($type, $object_id, $username, $rating, $description){
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO reviews (type, object_id, username, rating, description) 
            VALUES (:type, :object_id, :username, :rating, :description)");
        $statement->bindParam(":type", $type);
        $statement->bindParam(":object_id", $object_id);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":rating", $rating);
        $statement->bindParam(":description", $description);
        $statement->execute();
    }

    public static function getReviews($id, $type){
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT review_id, type, object_id, username, rating, description FROM reviews  
            WHERE object_id LIKE :id AND type LIKE :type");
        $statement->bindValue(":id", '%' . $id . '%');
        $statement->bindValue(":type", '%' . $type . '%');
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function deleteReview($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("DELETE FROM reviews WHERE review_id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }


}