<?php

namespace App\Controllers;


use PDO;
use App\Middleware\Auth;
use App\Requests\Request;
use App\Models\Testimonial;
use App\Traits\HandlesFileUpload;

class TestimonialController
{
    use HandlesFileUpload;
    private $model;

    public function __construct(PDO $db)
    {
        $this->model = new Testimonial($db);
    }
    public function index()
    {
        Auth::requireLogin();
        $testimonials = $this->model->all();
        require_once dirname(__DIR__, 2) . '/templates/backend/testimonial/index.view.php';
    }
    public function create()
    {
        Auth::requireLogin();
        require_once dirname(__DIR__, 2) . '/templates/backend/testimonial/create.view.php';
    }
    public function store(Request $request)
    {
        if ($request->method() === 'POST') {

            $name = $request->input('name');
            $position = $request->input('position');
            $review = $request->input('review');

            if (empty($name) || empty($position) || empty($review)) {
                $_SESSION['error'] = "All fields are required.";
                header('Location: /testimonials/create');
                exit();
            }

            $uploadResult = $this->handlePhotoUpload('photo', '/testimonial/');
            $photoPath = $uploadResult['path'];

            $this->model->store($name, $position, $photoPath, $review);

            header('Location: /testimonials');
            exit();
        }else{
            $_SESSION['error'] = "Invalid request method.";
            header('Location: /testimonials/create');
            exit();

        }
    }

    public function show()
    {
        Auth::requireLogin();
        require_once dirname(__DIR__, 2) . '/templates/backend/testimonial/show.view.php';
    }
    public function edit()
    {
        Auth::requireLogin();
        require_once dirname(__DIR__, 2) . '/templates/backend/testimonial/edit.view.php';
    }

    public function update() {}
    public function destroy() {}
}
