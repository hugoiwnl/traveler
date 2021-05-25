<?php
require_once("model/ReviewDB.php");
require_once("ViewHelper.php");

class Review{

    public static function addReview(){
        if(isset($_POST["username"]) && isset($_POST["object_id"]) && isset($_POST["rating"]) && isset($_POST["descr"])){
            ReviewDB::insertReview($_POST["type"],$_POST["object_id"],$_POST["username"],$_POST["rating"],$_POST["descr"]);
            if($_POST["type"]=="hotel"){
                ViewHelper::redirect(BASE_URL . "hotels/detail?id=" . $_POST["object_id"]);
            }else{
                ViewHelper::redirect(BASE_URL . "restaurants/detail?id=" . $_POST["object_id"]);
            }
        }
    }
    public static function deleteReview(){
        if(isset($_POST["review_id"])){
            ReviewDB::deleteReview($_POST["review_id"]);
        if($_POST["type"]=="hotel"){
            ViewHelper::redirect(BASE_URL . "hotels/detail?id=" . $_POST["object_id"]);
        }else{
            ViewHelper::redirect(BASE_URL . "restaurants/detail?id=" . $_POST["object_id"]);
        }
        }
    }
}