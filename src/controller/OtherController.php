<?php
require_once("ViewHelper.php");

class Other{
    public static function pocetak(){
        ViewHelper::render("view/enterscreen.php");
    }

    public static function AboutPage(){
        ViewHelper::render("view/about.php");
    }
}