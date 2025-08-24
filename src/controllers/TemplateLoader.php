<?php

namespace app\controllers;

class TemplateLoader
{
    protected string $templateDir;

    protected function isLoggedIn(): bool
    {
        return isset($_SESSION['user_id']);
    }

    public function __construct(string $templateDir = APP)
    {
        $this->templateDir = rtrim($templateDir, '/\\') . DIRECTORY_SEPARATOR;
    }

    public function getPart(string $partPath, array|object $data = [], bool $is_admin = false): void
    {
        $file = $this->templateDir . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, 'views/' . $partPath) . '.php';

        if (is_object($data)) {
            if ($data instanceof \RedBeanPHP\OODBBean) {
                $data = \RedBeanPHP\R::exportAll([$data])[0]; // самый надёжный способ
            } else {
                $data = (array) $data; // для обычных объектов
            }
        }

        if (file_exists($file)) {
            extract($data);
            include $file;
        } else {
            echo "<!-- Part not found: $file -->";
        }
    }

    public function render(string $layoutPath, string $contentPath, array $data = []): void
    {
        $layoutFile = $this->templateDir . 'views/layouts/' . $layoutPath . '.php';
        $contentFile = $this->templateDir . 'views/' . $contentPath . '.php';

        if (!file_exists($layoutFile)) {
            die("Layout not found: $layoutFile");
        }

        // Делаем путь к контенту доступным в layout
        $data['__content_file'] = $contentFile;

        extract($data);
        include $layoutFile;
    }
}
