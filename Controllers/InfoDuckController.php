<?php
require_once "DuckController.php";

class InfoDuckController extends DuckController {
    
    public $template="_infoFirstEx.twig";

    public function getContext():array{

        $context=parent::getContext();

        
        $context['text'] = "Объевшись травы, гусь сошел с ума и пошел в отрыв.";
        $context['text1'] = "Уже ничто не способно его остановить, просто наблюдайте...";
        $context['section1'] = '/info';


        return $context;
    }


    
}