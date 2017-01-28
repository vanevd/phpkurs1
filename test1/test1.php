<?php
$clients =[
    [
        'first_name' => 'ivan',
        'last_name'=> 'petrov',
        'phone'=>'0893894567',
        'email'=> 'Petrov@abv.bg'
    ],
    [
        'first_name' => 'petar2',
        'last_name'=> 'petrov',
        'phone'=>'0893894567',
        'email'=> 'Petrov@abv.bg'
    ],
    [
        'first_name' => 'petar3',
        'last_name'=> 'petrov',
        'phone'=>'0893894567',
        'email'=> 'Petrov@abv.bg'
    ],
];
$client= [];
$client['first_name'] = 'ivan';
$client['last_name'] ='ivanov';
$client['phone'] = '089873892';
$client['email'] = 'ivanivanov@abv.bg';
$clients[] = $client;
$client = [
    'first_name' => 'petar',
    'last_name'=> 'petrov',
    'phone'=>'0893894567',
    'email'=> 'Petrov@abv.bg'
];
$clients[]=$client;

foreach ($clients as $key => $client) {
    $clients[$key]['first_name'] = ucfirst($clients[$key]['first_name']);
    $clients[$key]['last_name'] = ucfirst($clients[$key]['last_name']);
}

foreach ($clients as $key => $client) {
    if (strtolower($client['first_name']) == 'ivan') {
        unset($clients[$key]);
    }
}
//unset($clients[3]);

var_dump($clients);

