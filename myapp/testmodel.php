<?php
require_once "autoload.php";

use Models\Hotel;
use Models\Product;
use Models\Client;

//$hotel = new Hotel(['provider' => 'Mysql']);
//$client = new Client(['provider' => 'Mysql']);
//$client = new Client(['provider' => 'Json']);

$product = new Product(['provider' => 'Mysql']);

//$hotel2 = new Hotel(['provider' => 'Json']);

//$client->list([]);
$product->list([]);

$row = [
    'first_name' => 'Peter',
    'last_name' => 'Dimitrov',
    'phone' => '0888555444',
    'email' => 'peter_dimitrov@abv.bg',
];

$row_product = [
    'product_name' => "Tablet A''cer",
    'product_code' => 't_acer',
    'price' => 300,
];

//$id = $client->add($row);

//$client->list(['first_name' => 'Peter']);

    $id = $product->add($row_product);

    $product->list([]);    




    