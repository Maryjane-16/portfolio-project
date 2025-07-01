<?php

namespace App\Models;

use PDO;
use PDOException;

class DatabaseConnection
{
    public function databaseConnection()
    {
        $db_host = $_ENV['DB_HOSTNAME'];
        $db_name = $_ENV['DB_NAME'];
        $db_user = $_ENV['DB_USERNAME'];
        $db_password = $_ENV['DB_PASSWORD'];

        $dsn = 'mysql:host=' .$db_host . ';dbname=' . $db_name . ';charset=utf8';

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
             $conn = new PDO($dsn, $db_user, $db_password, $options);
             return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit;
        }

       
    }

}