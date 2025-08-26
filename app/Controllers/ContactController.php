<?php

namespace App\Controllers;


use PDO;
use App\Middleware\Auth;
use App\Requests\Request;
use App\Models\Contact;

class ContactController
{
    private $model;

    public function __construct(PDO $db)
    {
        $this->model = new Contact($db);
    }

     public function index()
    {
        Auth::requireLogin();
        $contacts = $this->model->all();
        require_once dirname(__DIR__, 2) . '/templates/backend/contact/index.view.php';
    }

    public function store(Request $request)
    {
        if ($request->method() === 'POST') {

            $Name = $request->input('name');
            $Phone = $request->input('phone');
            $email = $request->input('email');
            $message = $request->input('message');


            if (empty($Phone) || empty($email) || empty($message)) {
                $_SESSION['error'] = "The phone, email and message fields are required.";
                header('Location: /');
                exit();
           }
            
            $this->model->store($Name, $Phone, $email, $message);

            $_SESSION['success'] = "Your message has been sent successfully.";
            header('Location: /');
            exit();
        }else{
            $_SESSION['error'] = "Invalid request method.";
            header('Location: /');
            exit();

        }
    }
        public function destroy(Request $request, array $vars)
    {
        Auth::requireLogin(); 
        
        $id = $vars['id'];
        $this->model->delete($id);
        $_SESSION['success'] = "Message data has been deleted successfully.";
        header('Location: /contacts');
        exit();

    }
}