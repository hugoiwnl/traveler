<?php
require_once("model/RestaurantDB.php");
require_once("model/ReviewDB.php");
require_once("ViewHelper.php");

class Res{

    public static function resInCity(){
        if(isset($_GET["id"])){
            ViewHelper::render("view/city-restaurants.php",["restaurants" => RestaurantDB::getResInCity($_GET["id"])]);
            
        }
    }

    public static function detail(){
        if(isset($_GET["id"])){
            ViewHelper::render("view/restaurant-detail.php",["restaurant" => RestaurantDB::getRes($_GET["id"]),
                                                            "reviews" =>  ReviewDB::getReviews($_GET["id"], "restaurant")]);
        }
    }

}