<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once dirname(__DIR__) . '/app/config/init.php';

$router = new AltoRouter();
require_once CONFIG . '/routes.php';

new \core\App();


// //echo \wfm\App::$app->getProperty('pagination');
// //\wfm\App::$app->setProperty('test', 'TEST');
// var_dump(\core\App::$app->getProperties());

