<?php

namespace App\Models;

use PDO;

class Intro
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM intros WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $description)
    {
        $sql = 'UPDATE intros SET title = :title, description = :description
                WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        return $stmt->execute();
    }

}
