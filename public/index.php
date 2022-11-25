<?php


// подключаем пакеты которые установили через composer
require_once '../vendor/autoload.php';
require_once "../Controllers/MainController.php";
require_once "../controllers/SadGouseController.php";
require_once "../controllers/IllustrationGouseController.php";
require_once "../controllers/InfoGouseController.php";
require_once "../controllers/DuckController.php";
require_once "../controllers/InfoDuckController.php";
require_once "../controllers/GifController.php";

// создаем загрузчик шаблонов, и указываем папку с шаблонами
// \Twig\Loader\FilesystemLoader -- это типа как в C# писать Twig.Loader.FilesystemLoader, 
// только слеш вместо точек

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, [
    "debug" => true // добавляем тут debug режим
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());
$url = $_SERVER["REQUEST_URI"];
$controller = null;
$title = "";
$template = "";
$context = [];



$pdo = new PDO("mysql:host=localhost;dbname=gousebase;charset=utf8", "root", "");

if ($url == "/") {
$controller = new MainController($twig);
} elseif (preg_match("#^/sadGouse#", $url)) {
    $controller=new SadGouseController($twig);
    if (preg_match("#^/sadGouse/illust#", $url)) {
        $controller=new IllustrationGouseController($twig);
    } elseif (preg_match("#^/sadGouse/info#", $url)) {
        $controller=new InfoGouseController($twig);
    }
} 
elseif (preg_match("#/duck#", $url)) {
    $controller=new DuckController($twig);
    if (preg_match("#^/duck/illust#", $url)) {
        $controller=new GifController($twig);
    } elseif (preg_match("#^/duck/info#", $url)) {
        $controller=new InfoDuckController($twig);
    }
}

if ($controller) {
    $controller->setPDO($pdo); // а тут передаем PDO в контроллер
    $controller->get();
}




