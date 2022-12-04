<?php


class BaseSpaceTwigController extends TwigBaseController {
    
    

    public function getContext():array{

        $context=parent::getContext();

        
        
        $query = $this->pdo->query("SELECT DISTINCT type from gouse_types ORDER BY 1");
        // тянем данные
        $types = $query->fetchAll();
        
        // передаем описание из БД в контекст
        $context['types'] = $types;
        

        return $context;
    }


    
}