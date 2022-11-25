<?php
require_once "DuckController.php";

class GifController extends DuckController {
    
    public $template="_infoSecondEx.twig";

    public function getContext():array{

        $context=parent::getContext();

        
        $context['illustr_url'] = '/images/sticker.gif';
        $context['section1'] = '/illust';


        return $context;
    }


    
}