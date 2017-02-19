<?php
require_once "vendor/autoload.php";
require_once "Core/App.php";
require_once "Models/Client.php";
use Core\App;
use Models\Client;

$app = new App;
$app->initDb('127.0.0.1', 'root', '', 'test-php');
$client = new Client($app);

$app_backup = new App;
$app_backup->initDb('127.0.0.1', 'root', '', 'test-php-backup');
$client_backup = new Client($app_backup);

$clients = $client->index([]);

foreach ($clients as $client_row) {
	$client_backup_row = $client_backup->show($client_row["id"]);
	
	if (!$client_backup_row){
		$client_backup->store($client_row);
	} else {
		$client_backup->update($client_row['id'], $client_row);
	}
}
    