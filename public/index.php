<?php


// подключаем пакеты которые установили через composer
require_once '../vendor/autoload.php';
require_once '../frameworks/autoload.php';
require_once "../Controllers/MainController.php";
require_once "../controllers/SadGouseController.php";
require_once "../controllers/IllustrationGouseController.php";
require_once "../controllers/InfoGouseController.php";
require_once "../controllers/DuckController.php";
require_once "../controllers/InfoDuckController.php";
require_once "../controllers/GifController.php";
require_once "../controllers/Controller404.php";
require_once "../controllers/ObjectController.php";

// создаем загрузчик шаблонов, и указываем папку с шаблонами
// \Twig\Loader\FilesystemLoader -- это типа как в C# писать Twig.Loader.FilesystemLoader, 
// только слеш вместо точек

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, [
    "debug" => true // добавляем тут debug режим
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$controller = null;
$title = "";
$template = "";
$context = [];



$pdo = new PDO("mysql:host=localhost;dbname=gousebase;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/duck", DuckController::class);
$router->add("/gouse-object/(\d+)", ObjectController::class); 
$router->get_or_default(Controller404::class);




