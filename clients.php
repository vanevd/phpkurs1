<?php
require_once "vendor/autoload.php";
require_once "Core/App.php";
require_once "Controllers/ClientController.php";

use Core\App;
use Controllers\ClientController;

$app = new App;
//$app->initDb('127.0.0.1', 'root', '', 'test-php');
$app->initDb('127.0.0.1', 'testphp', 'testphp', 'testphp');
$app->initTemplate('templates');

$clientController = new ClientController;
$clientController->handle($app);