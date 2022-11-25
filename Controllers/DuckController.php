<?php


class DuckController extends TwigBaseController {
    public $template = "_object.twig";
    public $title = "Утка";

    public function getContext():array{

        $context=parent::getContext();
        $title = "Утка";
    $template = "_object.twig";
        $context['url_prefix'] = 'duck';




        return $context;
    }


    
}