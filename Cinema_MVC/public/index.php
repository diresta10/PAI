<?php
use app\core\Application;
use app\controllers\SiteController;
use app\controllers\AuthController;
use app\controllers\AdminAuthController;
use app\controllers\PanelController;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config =[
    'userClass' => \app\models\User::class,
    'adminClass' => \app\models\Admin::class,
    'addressClass' => \app\models\Address::class,
    'userviewClass' => \app\models\Userview::class,
    'movieClass' => \app\models\Movie::class,
    'orderClass' => \app\models\Order::class,
    'dateClass' => \app\models\Date::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],

    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/',[SiteController::class, 'home']);
$app->router->get('/contact',[SiteController::class, 'contact']);

$app->router->post('/contact',[SiteController::class, 'contact']);

$app->router->get('/login',[AuthController::class, 'login']);
$app->router->post('/login',[AuthController::class, 'login']);

$app->router->get('/register',[AuthController::class, 'register']);
$app->router->post('/register',[AuthController::class, 'register']);

$app->router->get('/logout',[AuthController::class, 'logout']);

$app->router->get('/admin',[AdminAuthController::class, 'login']);
$app->router->post('/admin',[AdminAuthController::class, 'login']);

$app->router->get('/adminPanel',[PanelController::class, 'adminPanel']);
$app->router->post('/adminPanel',[PanelController::class, 'adminPanel']);

$app->router->get('/adminLogout',[AdminAuthController::class, 'logout']);

$app->router->get('/deleteUser',[PanelController::class, 'deleteUser']);
$app->router->get('/updateUser',[PanelController::class, 'updateUser']);
$app->router->post('/updateUser',[PanelController::class, 'updateUser']);

$app->router->get('/ticket',[SiteController::class, 'ticket']);
$app->router->post('/ticket',[SiteController::class, 'ticket']);



$app->run();