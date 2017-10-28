<?php

//var_dump($_REQUEST);
$field = $_REQUEST['field'];
//var_dump(intval($_REQUEST['field'][3]));
$sum = 0;
$error = 0;
$error_message = '';
foreach ($field as $key => $item) {
    if (!is_numeric($item)) {
        $error = 1;
        $error_message = 'Invalid value on field ' . ($key+1);
        break;
    } else {
        $sum = $sum + $item;
    }    
}
//var_dump($sum);
if (!$error) {
    $status = 'ok';
} else {
    $status = 'error';
}
$result = [
    'status' => $status,
    'data' => [
        'sum' => $sum,
    ],
    'error_message' => $error_message,
];

header('Content-Type: application/json');
echo json_encode($result);