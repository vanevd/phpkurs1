<?php
require_once "vendor/autoload.php";
require_once "Core/App.php";
require_once "Controllers/OrderController.php";

use Core\App;
use Controllers\OrderController;

$app = new App;
$app->init();

$orderController = new OrderController;
$orderController->handle($app);