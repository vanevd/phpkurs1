<?php

$db = new mysqli('127.0.0.1', 'root', '', 'test-php');
$db_backup = new mysqli('127.0.0.1', 'root', '', 'test-php-backup');

$result = $db->query("select * from clients");
//while ($row = $result->fetch_assoc()) {
//}

    $row = $result->fetch_assoc();
    //print_r($row);
    
    $sql="insert into clients (first_name, last_name, phone, email)\n";
    $sql.="values('%s','%s','%s','%s')";
    $query=sprintf($sql,$row["first_name"],$row["last_name"],$row["phone"],$row["email"]);
    $db_backup->query($query);
    