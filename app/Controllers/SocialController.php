<?php

namespace App\Controllers;

use PDO;
use App\Models\Social;
use App\Middleware\Auth;
use App\Requests\Request;

class SocialController
{
    private $model;

    public function __construct(PDO $db)
    {
        $this->model = new Social($db);
    }

    /**
     * Admin: edit socials form
     */
    public function edit(Request $request, array $vars)
    {
        Auth::requireLogin();

        $id = $vars['id'];
        $social = $this->model->find($id);

        render('backend/social/edit.view.php', ['social' => $social]);
    }

    /**
     * Admin: update socials
     */
    public function update(Request $request, array $vars)
    {
        if ($request->method() === 'POST') {
            $id        = $vars['id'];
            $facebook  = $request->input('facebook');
            $twitter   = $request->input('twitter');
            $github    = $request->input('github');
            $linkedin  = $request->input('linkedin');
            $instagram = $request->input('instagram');

            if (empty($facebook) && empty($twitter) && empty($github) && empty($linkedin) && empty($instagram)) {
                $_SESSION['error'] = "At least one field must be filled.";
                header("Location: /social/{$id}/edit");
                exit();
            }

            $this->model->update($id, $facebook, $twitter, $github, $linkedin, $instagram);

            $_SESSION['success'] = "Social links updated successfully.";
            header("Location: /social/{$id}/edit");
            exit();
        }

        $_SESSION['error'] = "Invalid request method.";
        header("Location: /social/{$vars['id']}/edit");
        exit();
    }

    /**
     * Frontend: fetch socials
     */
    public function frontend()
    {
        $social = $this->model->find(1); // assuming only 1 row for socials
        render('frontend/social/social.view.php', ['social' => $social]);
    }
}
