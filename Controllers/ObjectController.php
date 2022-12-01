<?php
require_once "../controllers/BaseSpaceTwigController.php";


class ObjectController extends BaseSpaceTwigController {
    
    

    public function set_content()
    {
       

    }
    public $template = "404.twig";
    public function getContext():array{
        // ПЕРЕНЕСИ СЮДА ОН ТУТ БЫЛ

        if(isset($_GET['show'])){
            $typeShow=$_GET['show'];
            
            if($typeShow=="image")
            {
                // ТУТ НЕТ КОСЯКА , У МЕНЯ ТЕМПЛЕЙТЫ НЕ МЕНЯЮТСЯ 
               
               
                $this->template = "_infoSecondEx.twig";
                // print($this->template);
                
            

        
                
            }
            else{
                $this->template = "_infoFirstEx.twig";
            
            }

        }
        else {
         $this->template = "_object.twig";
        

        }

        $context=parent::getContext();
        // готовим запрос к БД, допустим вытащим запись по id=3
        // тут уже указываю конкретные поля, там более грамотно
        // создам запрос, под параметр создаем переменную my_id в запросе
        $query = $this->pdo->prepare("SELECT image,description,infoBig,info,id FROM gouse_objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();
        $context['image'] = $data['image'];
        $context['idd']= $data['id'];
        $context['description'] = $data['description'];
        $context['text'] = $data['infoBig'];
        $context['text1'] = $data['info'];


        return $context;
    }


    
}