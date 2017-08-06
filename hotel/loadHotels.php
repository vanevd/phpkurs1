<?php
    set_error_handler('exceptions_error_handler');

    function exceptions_error_handler($severity, $message, $filename, $lineno) {
        if (error_reporting() == 0) {
            return;
        }
        if (error_reporting() & $severity) {
            throw new ErrorException($message, 0, $severity, $filename, $lineno);
        }
    }

    try {
        $hotels = [];
        $mysqli = new mysqli('localhost', 'testphp', 'testphp', 'testphp');
        $res = $mysqli->query('select * from hotels');
        while ($row = $res->fetch_assoc()) {
            $row['rooms'] = json_decode($row['rooms'],true);
            $hotels[] = $row;
        }    
        $response = [];
        $response['status'] = 'ok';
        $response['data'] = $hotels;
        $response['error'] = null;
    } catch (Exception $e) {
        $response = [];
        $response['status'] = 'error';
        $response['data'] = [];
        $response['error'] = $e->getMessage();
    }        

header('Content-Type: application/json');
echo json_encode($response);

