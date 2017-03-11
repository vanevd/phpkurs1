<?php
namespace Controllers;
require_once "Controllers/BaseController.php";
require_once "Models/Order.php";
require_once "Models/Client.php";

use Models\Order;
use Models\Client;

class OrderController extends BaseController
{
	public function handle($app){    
		$order = new Order($app);
		$client = new Client($app);
		$all_clients = $client -> getClients();
		$edit_id=-1;
		$btn_value="Save";
		$errors=[];
		$order_number="";
		$order_date="";
		$client_id="";
		$s_order_number="";
		$s_order_date="";
		$s_client_id="";
		$operation="list";
		
		if (isset($_REQUEST["operation"])) {
			$operation=$_REQUEST["operation"];
		}
		
		if ($operation == "edit"){
			$edit_id = $_REQUEST["id"];
			$data['orders'] = $order->show($edit_id);
			print_r($data['orders']);
			$order_number = $data['orders']['order_number'];
			$order_date = $data['orders']['order_date'];
			$client_id = $data['orders']['client_id'];
			$btn_value = "Update";
		}
		
		if (isset($_REQUEST["save_btn"])){
			$is_valid = true;
			
			if (strlen($_REQUEST["order_number"]) == 0) {
			  $is_valid = false;
			  $errors[] = "Field order number must have a value.";
			}
			
			if (strlen($_REQUEST["order_date"]) == 0) {
			  $is_valid = false;
			  $errors[] = "Field order date must have a value.";
			}
			
			if (strlen($_REQUEST["client_id"]) == 0) {
			  $is_valid = false;
			  $errors[] = "Field client must have a value.";
			}
			
			if ($is_valid){
				
				if ($_REQUEST["save_btn"]=="Save") {
					$data['orders'] = $order->store($_REQUEST);
				}
				
				if ($_REQUEST["save_btn"]=="Update"){
					$data['orders'] = $order->update($_REQUEST);
				}
				
			} else {
				$order_number = $_REQUEST["order_number"];
				$order_date = $_REQUEST["order_date"];
				$client_id = $_REQUEST["client_id"];
			}
		}	  
	  
		
		if ($operation=="delete"){
			$id=$_REQUEST["id"];
			$order -> destroy($id);
		}
		
		$data['orders'] = $order->index();
		foreach($data['orders'] as &$item) {
			$client_info = $client -> show($item['client_id']);
			$item['client_name'] = $client_info['first_name'] . ' ' . $client_info['last_name'];
		}
			  
		$data['clients'] = $all_clients;
		$data['edit_id'] = $edit_id;
		$data['order_number'] = $order_number;
		$data['order_date'] = $order_date;
		$data['client_id'] = $client_id;
		$data['s_order_number'] = $s_order_number;
		$data['s_order_date'] = $s_order_date;
		$data['s_client_id'] = $s_client_id;
		$data['btn_value'] = $btn_value;
		$data['errors'] = $errors;
	
		echo $app->getTemplate()->render('orders-template.php', $data);
	
	}    
}
