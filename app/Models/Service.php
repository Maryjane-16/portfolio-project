<?php

namespace App\Models;

use PDO;

class Service
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function all()
    {
        $stmt = $this->db->query("SELECT * FROM services");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Find a single service by ID
     */
    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM services WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Store a new service
     */
    public function store($title, $description)
    {
        $stmt = $this->db->prepare("
            INSERT INTO services (title, description) 
            VALUES (:title, :description)
        ");

        return $stmt->execute([
            'title'       => $title,
            'description' => $description,
        ]);
    }

    /**
     * Update an existing service
     */
    public function update($id, $title, $description)
    {
        $stmt = $this->db->prepare("
            UPDATE services 
            SET title = :title, description = :description
            WHERE id = :id
        ");

        return $stmt->execute([
            'id'          => $id,
            'title'       => $title,
            'description' => $description,
        ]);
    }

    /**
     * Delete a service
     */
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM services WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
