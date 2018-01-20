<?php
require_once "autoload.php";

use Models\Hotel;
use Models\Product;

$mysli = new mysqli('localhost', 'testphp', 'testphp', 'testphp');

$dbHotelProvider = new DbHotelProvider($mysqli);
$hotel = new Hotel;
$hotel->setProvider($dbHotelProvider);

$dbProductProvider = new DbProductProvider($mysqli);
$product = new Product;
$product->setProvider($dbProductProvider);

$jsonHotelProvider = new JsonHotelProvider("json/hotel.json");
$hotel2 = new Hotel;
$hotel2->setProvider($jsonHotelProvider);

$hotel->list();