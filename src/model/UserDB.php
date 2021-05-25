<?php

require_once "DBInit.php";

class UserDB {

    // Returns true if a valid combination of a username and a password are provided.
    public static function validLoginAttempt($username, $password) {
        $dbh = DBInit::getInstance();

        //Prepared Statements from w3schools
        $stmt=$dbh -> prepare("SELECT COUNT(id) FROM users WHERE username = :username AND password = :passwd ");
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":passwd",$password);
        $stmt->execute();
        
        return $stmt->fetchColumn(0) == 1;
    }

    public static function getUser($username){
        $db = DBInit::getInstance();
        
        $statement = $db->prepare("SELECT id, username, password, nm FROM users WHERE username = :username;");
        $statement->bindParam(":username", $username);
        $statement->execute();

        
        return $statement->fetch();
    }

    public static function register($username, $password, $name){
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO users (username, password, nm) 
            VALUES (:username, :password, :nm)");
        $statement->bindParam(":username", $username);
        $statement->bindParam(":password", $password);
        $statement->bindParam(":nm", $name);
        $statement->execute();
    }

    public static function getAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, id, username, password, nm 
            FROM users");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function userExist($username){
        
        $db = DBInit::getInstance();
        $statement = $db->prepare("SELECT 1 FROM users WHERE username = :username;");
        $statement->bindParam(":username", $username);
        $statement->execute();

        
        return $statement->fetch();
    
    }
}