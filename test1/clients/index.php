<?php

require_once "../../vendor/autoload.php";

$loader = new Twig_Loader_Filesystem('./templates');

$twig = new Twig_Environment($loader);

$data = [];

$mysqli = new mysqli('127.0.0.1', 'root', '', 'test-php');
$sql="select * from clients\n";
$result = $mysqli->query($sql);

$clients = [];
while ($client = $result->fetch_assoc()) {
    $clients[] = $client;
} 

$data['clients'] = $clients;

echo $twig->render('index-template.php', $data);