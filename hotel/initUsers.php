<?php
    $users = [
        [
            "username" => "admin",
            "first_name" => "Dimitar",
            "last_name" => "Vanev",
            "email" => "support@radibase.com",
            "password" => "alabala",
        ]
    ];
    $mysqli = new mysqli('localhost', 'testphp', 'testphp', 'testphp');
    foreach($users as $user) {
        $password = md5($user['password']);
        $query = "insert into users(username,first_name,last_name,email,password)
            values(
            '{$user['username']}',
            '{$user['first_name']}',
            '{$user['last_name']}',
            '{$user['email']}',
            '{$password}'
            )";
        $res = $mysqli->query($query);
        if (!$res) {
            echo $mysqli->error;
        }    
    }    

