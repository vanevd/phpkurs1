<?php

$mysqli = new mysqli('127.0.0.1', 'root', '', 'test-php');
       
$sql="update clients set\n";
$sql.="first_name='%s',\n";
$sql.="last_name='%s',\n";
$sql.="phone='%s',\n";
$sql.="email='%s'\n";
$sql.="where id=%d\n";
   

$query=sprintf($sql,$_REQUEST["first_name"],$_REQUEST["last_name"],$_REQUEST["phone"],$_REQUEST["email"],$_REQUEST["edit_id"]);
$result = $mysqli->query($query);
            
echo "Update successful!";