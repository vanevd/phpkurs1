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
        $username = $_REQUEST['username'];
        $password = md5($_REQUEST['password']);
        $mysqli = new mysqli('localhost', 'testphp', 'testphp', 'testphp');
        $res = $mysqli->query("select * from users where username='$username' and password='$password'");
        $row = $res->fetch_assoc();
        if ($row) {
            $response = [];
            $response['status'] = 'ok';
            $response['data'] = [
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
            ];
            $response['error'] = null;
        } else {
            $response = [];
            $response['status'] = 'error';
            $response['data'] = null;
            $response['error'] = 'Invalid username or password';
        }
    } catch (Exception $e) {
        $response = [];
        $response['status'] = 'error';
        $response['data'] = [];
        $response['error'] = $e->getMessage();
    }        

header('Content-Type: application/json');
echo json_encode($response);

