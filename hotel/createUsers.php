<?php

    $mysqli = new mysqli('localhost', 'testphp', 'testphp', 'testphp');

    $mysqli->query("create table users(
        id int auto_increment,
        username varchar(255),
        first_name varchar(255),
        last_name varchar(255),
        password varchar(255),
        email varchar(255),
        primary key(id)
    )");
