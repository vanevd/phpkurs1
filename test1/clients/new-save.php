<?php

$mysqli = new mysqli('127.0.0.1', 'root', '', 'test-php');

$sql="insert into clients (first_name, last_name, phone, email)\n";
$sql.="values('%s','%s','%s','%s')";
$query=sprintf($sql,$_REQUEST["first_name"],$_REQUEST["last_name"],$_REQUEST["phone"],$_REQUEST["email"]);
$result = $mysqli->query($query);
            
echo "Save successful!";