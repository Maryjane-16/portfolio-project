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

        render('backend/testimonial/index.view.php', ['testimonials' => $testimonials]);
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
                header("Location: /testimonials/create");
                exit();
            }
            
            $uploadResult = $this->handlePhotoUpload('photo', '/testimonial/');
            $photoPath = $uploadResult['path'];

            $this->model->store($name, $position, $photoPath, $review);

            $_SESSION['error'] = "Testimonial has been created successfully.";
            header('Location: /testimonials');
            exit();
        }else{
            $_SESSION['error'] = "Invalid request method.";
            header("Location: /testimonials/create");
            exit();

        }
    }

    public function show(Request $request, array $vars)
    {
        Auth::requireLogin();

        $id = $vars['id'];
        $testimonial = $this->model->find($id);

        render('backend/testimonial/show.view.php', ['testimonial' => $testimonial]);
    }
    public function edit(Request $request, array $vars)
    {
        Auth::requireLogin(); 
        
        $id = $vars['id'];
        $testimonial = $this->model->find($id);

         render('backend/testimonial/edit.view.php', ['testimonial' => $testimonial]);
    }

    public function update(Request $request, array $vars) 
    {
        if ($request->method() === 'POST') {

            $name = $request->input('name');
            $position = $request->input('position');
            $review = $request->input('review');
            $id = $vars['id'];

            if (empty($name) || empty($position) || empty($review)) {
                $_SESSION['error'] = "All fields are required.";
                header("Location: /testimonials/{$id}/edit");
                exit();
            }

            // Get existing testimonial
            $testimonial = $this->model->find($id);
            $photoPath = $testimonial['photo'] ?? null;

            // Only overwrit if a new file was uploaded
            $uploadResult = $this->handlePhotoUpload('photo', '/testimonial/');
            if (!empty($uploadResult['path'])) {
            $photoPath = $uploadResult['path']; // Only replace if a new file was uploaded
            }

            $this->model->update($id,$name, $position, $photoPath, $review);

            $_SESSION['error'] = "Testimonial data has been updated successfully.";
            header('Location: /testimonials');
            exit();
        }else{
            $_SESSION['error'] = "Invalid request method.";
            header("Location: /testimonials/{id}/edit");
            exit();

        }
    }
    
    public function destroy(Request $request, array $vars)
    {
        Auth::requireLogin(); 
        
        $id = $vars['id'];
        $this->model->delete($id);
        $_SESSION['success'] = "Testimonial data is deleted successfully.";
        header('Location: /testimonials');
        exit();

    }
}
