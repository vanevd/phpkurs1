<?php
namespace Controllers;
require_once "Controllers/BaseController.php";
require_once "Models/Order.php";

use Models\Order;

class OrderController extends BaseController
{
    public function handle($app)
    {        	  
	  
	  
	  $edit_id=-1;
	  $btn_value="Save";
	  $errors=[];
	  $order_number="";
	  $order_date="";
	  $client_id="";
	  $s_order_number="";
	  $s_order_date="";
	  $s_client_id="";
	  
	  $order = new Order($app);

	  $operation="list";
	  if (isset($_REQUEST["operation"])) {
		  $operation=$_REQUEST["operation"];
	  }
	  if ($operation=="delete"){
		  $id=$_REQUEST["id"];
		  $sql="delete from orders\n";
		  $sql.="where id=%d";
		  $query=sprintf($sql,$id);
		  $result = $mysqli->query($query);
	  }
	  if ($operation=="edit"){
		  $id=$_REQUEST["id"];
		  $edit_id=$id;
		  $data['orders'] = $order->edit($_REQUEST["id"]);
			print_r($data['orders']);
		  $order_number=$order["order_number"];
		  $order_date=$order["order_date"];
		  $client_id=$order["client_id"];
		  $btn_value="Update";
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
				  //print_r( $_REQUEST);
		  		$data['orders'] = $order->save($_REQUEST);
			  }
			  if ($_REQUEST["save_btn"]=="Update"){
		  		$data['orders'] = $order->update($_REQUEST);
				  
				$edit_id=$_REQUEST["edit_id"];
				$sql="update orders set\n";
				$sql.="order_number='%s',\n";
				$sql.="order_date='%s',\n";
				$sql.="client_id=%d\n";
				$sql.="where id=%d";
				$query=sprintf($sql,$_REQUEST["order_number"],$_REQUEST["order_date"],$_REQUEST["client_id"],$edit_id);
				$result = $mysqli->query($query);
			  }
		  } else {
			    $order_number = $_REQUEST["order_number"];
			    $order_date = $_REQUEST["order_date"];
			    $client_id = $_REQUEST["client_id"];
		  }
	  }	  

	  
	  if (empty($_GET)) {
		  $data['orders'] = $order->index();
	  }
	  
	  
	  $clients = $order->getClients();
	  $data['clients'] = $clients;

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
		//Работи без това:
		//echo $twig->render('orders-template.php', $data);

    }    
}
