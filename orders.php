<?php
require_once "vendor/autoload.php";
require_once "Core/App.php";
require_once "Controllers/OrderController.php";

use Core\App;
use Controllers\OrderController;

$app = new App;
$app->initDb('127.0.0.1', 'root', '', 'test-php');
$app->initTemplate('templates');

$orderController = new OrderController;
$orderController->handle($app);