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
        
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $city = $_REQUEST['city'];
        $address = $_REQUEST['address'];
        $email = $_REQUEST['email'];
        $tel = $_REQUEST['tel'];
        $pic = $_REQUEST['pic'];
        $description = $_REQUEST['description'];
        

        $res = $mysqli->query("update hotels set name='$name', city='$city', address='$address',
            email='$email', tel='$tel', pic='$pic', description='$description' where id=$id ");
        $response = [];
        $response['status'] = 'ok';
        $response['data'] = null;
        $response['error'] = null;
    } catch (Exception $e) {
        $response = [];
        $response['status'] = 'error';
        $response['data'] = null;
        $response['error'] = $e->getMessage();
    }        

header('Content-Type: application/json');
echo json_encode($response);

