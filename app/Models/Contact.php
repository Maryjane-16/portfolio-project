<?php

namespace App\Models;

use PDO;

class Contact
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function all()
    {
        $stmt = $this->db->query('SELECT * FROM contacts ORDER BY id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function store($name, $phone, $email, $message)
    {
        $sql = 'INSERT INTO contacts (name, phone, email, message)
                VALUES (:name, :phone, :email, :message)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':message', $message, PDO::PARAM_STR);
        return $stmt->execute();
    }

   

    public function delete($id)

    {
        $stmt = $this->db->prepare('DELETE FROM contacts WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
