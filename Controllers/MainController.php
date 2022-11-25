<?php


class MainController extends TwigBaseController {
    public $template = "main.twig";
    public $title = "Главная";
 // добавим метод getContext()
 public function getContext(): array
 {
     $context = parent::getContext();
     
     // подготавливаем запрос SELECT * FROM space_objects
     // вообще звездочку не рекомендуется использовать, но на первый раз пойдет
     $query = $this->pdo->query("SELECT * FROM gouse_objects");
     
     // стягиваем данные через fetchAll() и сохраняем результат в контекст
     $context['gouse_objects'] = $query->fetchAll();

     return $context;
 }

    
}