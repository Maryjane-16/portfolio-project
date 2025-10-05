<?php

namespace App\Models;

use PDO;

class Social
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM socials WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $facebook, $twitter, $github, $linkedin, $instagram)
    {
        $stmt = $this->db->prepare("
            UPDATE socials 
            SET facebook = :facebook, twitter = :twitter, github = :github, linkedin = :linkedin, instagram = :instagram 
            WHERE id = :id
        ");
        return $stmt->execute([
            'facebook'  => $facebook,
            'twitter'   => $twitter,
            'github'    => $github,
            'linkedin'  => $linkedin,
            'instagram' => $instagram,
            'id'        => $id
        ]);
    }
}
