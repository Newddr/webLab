<?php
require_once "../controllers/BaseSpaceTwigController.php";


class MainController extends BaseSpaceTwigController {
    public $template = "main.twig";
    public $title = "Главная";
 // добавим метод getContext()
 public function getContext(): array
 {
     $context = parent::getContext();
    if(isset($_GET['type'])){
        $query=$this->pdo->prepare("SELECT * FROM gouse_objects WHERE type =:type");
        $query ->bindValue("type",$_GET['type']);
        $query->execute();
    }
    else {
        $query=$this->pdo->query("SELECT * FROM gouse_objects");
        
    }
     $context['gouse_objects'] = $query->fetchAll();

     return $context;
 }

    
}