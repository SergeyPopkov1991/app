<?php

namespace app\controllers;

use app\models\Database;

class PageController
{
    protected function isLoggedIn(): bool
    {
        // return isset($_SESSION['user_id']);
        return true;
    }

    protected function renderPage(string $contentPage, string $titlePage, array $data = []): void
    {
        $tpl = new TemplateLoader();
        $tpl->render('default', $contentPage, array_merge([
            'title' => $titlePage, 
        ], [
            'posts' => $data['posts'],'nav' => $data['nav']
            ] ));
    }

    public function indexAction(): void
    {
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


        $data = $db->getGuestbookPage($page, $filters);

        $this->renderPage(
            'pages/home',
            'Добро пожаловать!',
            $data
        );
    }

    public function viewAction(int $id): void
    {
        $isLoggedIn = $this->isLoggedIn();
        $this->renderPage(
            'pages/single',
            'Добро пожаловать!',
            ['id' => $id]
        );
    }

    public function simplePage($page)
    {
        $allowedPages = ['login', 'add']; // защита от произвольных шаблонов

        if ( ! in_array( $page, $allowedPages ) ) {
            throw new \Exception("Страница не найдена", 404);
        }

        $title = match ( $page ) {
            'login' => 'Логин',
            'add'   => 'Добавить запись',
            default => 'Страница',
        };

        $tpl = new TemplateLoader();
        $tpl->render('default', 'pages/' . $page, [
            'title' => $title,
        ]);

    }

}
