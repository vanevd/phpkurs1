<?php
require_once "vendor/autoload.php";
require_once "Core/App.php";
require_once "Controllers/ProductController.php";

use Core\App;
use Controllers\ProductController;

$app = new App;
$app->init();

$productController = new ProductController;
$productController->handle($app);