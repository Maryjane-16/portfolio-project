<?php

namespace App\Controllers;

use PDO;
use App\Models\Service;
use App\Middleware\Auth;
use App\Requests\Request;

class ServiceController
{
    private $model;

    public function __construct(PDO $db)
    {
        $this->model = new Service($db);
    }

    /**
     * Admin: list all services
     */
    public function index()
    {
        Auth::requireLogin();
        $services = $this->model->all();

        render('backend/service/index.view.php', ['services' => $services]);
    }

    /**
     * Admin: show create form
     */
    public function create()
    {
        Auth::requireLogin();
        require_once dirname(__DIR__, 2) . '/templates/backend/service/create.view.php';
    }

    /**
     * Admin: store a new service
     */
    public function store(Request $request)
    {
        if ($request->method() === 'POST') {
            $title       = $request->input('title');
            $description = $request->input('description');

            if (empty($title) || empty($description)) {
                $_SESSION['error'] = "All fields are required.";
                header("Location: /services/create");
                exit();
            }

            $this->model->store($title, $description);

            $_SESSION['success'] = "Service created successfully.";
            header("Location: /services");
            exit();
        }

        $_SESSION['error'] = "Invalid request method.";
        header("Location: /services/create");
        exit();
    }

    /**
     * Admin: show a single service
     */
    public function show(Request $request, array $vars)
    {
        Auth::requireLogin();

        $id = $vars['id'];
        $service = $this->model->find($id);

        render('backend/service/show.view.php', ['service' => $service]);
    }

    /**
     * Admin: edit service form
     */
    public function edit(Request $request, array $vars)
    {
        Auth::requireLogin();

        $id = $vars['id'];
        $service = $this->model->find($id);

        render('backend/service/edit.view.php', ['service' => $service]);
    }

    /**
     * Admin: update a service
     */
    public function update(Request $request, array $vars)
    {
        if ($request->method() === 'POST') {
            $id          = $vars['id'];
            $title       = $request->input('title');
            $description = $request->input('description');

            if (empty($title) || empty($description)) {
                $_SESSION['error'] = "All fields are required.";
                header("Location: /services/{$id}/edit");
                exit();
            }

            $this->model->update($id, $title, $description);

            $_SESSION['success'] = "Service updated successfully.";
            header("Location: /services");
            exit();
        }

        $_SESSION['error'] = "Invalid request method.";
        header("Location: /services");
        exit();
    }

    /**
     * Admin: delete a service
     */
    public function delete(Request $request, array $vars)
    {
        Auth::requireLogin();

        $id = $vars['id'];
        $this->model->delete($id);

        $_SESSION['success'] = "Service deleted successfully.";
        header("Location: /services");
        exit();
    }

    /**
     * Frontend: fetch services individually (without looping)
     */
    public function frontend()
    {
        // Specific rows
        $marketing     = $this->model->find(1);
        $webDev        = $this->model->find(2);
        $cloudHosting  = $this->model->find(3);

        render('frontend/service/service.view.php', [
            'marketing'    => $marketing,
            'webDev'       => $webDev,
            'cloudHosting' => $cloudHosting
        ]);
    }
}
