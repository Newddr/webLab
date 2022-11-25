<?php
require_once "TwigBaseController.php"; // импортим TwigBaseController

class SadGouseController extends TwigBaseController {
    public $template = "_object.twig";
    public $title = "Грустный гусь";

    public function getContext():array{

        $context=parent::getContext();
        $title = "Грустный гусь";
    $template = "_object.twig";
        $context['url_prefix'] = 'sadGouse';
        



        return $context;
    }


    
}