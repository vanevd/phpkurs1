<?php

$db = new mysqli('127.0.0.1', 'root', '', 'test-php');
$db_backup = new mysqli('127.0.0.1', 'root', '', 'test-php-backup');

$result = $db->query("select * from clients");
while ($row = $result->fetch_assoc()) {
	$query = "select * from clients where id=$row[id]";

	$result1 = $db_backup->query($query);
	$row1 = $result1->fetch_assoc();
	if (!$row1){
    	$sql="insert into clients (id, first_name, last_name, phone, email)\n";
    	$sql.="values('%d','%s','%s','%s','%s')";
    	$query=sprintf($sql,$row["id"],$row["first_name"],$row["last_name"],$row["phone"],$row["email"]);
    	$result1 = $db_backup->query($query);
	} else {
		$sql="update clients set \n";
		
        $sql.="first_name='%s',\n";
        $sql.="last_name='%s',\n";
        $sql.="phone='%s',\n";
        $sql.="email='%s'\n";
        $sql.="where id=%d";
        $query=sprintf($sql,$row["first_name"],$row["last_name"],$row["phone"],$row["email"],$row1['id']);
    	$result1 = $db_backup->query($query);
	}
	if (!($result1)) {
		echo "Eror dump:\n";
		echo $db_backup->error;
	}
}
    