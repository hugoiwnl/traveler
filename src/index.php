<?php

session_start();

require_once("controller/OtherController.php");
require_once("controller/RestaurantController.php");
require_once("controller/HotelController.php");
require_once("controller/UserController.php");
require_once("controller/CityController.php");
require_once("controller/ReviewController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("ASSETS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "assets/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

$urls = [
    "" => function(){
        ViewHelper::redirect(BASE_URL . "start");
    },
    "start" => function(){
        Other::pocetak();
    },
    "about" => function(){
        Other::AboutPage();
    },
    "hotels/detail" => function(){
        if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["daterange"])){
            UserController::addBooking();
        }elseif($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["rating"])){
            Review::addReview();
        }elseif($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["del"])){
            Review::deleteReview();
        }else{
            Hotel::detail();
        }
        
    },
    "restaurants/detail" => function(){
        if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["username"])){
            Review::addReview();
        }elseif($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["review_id"])){
            Review::deleteReview();
        }else{
            Res::detail();
        }
        
    },
    "login" => function(){
        if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["in"])){
            UserController::login1();
        }elseif($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["nm"])){
            UserController::register();
        }else{
            UserController::showLoginForm();
        }
    },
    "logout" => function(){
        UserController::logout();
    },
    "api/city/search" => function(){
        CityController::searchApi();
    },
    "city" => function(){
        CityController::index();
    },
    "city/hotels" => function(){
        Hotel::hotelsInCity();
    },
    "city/restaurants" => function(){
        Res::resInCity();
    },
    "user" => function(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            UserController::deleteBooking();
        }else{
            UserController::viewProfile();
        }
        
    }
    
];

try {
    if (isset($urls[$path])) {
       $urls[$path]();
    } else {
        echo "No controller for '$path'";
    }
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
    // ViewHelper::error404();
} 