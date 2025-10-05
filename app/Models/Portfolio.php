<?php

namespace App\Models;

use PDO;

class Portfolio
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function all()
    {
        $stmt = $this->db->query('SELECT * FROM portfolios ORDER BY id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM portfolios WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function store($title, $category, $image)
    {
        $sql = 'INSERT INTO portfolios (title, category, image)
                VALUES (:title, :category, :image)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':category', $category, PDO::PARAM_STR);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update($id, $title, $category, $image)
    {
        $sql = 'UPDATE portfolios SET title = :title, category = :category, image = :image
                WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':category', $category, PDO::PARAM_STR);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function delete($id)

    {
        $stmt = $this->db->prepare('DELETE FROM portfolios WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
