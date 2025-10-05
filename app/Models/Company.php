<?php

namespace App\Models;

use PDO;

class Company
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function all()
    {
        $stmt = $this->db->query('SELECT * FROM companies ORDER BY id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM companies WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function store($logoPath)
    {
        $sql = 'INSERT INTO companies (logo)
                VALUES (:logo)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':logo', $logoPath, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update($id, $logoPath)
    {
        $sql = 'UPDATE companies SET logo = :logo
                WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':logo', $logoPath, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function delete($id)

    {
        $stmt = $this->db->prepare('DELETE FROM companies WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
