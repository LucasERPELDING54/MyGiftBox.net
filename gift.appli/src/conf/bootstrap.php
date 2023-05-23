<?php
include 'C:\wamp64\www\gift\gift.appli\src\vendor\autoload.php';
use gift\app\services\utils\Eloquent;
use Slim\Factory\AppFactory as Factory;
use Twig\Loader\FilesystemLoader;

$app = Factory::create();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, false, false);

$twig = \Slim\Views\Twig::create(__DIR__ . '/../views/', ['cache'=> __DIR__ . '/../views/cache/', 'auto_reload' => true]);
$app->add(\Slim\Views\TwigMiddleware::create($app, $twig));


Eloquent::init(__DIR__ . '/../conf/gift.db.conf.ini.dist');

return $app;        