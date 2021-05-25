<?php
require_once("model/CityDB.php");
require_once("ViewHelper.php");
class CityController{

    public static function index(){
        if($_SERVER["REQUEST_METHOD"]=="GET"){
            ViewHelper::render("view/city-detail.php", ["city" => CityDB::get($_GET["id"])]);
        }
    }

    public static function searchApi() {
        if (isset($_GET["query"]) && !empty($_GET["query"])) {
            $hits = CityDB::search($_GET["query"]);
        } else {
            $hits = [];
        }

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($hits);
    }

    

    


}