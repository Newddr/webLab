<?php

class LoginRequireMiddeware extends baseMiddleware {
    public function apply(BaseController $controller, array $context)
    {
        // заводим переменные под правильный пароль
        $valid_user = "user";
        $valid_password = "12345";
        
        // берем значения которые введет пользователь
        $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
        $password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
        $query=$controller->pdo->prepare("SELECT * FROM users");
         
        $query->execute();
        $users = $query->fetchAll();
        print_r($users);
        $count=1;

        foreach($users as $user) {
         
            if(($user['login'] == $user) ||
                ($user['password'] == $password)) {
                    
                $count=2;
            }
            
         }
        // сверяем с корректными
        if ($count!=2) {
            // если не совпали, надо указать такой заголовок
            // именно по нему браузер поймет что надо показать окно для ввода юзера/пароля
            header('WWW-Authenticate: Basic realm="Space objects"');
            http_response_code(401); // ну и статус 401 -- Unauthorized, то есть неавторизован
            exit; // прерываем выполнение скрипта
        }
        

    }
}