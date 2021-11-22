<?php
include_once 'database.php';
include_once '../../models/User.php';

class AccountRepository{
    public function getUserByUsername($username){
        $db = new Database();

        try {
            $conn = $db->getConnection();
        
            $stmt = $conn->prepare("SELECT `id`, `username`, `password`, `created_at` FROM `users` 
            WHERE `username` = :username");
            $stmt->bindValue(':username', $username);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_CLASS,'User');
            
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            echo $e->getLine();
        }
        $conn = null;

        return count($users) >0 ? $users[0]:null;        
    }

    public function createUser($username, $password){
        $db = new Database();

        try {
            $conn = $db->getConnection();

            $sql = "INSERT INTO `users`( `username`, `password`) 
            VALUES (:username,:pwd)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':pwd', $password);

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            echo $e->getLine();
        }
        $conn = null;
    }
}