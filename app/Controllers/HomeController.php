<?php

namespace App\Controllers;

use PDO;
use App\Models\Intro;
use App\Models\Testimonial;

class HomeController
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function index()
    {
        $introModel = new Intro($this->db);
        $intro = $introModel->find(1);

        $testimonialModel = new Testimonial($this->db);
        $testimonials = $testimonialModel->all();

        render('frontend/home/home.view.php', ['intro' => $intro, 'testimonials' => $testimonials,]);
    }

}