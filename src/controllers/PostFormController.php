<?php

namespace app\controllers;

use app\models\Database;

final class PostFormController
{
    /**
     * Обрабатывает POST и выводит JSON-ответ. Ничего не возвращает.
     */
    public function handle(): void
    {
        // 1) Сессия нужна для CSRF
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // 2) Разрешаем только POST
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            $this->json(['ok' => false, 'errors' => ['method' => 'Метод не разрешён']], 405);
        }

        $post   = $_POST;
        $server = $_SERVER;
        $errors = [];
        
        // 3) CSRF
        // if (
        //     empty($_SESSION['csrf_token']) ||
        //     empty($post['csrf_token']) ||
        //     !hash_equals((string)$_SESSION['csrf_token'], (string)$post['csrf_token'])
        // ) {
        //     $errors['csrf'] = 'Неверный CSRF-токен.';
        // }

        // 4) Honeypot
        if (!empty($post['website'])) {
            $errors['spam'] = 'Spam detected.';
        }

        // 5) Данные
        //$title   = trim((string)($post['title']   ?? ''));
        $message = trim((string)($post['message'] ?? ''));
        $name    = trim((string)($post['name']    ?? ''));
        $email   = trim((string)($post['email']   ?? ''));

        // 6) Валидация
        // if ($title === '') {
        //     $errors['title']   = 'Укажите название.';
        // }
        if ($message === '') {
            $errors['message'] = 'Добавьте текст.';
        }
        if ($name === '') {
            $errors['name']    = 'Укажите имя.';
        }
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Неверный email.';
        }
        // if (mb_strlen($title) > 200) {
        //     $errors['title'] = 'До 200 символов.';
        // }
        if (mb_strlen($name)  > 100) {
            $errors['name']  = 'До 100 символов.';
        }

        // 7) Если есть ошибки — возвращаем 400 и выходим
        if ($errors) {
            $this->json(['ok' => false, 'errors' => $errors, 'id' => null], 400);
        }

        // 8) Запись в БД
        try {
            $db   = new Database();
            $data = $db->addGuestbookMessage( $message, $name, $email, $server );
            $this->json($data, 200);
        } catch (\Throwable $e) {    
            $this->json(['ok' => false, 'errors' => ['db' => 'Ошибка']], 500);
        }
    }

    /**
     * Унифицированная отправка JSON + завершение скрипта.
     */
    private function json(array $payload, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($payload, JSON_UNESCAPED_UNICODE);
        exit;
    }
}
