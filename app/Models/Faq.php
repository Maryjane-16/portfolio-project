<?php

namespace App\Models;

use PDO;

class Faq
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function all()
    {
        $stmt = $this->db->query('SELECT * FROM faqs ORDER BY id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM faqs WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $faq = $stmt->fetch(PDO::FETCH_ASSOC);

        return $faq ?: null;
    }

    public function store($title, $description)
    {
        $sql = 'INSERT INTO faqs (title, description)
                VALUES (:title, :description)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update(int $id, string $title, string $description): bool
    {
        $stmt = $this->db->prepare("UPDATE faqs SET title = :title, description = :description WHERE id = :id");
        return $stmt->execute([
            'title'       => $title,
            'description' => $description,
            'id'          => $id
        ]);
    }

    public function delete($id)

    {
        $stmt = $this->db->prepare('DELETE FROM faqs WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
