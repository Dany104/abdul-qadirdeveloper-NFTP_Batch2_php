<?php
include_once 'database.php';
include_once '../../models/User.php';

class AccoutRepository{
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

        return $users[0];        
    }
}