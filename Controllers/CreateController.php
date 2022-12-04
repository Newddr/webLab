<?php
require_once "BaseSpaceTwigController.php";

class CreateController extends BaseSpaceTwigController {
    public $template = "object_create.twig";
    public function get(array $context) // добавили параметр
    {
        // echo $_SERVER['REQUEST_METHOD'];
        
        parent::get($context); // пробросили параметр
    }
    public function getContext():array{

        $context=parent::getContext();
        $query=$this->pdo->prepare("SELECT * FROM gouse_types");
        
        $query->execute();
        $gouse_types = $query->fetchAll();
        $context['gouse_types']=$gouse_types;

        return $context;

    }

    public function post(array $context) { // добавили параметр
       

        
        
        

        if (isset($_POST["object"])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];
        $infoBig=$_POST['infoBig'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name"; // формируем ссылку без адреса сервера
$sql = <<<EOL
INSERT INTO gouse_objects(title, description, type, info, infoBig, image)
VALUES(:title, :description, :type, :info, :infoBig, :image_url)
EOL;
    
    $query = $this->pdo->prepare($sql);
        // привязываем параметры
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->bindValue("infoBig", $infoBig);
        $query->bindValue("image_url", $image_url);
        $context['title'] = $title;
        $query->execute();
        $context['message'] = 'Вы успешно создали объект';
        $context['title'] = $title;


       }
       elseif(isset($_POST["type"]))
       {
       
       
        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name"; // формируем ссылку без адреса сервера
        $typeT = $_POST['typeT'];
$sql1 = <<<EOL
    INSERT INTO gouse_types(type, image)
    VALUES(:typeT, :image_url)
EOL;
               
               $query1 = $this->pdo->prepare($sql1);
               $query1->bindValue("typeT", $typeT);
               $query1->bindValue("image_url", $image_url);
       
               $context['typeT'] = $typeT;
               $query1->execute();
               echo "Success";
               $context['message1'] = 'Вы успешно создали тип ';
               $context['typeT'] = $typeT;
       
       
       
       }
        // выполняем запрос

                
        


        $context['id'] = $this->pdo->lastInsertId(); // получаем id нового добавленного объекта

        $this->get($context);
    }
}