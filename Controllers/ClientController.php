<?php
namespace Controllers;
require_once "Controllers/BaseController.php";
require_once "Models/Client.php";

use Models\Client;

class ClientController extends BaseController
{
    public function handle($app)
    {        
        $edit_id=-1;
        $btn_value="Save";
        $errors=[];
        $first_name="";
        $last_name="";
        $phone="";
        $email="";
        $s_first_name="";
        $s_last_name="";
        $s_phone="";
        $s_email="";

        if (isset($_REQUEST["save_btn"])){
            $is_valid = true;
            if (strlen($_REQUEST["first_name"]) == 0) {
                $is_valid = false;
                $errors[] = "Field first name must have a value.";
            }
            if (strlen($_REQUEST["last_name"]) == 0) {
                $is_valid = false;
                $errors[] = "Field last name must have a value.";
            }
            if (strlen($_REQUEST["phone"]) == 0) {
                $is_valid = false;
                $errors[] = "Field phone must have a value.";
            }
            if (strlen($_REQUEST["email"]) == 0) {
                $is_valid = false;
                $errors[] = "Field email must have a value.";
            }
            if ($is_valid){
                if ($_REQUEST["save_btn"]=="Save") {
                    $client = new Client($app);
                    $client->store($_REQUEST);
                }
                if ($_REQUEST["save_btn"]=="Update"){
                    $edit_id=$_REQUEST["edit_id"];
                    $client = new Client($app);
                    $client->update($edit_id, $_REQUEST);
                }
            } else {
                $first_name = $_REQUEST["first_name"];
                $last_name = $_REQUEST["last_name"];
                $phone = $_REQUEST["phone"];
                $email = $_REQUEST["email"];
            }
        }
        $operation="list";
        if (isset($_REQUEST["operation"])) {
            $operation=$_REQUEST["operation"];
        }
        if ($operation=="delete"){
            $id=$_REQUEST["id"];
            $client = new Client($app);
            $client->destroy($id);
        }
        if ($operation=="edit"){
            $id=$_REQUEST["id"];
            $edit_id=$id;
            $client = new Client($app);
            $client_item = $client->show($id);
            $first_name=$client_item["first_name"];
            $last_name=$client_item["last_name"];
            $phone=$client_item["phone"];
            $email=$client_item["email"];
            $btn_value="Update";
        }

        $client = new Client($app);
        if (isset($_REQUEST['search_btn'])) {
            $search_fields = [];
            $search_fields['first_name'] = $_REQUEST['s_first_name'] ?? "";
            $search_fields['last_name'] = $_REQUEST['s_last_name'] ?? "";
            $search_fields['phone'] = $_REQUEST['s_phone'] ?? "";
            $search_fields['email'] = $_REQUEST['s_email'] ?? "";
            $data['clients'] = $client->index($_REQUEST, true, $search_fields);
        } else {
            $data['clients'] = $client->index($_REQUEST);
        }
        
        $data['edit_id'] = $edit_id;
        $data['first_name'] = $first_name;
        $data['last_name'] = $last_name;
        $data['phone'] = $phone;
        $data['email'] = $email;
        if (isset($_REQUEST['search_btn'])) {
            $data['s_first_name'] = $_REQUEST['s_first_name'] ?? "";
            $data['s_last_name'] =  $_REQUEST['s_last_name'] ?? "";
            $data['s_phone'] =  $_REQUEST['s_phone'] ?? "";
            $data['s_email'] =  $_REQUEST['s_email'] ?? "";
        }    
        $data['btn_value'] = $btn_value;
        $data['errors'] = $errors;

        echo $app->getTemplate()->render('clients-template.php', $data);
    }    
}
