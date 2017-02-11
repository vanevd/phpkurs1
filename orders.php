<?php

require_once "vendor/autoload.php";

$loader = new Twig_Loader_Filesystem('./templates');

$twig = new Twig_Environment($loader);

$mysqli = new mysqli('127.0.0.1', 'root', '', 'test-php');

$edit_id=-1;
$btn_value="Save";
$errors=[];
$order_number="";
$order_date="";
$client_id="";
$s_order_number="";
$s_order_date="";
$s_client_id="";

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
            $sql="insert into orders (order_number, order_date, client_id)\n";
            $sql.="values('%s','%s',%d)";
            $query=sprintf($sql,$_REQUEST["order_number"],$_REQUEST["order_date"],$_REQUEST["client_id"]);
            $result = $mysqli->query($query);

        }
        if ($_REQUEST["save_btn"]=="Update"){
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
    $sql="select * from orders\n";
    $sql.="where id=%d";
    $query=sprintf($sql,$edit_id);
    $result = $mysqli->query($query);
    $order = $result->fetch_assoc();
    $order_number=$order["order_number"];
    $order_date=$order["order_date"];
    $client_id=$order["client_id"];
    $btn_value="Update";
}

$sql="select * from orders\n";
$sql.="where (1=1)\n";
if (isset($_REQUEST["search_btn"])){
    $s_order_number=$_REQUEST["s_order_number"];
    $s_order_date=$_REQUEST["s_order_date"];
    $s_client_id=$_REQUEST["s_client_id"];
    if (strlen($s_order_number)>0) {
        $sql.="and(order_number like '%".$s_order_number."%')\n";
    }
    if (strlen($s_order_date)>0) {
        $sql.="and(order_date = '".$s_order_date."')\n";
    }
    if (strlen($s_client_id)>0) {
        $sql.="and(client_id = ".$s_client_id.")\n";
    }
}
$result = $mysqli->query($sql);

$orders = [];
while ($order = $result->fetch_assoc()) {
    $sql="select * from clients\n";
    $sql.="where id=%d";
    $query=sprintf($sql,$order['client_id']);
    $result1 = $mysqli->query($query);
    $client = $result1->fetch_assoc();
    
    $order['client_name'] = $client['first_name'] . ' ' . $client['last_name'];
    $orders[] = $order;
} 

$data['orders'] = $orders;

$sql="select * from clients\n";
$result = $mysqli->query($sql);
$clients = [];
while ($client = $result->fetch_assoc()) {
    $clients[] = $client;
}
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

echo $twig->render('orders-template.php', $data);