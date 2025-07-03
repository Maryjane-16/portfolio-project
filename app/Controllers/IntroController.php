<?php

namespace App\Controllers;


use PDO;
use App\Middleware\Auth;
use App\Requests\Request;
use App\Models\Intro;

class IntroController
{
    private $model;

    public function __construct(PDO $db)
    {
        $this->model = new Intro($db);
    }
    public function edit(Request $request, array $vars)
    {
        Auth::requireLogin(); 
        
        $id = $vars['id'];
        $intro = $this->model->find($id);
        
        require_once dirname(__DIR__, 2) . '/templates/backend/intro/edit.view.php';
    }

    public function update(Request $request, array $vars) 
    {
        if ($request->method() === 'POST') {

            $title = $request->input('title');
            $description = $request->input('description');
            $id = $vars['id'];

            if (empty($title) || empty($description)) {
                $_SESSION['error'] = "All fields are required.";
                header("Location: /intro/{$id}/edit");
                exit();
            }

            $this->model->update($id,$title, $description);

            $_SESSION['error'] = "Intro data has been updated successfully.";
            header("Location: /intro/{$id}/edit");
            exit();
        }else{
            $_SESSION['error'] = "Invalid request method.";
            header('Location: /intro/{$id}/edit');
            exit();

        }
    }
    
   
}
