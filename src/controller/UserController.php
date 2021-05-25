<?php

require_once("model/UserDB.php");
require_once("model/BookingDB.php");
require_once("ViewHelper.php");
require_once("OtherController.php");


class UserController {

    public static function showLoginForm() {
       ViewHelper::render("view/login-form.php");
    }

    public static function login() {
       if (UserDB::validLoginAttempt($_POST["username"], $_POST["password"])) {
            
        $user = UserDB::getUser($_POST["username"]);
        $_SESSION["user"]=$user;
        ViewHelper::redirect("start");
       } else {
            ViewHelper::render("view/login-form.php", [
                "errorMessage" => "Invalid username or password."
            ]);
       }
    }
    public static function login1(){
        if(UserDB::userExist($_POST["username"])){
            $user = UserDB::getUser($_POST["username"]);
            if(password_verify($_POST["password"],$user["password"])){
                $_SESSION["user"]=$user;
                ViewHelper::redirect("start");
            }
            else {
                ViewHelper::render("view/login-form.php", [
                    "errorMessage" => "Invalid username or password."
                ]);
           }
        } 
    }

    public static function logout(){
        if(isset($_SESSION["user"])){
            unset($_SESSION["user"]);
        }
        ViewHelper::redirect("start");
    }

    public static function register(){
        if(isset($_POST["nm"]) && isset($_POST["username"]) && isset($_POST["password"])){
            $hashed = password_hash($_POST["password"], PASSWORD_DEFAULT);
            UserDB::register($_POST["username"],$hashed,$_POST["nm"]);
            ViewHelper::render("view/login-form.php", [
                "errorMessage1" => "You have succesfuly registered! Sign in to continue."
            ]);
        }
    }

    public static function getAll(){
        if(isset($_SESSION["user"])){
            ViewHelper::render("view/proba.php",["users" => UserDB::getAll()]);
        }
        ViewHelper::render("view/proba.php",["users" => UserDB::getAll()]);
    }

    public static function viewProfile(){
        if(isset($_SESSION["user"])){
            ViewHelper::render("view/user-detail.php",["bookings" => BookingDB::getBookings($_SESSION["user"]["id"])]);
        }
    }

    public static function addBooking(){
        if(isset($_SESSION["user"])){
            if(isset($_POST["people"])){
                BookingDB::insertBooking($_SESSION["user"]["id"],$_POST["hotel_name"],$_POST["daterange"],$_POST["price"],$_POST["people"]);
                ViewHelper::redirect(BASE_URL . "user");
            }
        }else{
            ViewHelper::render("view/hotel-detail.php",["hotel" => HotelDB::getHotel($_POST["hotel_id"]),
                                                        "reviews" =>  ReviewDB::getReviews($_POST["hotel_id"], "hotel"),
                                                        "errorMessage" => "Sign in to book a room!"]);
        }
    }

    public static function deleteBooking(){
        if(isset($_POST["booking_id"])){
            BookingDB::deleteBooking($_POST["booking_id"]);
            //ViewHelper::render("view/user-detail.php",["bookings" => BookingDB::getBookings($_SESSION["user"]["id"])]);
            ViewHelper::redirect(BASE_URL . "user");
        }
    }

}