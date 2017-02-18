<?php
require_once "vendor/autoload.php";
require_once "Core/App.php";
require_once "Controllers/ClientController.php";

use Core\App;
use Controllers\ClientController;

$app = new App;
$app->init();

$clientController = new ClientController;
$clientController->handle($app);