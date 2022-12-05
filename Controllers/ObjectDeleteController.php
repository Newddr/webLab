<?php

// в кой то веки наследуемся не от TwigBaseController а от BaseController
class ObjectDeleteController extends BaseController {
    public function post(array $context)
    {
        $id = $_POST['id']; // взяли id

        $sql =<<<EOL
DELETE FROM gouse_objects WHERE id = :id
EOL; // сформировали запрос
        
        // выполнили
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id", $id);
        $query->execute();
        header("Location: /");
        exit;
    }
}