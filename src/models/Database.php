<?php

namespace app\models;

use RedBeanPHP\R;

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
}