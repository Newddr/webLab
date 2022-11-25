<?php
require_once "BaseController.php"; // обязательно импортим BaseController

class TwigBaseController extends BaseController {
    public $title = ""; // название страницы
    public $template = ""; // шаблон страницы
    protected \Twig\Environment $twig; // ссылка на экземпляр twig, для рендернига
    public $url_title = "";
    public $menu = [ // добавил список словариков
        
        [
            "title" => "Танцующий гусь",
            "url" => "/duck",
        ],
        [
            "title" => "Грустный гусь",
            "url" => "/sadGouse",
        ],
        [
            "title" => "Рисованный гусь",
            "url" => "/drawnduck",
        ],
        [
            "title" => "Опасны ли гуси?",
            "url" => "/warnduck",
        ]
    ];
    public $section = [
        [
            "title" => "Инфо",
            "url" => "/info",
        ],
        [
            "title" => "Иллюстрация",
            "url" => "/illust",
        ]
    ];
    // теперь пишем конструктор, 
    // передаем в него один параметр
    // собственно ссылка на экземпляр twig
    // это кстати Dependency Injection называется
    // это лучше чем создавать глобальный объект $twig 
    // и быстрее чем создавать персональный $twig обработчик для каждого класс 
    public function __construct($twig)
    {
        $this->twig = $twig; // пробрасываем его внутрь
    }
    
    // переопределяем функцию контекста
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        $context['menu'] = $this->menu;
        $context['section']=$this->section;
        $context['url_title'] = $this->url_title;

        return $context;
    }
    
    // функция гет, рендерит результат используя $template в качестве шаблона
    // и вызывает функцию getContext для формирования словаря контекста
    public function get() {
        echo $this->twig->render($this->template, $this->getContext());
    }
}