<?php

require_once "vendor/autoload.php";

$loader = new Twig_Loader_Array(array(
    'test13' => 'Hello {{ first_name }} {{ last_name }}!',
    'table' => 'Hello {{ first_name }} {{ last_name }}!',
    'test14' => 'Hello {{ first_name }} {{ last_name }}!',
    'test15' => 'Hello {{ first_name }} {{ last_name }}!',
));

$twig = new Twig_Environment($loader);

echo $twig->render('test14', array('first_name' => 'Ivan', 'last_name' => 'Ivanov'));