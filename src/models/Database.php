<?php

namespace app\models;

use RedBeanPHP\R;
use app\controllers\HelpersController;

class Database
{
    public function __construct()
    {
        R::setup('mysql:host=localhost;dbname=app', 'root', '');
        R::ext('xdispense', fn($type) => \R::getRedBean()->dispense($type));
        R::freeze(false);
    }

    public function getAllGuestbookMessages(): array
    {
        return R::findAll('guestbook', 'ORDER BY created_at DESC');
    }

    public function getGuestbookPage(int $page = 1, array $filters = [], int $perPage = 5): array
    {
        $page    = max(1, $page);
        $perPage = max(1, min(100, $perPage)); 
        $offset  = ($page - 1) * $perPage;
       
        foreach($filters as $field => $dir) {
            $direction = strtoupper($dir) === 'ASC' ? 'ASC' : 'DESC';
            $parts[] = "$field $direction";
        }
        
        $total = (int) R::count('guestbook');

        $orderSql = empty($parts) ? 'created_at DESC' : implode(', ' , $parts);
        
       
        $items = R::findAll(
            'guestbook',
            "ORDER BY $orderSql LIMIT $offset, $perPage"
        );
       
        $pages = (int) ceil($total / $perPage);

        $nav = array(
            'page' => $page,
            'pages' => $pages,
            'perPage' => $perPage
        );

        $data= ['posts'=> $items, 'nav'=> $nav];
        

        return $data;

        // // 3) Приводим бины к массивам (и убираем ключи-идентификаторы)
        // $rows = array_map(static function ($bean) {
        //     return [
        //         'id'         => (int) $bean->id,
        //         'title'      => (string) $bean->title,
        //         'message'    => (string) $bean->message,
        //         'name'       => (string) $bean->name,
        //         'email'      => (string) $bean->email,
        //         'created_at' => (string) $bean->created_at,
        //     ];
        // }, array_values($items));

        // // 4) Метаданные пагинации
        // $pages = (int) ceil($total / $perPage);

        // return [
        //     'posts' => $rows,
        //     'meta'  => [
        //         'page'     => $page,
        //         'perPage'  => $perPage,
        //         'total'    => $total,
        //         'pages'    => $pages,
        //         'hasPrev'  => $page > 1,
        //         'hasNext'  => $page < $pages,
        //     ],
        // ];
    }

    public function addGuestbookMessage( $message, $name, $email, $server ) {
        // Метаданные
        $ip        = HelpersController::clientIp($server);
        $userAgent = substr((string)($server['HTTP_USER_AGENT'] ?? ''), 0, 255);
        //$createdAt = \RedBeanPHP\R::isoDateTime(); // 'YYYY-MM-DD HH:MM:SS'

        try {
            R::begin();

            $entry = R::dispense('guestbook');
            $entry->message    = $message;
            $entry->username   = $name;
            $entry->email      = mb_strtolower($email);
            $entry->ip_address = $ip;
            $entry->user_agent = $userAgent; 
            // $entry->created_at  = $createdAt;

            $id = (int) R::store($entry);
            R::commit();

            return ['ok' => true, 'errors' => [], 'id' => $id];
        } catch (\Throwable $e) {
            R::rollback();
            return ['ok' => false, 'errors' => ['db' => 'Ошибка БД'], 'id' => null];
        }
    }

}