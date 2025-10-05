<?php

namespace App\Controllers;

use PDO;
use App\Middleware\Auth;
use App\Models\Portfolio;
use App\Requests\Request;
use App\Traits\HandlePortfolioFileUpload;   // <-- specific trait

class PortfolioController
{
    use HandlePortfolioFileUpload;   // <-- apply portfolio-specific upload handling
    private $model;

    public function __construct(PDO $db)
    {
        $this->model = new Portfolio($db);
    }

    public function index()
    {
        Auth::requireLogin();
        $portfolios = $this->model->all();

        render('backend/portfolio/index.view.php', ['portfolios' => $portfolios]);
    }

    public function create()
    {
        Auth::requireLogin();
        require_once dirname(__DIR__, 2) . '/templates/backend/portfolio/create.view.php';
    }

    public function store(Request $request)
    {
        if ($request->method() === 'POST') {
            $title = $request->input('title');
            $category = $request->input('category');

            if (empty($title) || empty($category)) {
                $_SESSION['error'] = "All fields are required.";
                header("Location: /portfolios/create");
                exit();
            }

            // ✅ Use portfolio-specific upload method
            $uploadResult = $this->handlePortfolioImageUpload('image', '/portfolio/');
            $photoPath = $uploadResult['path'];

            $this->model->store($title, $category, $photoPath);

            $_SESSION['success'] = "Portfolio has been created successfully.";
            header('Location: /portfolios');
            exit();
        } else {
            $_SESSION['error'] = "Invalid request method.";
            header("Location: /portfolios/create");
            exit();
        }
    }

    public function show(Request $request, array $vars)
    {
        Auth::requireLogin();

        $id = $vars['id'];
        $portfolio = $this->model->find($id);

        render('backend/portfolio/show.view.php', ['portfolio' => $portfolio]);
    }

    public function edit(Request $request, array $vars)
    {
        Auth::requireLogin();

        $id = $vars['id'];
        $portfolio = $this->model->find($id);

        render('backend/portfolio/edit.view.php', ['portfolio' => $portfolio]);
    }

    public function update(Request $request, array $vars)
    {
        if ($request->method() === 'POST') {
            $title = $request->input('title');
            $category = $request->input('category');
            $id = $vars['id'];

            if (empty($title) || empty($category)) {
                $_SESSION['error'] = "All fields are required.";
                header("Location: /portfolios/{$id}/edit");
                exit();
            }

            // Get existing portfolio
            $portfolio = $this->model->find($id);
            $photoPath = $portfolio['image'] ?? null;

            // ✅ Use trait to check if new file uploaded
            $uploadResult = $this->handlePortfolioImageUpload('image', '/portfolio/');
            if (!empty($uploadResult['path'])) {
                $photoPath = $uploadResult['path']; // Replace if new file uploaded
            }

            $this->model->update($id, $title, $category, $photoPath);

            $_SESSION['success'] = "Portfolio data has been updated successfully.";
            header('Location: /portfolios');
            exit();
        } else {
            $_SESSION['error'] = "Invalid request method.";
            header("Location: /portfolios/{$vars['id']}/edit");
            exit();
        }
    }

    public function delete(Request $request, array $vars)
    {
        Auth::requireLogin();

        $id = $vars['id'];
        $this->model->delete($id);

        $_SESSION['success'] = "Portfolio data has been deleted successfully.";
        header('Location: /portfolios');
        exit();
    }
}
