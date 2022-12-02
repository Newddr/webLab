<?php
require_once "../controllers/BaseSpaceTwigController.php";


class SearchController extends BaseSpaceTwigController {
    
    
    public $template ="search.twig";
    public function getContext():array{

        $context=parent::getContext();    
        
        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $title = isset($_GET['title']) ? $_GET['title'] : '';
        $description = isset($_GET['description']) ? $_GET['description'] : '';


        $sql=<<<EOL
SELECT id,title
FROM gouse_objects
Where (:title = '' OR title like CONCAT('%', :title, '%'))
        AND (:type='Все' OR type= :type)
        AND (:description = '' OR description like :description)
EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("title",$title);
        $query->bindValue("type",$type);
        $query->bindValue("description",$description);

        $query->execute();

        $context['objects']=$query->fetchALL();



        return $context;
    }


    
}