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
        // if ( ! $this->isAdmin()) {
        //     header('Location: /app/login');
        //     exit;
        // }
        
    }

    public function dashboard()
    {
        $this->restrictIfNotAdmin();
        
        $filters = [];

        $db = new Database();

        
        if(isset($_GET['page'])) {
            $page = htmlspecialchars(strip_tags($_GET['page']), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        } else {
            $page = 1;
        }
         
        if(isset($_GET['sort_date']) && !empty($_GET['sort_date'])) {
            $filters['created_at'] = htmlspecialchars(strip_tags($_GET['sort_date']), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        }

        if(isset($_GET['sort_name']) && !empty($_GET['sort_name'])) {
            $filters['username'] = htmlspecialchars(strip_tags($_GET['sort_name']), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        }

        if(isset($_GET['sort_email']) && !empty($_GET['sort_email'])) {
            $filters['email'] = htmlspecialchars(strip_tags($_GET['sort_email']), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        }

        $data = $db->getGuestbookPage($page, $filters );


        $tpl = new TemplateLoader();
        $tpl->render('default', 'admin/dashboard',  array_merge([
            'title' => 'Панель администратора',
        ],
             $data
        ));
      
       
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
