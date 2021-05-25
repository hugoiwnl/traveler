<?php
require_once("model/HotelDB.php");
require_once("model/CityDB.php");
require_once("ViewHelper.php");

class Hotel{


    public static function hotelsInCity(){
        if(isset($_GET["id"])){
            ViewHelper::render("view/city-hotels.php",["hotels" => HotelDB::getHC($_GET["id"])]);         
        }
    }

    public static function detail(){
        if(isset($_GET["id"])){
            ViewHelper::render("view/hotel-detail.php",["hotel" => HotelDB::getHotel($_GET["id"]),
                                                        "reviews" =>  ReviewDB::getReviews($_GET["id"], "hotel")]);
        }
    }

}