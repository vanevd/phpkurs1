<?php

require_once "../../vendor/autoload.php";

$loader = new Twig_Loader_Filesystem('./templates');

$twig = new Twig_Environment($loader);

$mysqli = new mysqli('127.0.0.1', 'root', '', 'test-php');

$edit_id = $_REQUEST['edit_id'];
$data = [];

$sql="select * from clients\n";
$sql.="where id=".$edit_id;
$result = $mysqli->query($sql);
$client = $result->fetch_assoc();

$data['first_name'] = $client['first_name'];
$data['last_name'] = $client['last_name'];
$data['phone'] = $client['phone'];
$data['email'] = $client['email'];
$data['edit_id'] = $edit_id;
echo $twig->render('edit-template.php', $data);
