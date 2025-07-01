<?php

namespace App\Models;

use PDO;

class Testimonial
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function all()
    {
        $stmt = $this->db->query('SELECT * FROM testimonials ORDER BY id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM testimonials WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function store($name, $position, $photoPath, $review)
    {
        $sql = 'INSERT INTO testimonials (name, position, photo, review)
                VALUES (:name, :position, :photo, :review)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':position', $position, PDO::PARAM_STR);
        $stmt->bindValue(':photo', $photoPath, PDO::PARAM_STR);
        $stmt->bindValue(':review', $review, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update($id, $name, $position, $photoPath, $review)
    {
        $sql = 'UPDATE testimonials SET name = :name, position = :position, photo = :photo, review = :review
                WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':position', $position, PDO::PARAM_STR);
        $stmt->bindValue(':photo', $photoPath, PDO::PARAM_STR);
        $stmt->bindValue(':review', $review, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function delete($id)

    {
        $stmt = $this->db->prepare('DELETE FROM testimonials WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
