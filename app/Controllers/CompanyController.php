<?php

namespace App\Controllers;

use PDO;
use App\Models\Company;
use App\Middleware\Auth;
use App\Requests\Request;
use App\Traits\HandleCompanyFileUpload;   // <-- use the specific trait

class CompanyController
{
    use HandleCompanyFileUpload;   // <-- apply the trait here
    private $model;

    public function __construct(PDO $db)
    {
        $this->model = new Company($db);
    }

    public function index()
    {
        Auth::requireLogin();
        $companies = $this->model->all();

        render('backend/company/index.view.php', ['companies' => $companies]);
    }

    public function create()
    {
        Auth::requireLogin();
        require_once dirname(__DIR__, 2) . '/templates/backend/company/create.view.php';
    }

    public function store(Request $request)
    {
        if ($request->method() === 'POST') {
            // ✅ use your trait method
            $uploadResult = $this->handleCompanyLogoUpload('logo', '/company/');
            $logoPath = $uploadResult['path'];

            if (empty($logoPath)) {
                $_SESSION['error'] = "Logo is required.";
                header("Location: /companies/create");
                exit();
            }

            $this->model->store($logoPath);

            $_SESSION['success'] = "Company logo has been created successfully.";
            header('Location: /companies');
            exit();
        } else {
            $_SESSION['error'] = "Invalid request method.";
            header("Location: /companies/create");
            exit();
        }
    }

    public function show(Request $request, array $vars)
    {
        Auth::requireLogin();

        $id = $vars['id'];
        $company = $this->model->find($id);

        render('backend/company/show.view.php', ['company' => $company]);
    }

    public function edit(Request $request, array $vars)
    {
        Auth::requireLogin();

        $id = $vars['id'];
        $company = $this->model->find($id);

        render('backend/company/edit.view.php', ['company' => $company]);
    }

    public function update(Request $request, array $vars)
    {
        if ($request->method() === 'POST') {
            $id = $vars['id'];

            // Get existing company
            $company = $this->model->find($id);
            $logoPath = $company['logo'] ?? null;

            // ✅ Use trait to check if new file uploaded
            $uploadResult = $this->handleCompanyLogoUpload('logo', '/company/');
            if (!empty($uploadResult['path'])) {
                $logoPath = $uploadResult['path']; // Replace if new file uploaded
            }

            $this->model->update($id, $logoPath);

            $_SESSION['success'] = "Company logo has been updated successfully.";
            header('Location: /companies');
            exit();
        } else {
            $_SESSION['error'] = "Invalid request method.";
            header("Location: /companies/{$vars['id']}/edit");
            exit();
        }
    }

    public function delete(Request $request, array $vars)
    {
        Auth::requireLogin();

        $id = $vars['id'];
        $this->model->delete($id);

        $_SESSION['success'] = "Company logo was deleted successfully.";
        header('Location: /companies');
        exit();
    }
}
