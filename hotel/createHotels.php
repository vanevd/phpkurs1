<?php

    $mysqli = new mysqli('localhost', 'testphp', 'testphp', 'testphp');

    $mysqli->query("create table hotels(
        id int auto_increment,
        name varchar(255),
        city varchar(255),
        pic varchar(255),
        address varchar(255),
        tel varchar(255),
        email varchar(255),
        description text,
        rooms text,
        primary key(id)
    )");
