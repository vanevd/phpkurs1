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
        $templates = [];
        $templates['hotel_search'] = file_get_contents('templates/hotel_search.html');
        $templates['hotel_list'] = file_get_contents('templates/hotel_list.html');
        $templates['hotel_list_item'] = file_get_contents('templates/hotel_list_item.html');
        $templates['hotel_details'] = file_get_contents('templates/hotel_details.html');
        $templates['hotel_edit'] = file_get_contents('templates/hotel_edit.html');
        $templates['error_details'] = file_get_contents('templates/error_details.html');
        $templates['login'] = file_get_contents('templates/login.html');

        $response = [];
        $response['status'] = 'ok';
        $response['data'] = $templates;
        $response['error'] = null;
    } catch (Exception $e) {
        $response = [];
        $response['status'] = 'error';
        $response['data'] = [];
        $response['error'] = $e->getMessage();
    }        

header('Content-Type: application/json');
echo json_encode($response);

