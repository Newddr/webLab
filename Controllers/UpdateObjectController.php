<?php
require_once "BaseSpaceTwigController.php";

class UpdateObjectController extends BaseSpaceTwigController {
    public $template = "object_update.twig";
   public function get(array $context) 
   {
     // пробросили параметр
    $id = $_GET['id']; // взяли id
    
    $sql =<<<EOL
Select * FROM gouse_objects WHERE id = :id
EOL;
$query = $this->pdo->prepare($sql);
    $query->bindValue("id", $id);
    $query->execute();

    $data = $query->fetch();
   
    
    $context['object']=$data;
    $query=$this->pdo->prepare("SELECT * FROM gouse_types");
        
        $query->execute();
        $gouse_types = $query->fetchAll();
        $context['gouse_types']=$gouse_types;

    parent::get($context);
   }
   
public function post(array $context)
{
    $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];
        $infoBig=$_POST['infoBig'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        $id = $_GET['id']; // взяли id

        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name"; // формируем ссылку без адреса сервера
$sql = <<<EOL
Update gouse_objects
SET title=:title,description=:description,type= :type,info= :info, infoBig= :infoBig,image= :image_url
WHERE id=:id
EOL;
    
    $query = $this->pdo->prepare($sql);
        // привязываем параметры
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->bindValue("infoBig", $infoBig);
        $query->bindValue("image_url", $image_url);
        $query->bindValue("id", $id);
        $context['title'] = $title;
        $query->execute();
        $context['message'] = 'Вы успешно подредачили объект';
        $context['title'] = $title;

        $context['id'] = $this->pdo->lastInsertId(); // получаем id нового добавленного объекта

        $this->get($context);
}
}