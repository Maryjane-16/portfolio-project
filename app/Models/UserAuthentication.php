<?php

namespace App\Models;

use PDO;
use PDOException;
use App\Models\DatabaseConnection;

class UserAuthentication extends DatabaseConnection
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function register($username, $email, $password)
    {
        $sql = "INSERT INTO users (username, email, password) 
                VALUES (:username, :email, :password)";

        try {
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':password', $password, PDO::PARAM_STR);

            return $stmt->execute();

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit;
        }
    }

    Public function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindvalue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])){
                return $user;
            }
            return false;        
        
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit;
        }
    
    }

    
}