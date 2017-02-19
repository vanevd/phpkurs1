<?php
require_once "vendor/autoload.php";
require_once "Core/App.php";
require_once "Controllers/ProductController.php";

use Core\App;
use Controllers\ProductController;

$app = new App;
$app->initDb('127.0.0.1', 'root', '', 'test-php');
$app->initTemplate('templates');

$productController = new ProductController;
$productController->handle($app);