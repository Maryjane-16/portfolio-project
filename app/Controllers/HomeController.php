<?php

namespace App\Controllers;

use PDO;
use App\Models\Faq;
use App\Models\Intro;
use App\Models\Social;
use App\Models\Company;
use App\Models\Service;
use App\Models\Portfolio;
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

        $faqModel = new Faq($this->db);
        $faqs = $faqModel->all();

        $portfolioModel = new Portfolio($this->db);
        $portfolios = $portfolioModel->all();

        $companyModel = new Company($this->db);
        $companies = $companyModel->all();

        // ✅ Fetch specific services by ID
        $serviceModel = new Service($this->db);
        $marketing = $serviceModel->find(1);
        $webDev = $serviceModel->find(2);
        $cloudHosting = $serviceModel->find(3);

        $socialModel = new Social($this->db);
        $social = $socialModel->find(1);




        render('frontend/home/home.view.php', [
            'intro' => $intro,
            'testimonials' => $testimonials,
            'faqs' => $faqs,
            'portfolios' => $portfolios,
            'companies' => $companies,
            'marketing' => $marketing,
            'webDev' => $webDev,
            'cloudHosting' => $cloudHosting,
            'social' => $social,
        ]);
    }
}
