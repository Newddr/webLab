<?php


class InfoController extends TwigBaseController {
    
    public $template = "_infoFirstEx.twig";

    public function getContext():array{

        $context=parent::getContext();
        
        
        // готовим запрос к БД, допустим вытащим запись по id=3
        // тут уже указываю конкретные поля, там более грамотно
        // создам запрос, под параметр создаем переменную my_id в запросе
        $query = $this->pdo->prepare("SELECT info,infoBig,id FROM gouse_objects WHERE id= :my_id");
        // подвязываем значение в my_id 
        $query->bindValue("my_id", $this->params['id']);
        $query->execute(); // выполняем запрос

        // тянем данные
        $data = $query->fetch();
        
        // передаем описание из БД в контекст
        $context['text'] = $data['infoBig'];
        $context['text1'] = $data['info'];
        $context['idd']= $data['id'];

        return $context;
    }


    
}