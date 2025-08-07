<?php

namespace app\controllers;

use app\models\Database;

class AdminController
{
    protected function isAdmin(): bool
    {
        return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
    }

    protected function restrictIfNotAdmin()
    {
        if ( ! $this->isAdmin()) {
            header('Location: /app/login');
            exit;
        }
    }

    public function dashboard()
    {
        $this->restrictIfNotAdmin();
        
        $db = new Database();
        $data = $db->getAllGuestbookMessages();

        $tpl = new TemplateLoader();
        $tpl->render('default', 'admin/dashboard',  array_merge([
            'title' => 'Панель администратора',
        ], [
            'posts' => $data
        ]));
    }

    public function listPosts()
    {
    }

    public function deletePost($id)
    {
    }

    public function logout()
    {
        session_destroy();
        header('Location: /app/login');
        exit;
    }
}
