Краткая инструкция для разработчиков: как развернуть, настроить и запустить проект за минуты.

1) Требования:
PHP >= 8.1 (расширения: pdo, pdo_mysql, mbstring, json, curl)
Composer >= 2.x
MySQL/MariaDB


2) Установка
git clone https://github.com/<ORG>/<REPO>.git
cd app
composer install

3) Настройка окружения:

Скопируйте пример конфигурации и заполните переменные:

cp .env.example .env

4) Запуск в Docker

docker compose up -d


5) Проверка работоспособности
Docker: http://localhost:8000, phpMyAdmin — http://localhost:8080

6) Импортировать БД в appdb

7) Скрипты разработчика
composer cs       # проверка стиля (phpcs, PSR-12)
composer cs:fix   # автофиксы (phpcbf)
composer stan     # статанализ (phpstan)