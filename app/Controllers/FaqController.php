<?php

namespace App\Controllers;


use PDO;
use App\Models\Faq;
use App\Middleware\Auth;
use App\Requests\Request;

class FaqController
{
    private $model;

    public function __construct(PDO $db)
    {
        $this->model = new Faq($db);
    }

    public function index()
    {
        $faqs = $this->model->all();
        render("backend/faq/index.view.php", ['faqs' => $faqs]);
    }

    public function create()
    {
        Auth::requireLogin();
        render("backend/faq/create.view.php");
    }

    public function store(Request $request)
    {
        if ($request->method() === 'POST') {

            $title = $request->input('title');
            $description = $request->input('description');


            if (empty($title) || empty($description)) {
                $_SESSION['error'] = "The title and description are required.";
                header('Location: /faqs/create');
                exit();
            }

            $this->model->store($title, $description);

            $_SESSION['success'] = "FAQ added successfully.";
            header('Location: /faqs');
            exit();
        } else {
            $_SESSION['error'] = "Invalid request method.";
            header('Location: /faqs/create');
            exit();
        }
    }

    public function show(Request $request, array $vars)
    {
        $id = $vars['id'];
        $faq = $this->model->find($id);

        if (!$faq) {
            $_SESSION['error'] = "FAQ not found.";
            header("Location: /faqs");
            exit();
        }

        render("backend/faq/show.view.php", ['faq' => $faq]);
    }


    public function edit(Request $request, array $vars)
    {
        Auth::requireLogin();
        $id = $vars['id'];
        $faq = $this->model->find($id);

        render("backend/faq/edit.view.php", ['faq' => $faq]);
    }

    public function update(Request $request, array $vars)
    {
        if ($request->method() === 'POST') {
            $id    = $vars['id'];
            $title = $request->input('title');
            $description = $request->input('description');

            if (empty($title) || empty($description)) {
                $_SESSION['error'] = "Title and description are required.";
                header("Location: /faqs/{$id}/edit");
                exit();
            }

            $this->model->update($id, $title, $description);

            $_SESSION['success'] = "FAQ updated successfully.";
            header("Location: /faqs");
            exit();
        }

        $_SESSION['error'] = "Invalid request.";
        header("Location: /faqs/{$vars['id']}/edit");
        exit();
    }

    public function delete(Request $request, array $vars)
    {
        Auth::requireLogin();

        $id = $vars['id'];
        $this->model->delete($id);
        $_SESSION['success'] = "FAQ has been deleted successfully.";
        header('Location: /faqs');
        exit();
    }
}
