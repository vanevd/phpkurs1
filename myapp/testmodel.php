<?php
require_once "autoload.php";

use Models\Hotel;
use Models\Product;
use Models\Client;

//$hotel = new Hotel(['provider' => 'Mysql']);
//$client = new Client(['provider' => 'Mysql']);
$client = new Client(['provider' => 'Json']);

//$product = new Product(['provider' => 'Mysql']);

//$hotel2 = new Hotel(['provider' => 'Json']);

$client->list();