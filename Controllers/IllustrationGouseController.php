<?php
require_once "SadGouseController.php";

class IllustrationGouseController extends SadGouseController {
    
    public $template="_video.twig";

    public function getContext():array{

        $context=parent::getContext();

        
        $context['illustr_url'] = 'https://vk.com/video_ext.php?oid=-120254617&id=456252817&hash=b23cbc7989d12abb';
        $context['section1'] = '/illust';



        return $context;
    }


    
}