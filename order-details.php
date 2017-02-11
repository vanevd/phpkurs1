<?php

require_once "vendor/autoload.php";

session_start();

$loader = new Twig_Loader_Filesystem('./templates');

$twig = new Twig_Environment($loader);

$mysqli = new mysqli('127.0.0.1', 'root', '', 'test-php');

$edit_id=-1;
$btn_value="Save";
$errors=[];
$product_id="";
$quantity="";
$price = "";
$order_id = $_REQUEST['order_id'] ?? $_SESSION['order_id'] ?? 0;
$_SESSION['order_id'] = $order_id;

if (isset($_REQUEST["save_btn"])){
    $is_valid = true;
    if (strlen($_REQUEST["product_id"]) == 0) {
        $is_valid = false;
        $errors[] = "Field product must have a value.";
    }
    if (strlen($_REQUEST["quantity"]) == 0) {
        $is_valid = false;
        $errors[] = "Field quantity must have a value.";
    } else {
        if (!is_numeric($_REQUEST["quantity"])) {
            $is_valid = false;
            $errors[] = "Field quantity must be a valid number.";
        } else {
            if ($_REQUEST["quantity"] == 0) {
                $is_valid = false;
                $errors[] = "Field quantity must be greater than 0.";
            }
        }
    }
    if (strlen($_REQUEST["price"]) == 0) {
        $is_valid = false;
        $errors[] = "Field price must have a value.";
    } else {
        if (!is_numeric($_REQUEST["price"])) {
            $is_valid = false;
            $errors[] = "Field price must be a valid number.";
        }    
    }
    if ($is_valid){
        if ($_REQUEST["save_btn"]=="Save") {
            $sql="insert into order_details (order_id, product_id, quantity, price, product_sum)\n";
            $sql.="values(%d,%d,%f,%f,%f)";
            $query=sprintf($sql,$order_id,$_REQUEST["product_id"],$_REQUEST["quantity"],$_REQUEST["price"],$_REQUEST["quantity"]*$_REQUEST["price"]);
            $result = $mysqli->query($query);

        }
        if ($_REQUEST["save_btn"]=="Update"){
            $edit_id=$_REQUEST["edit_id"];
            $sql="update order_details set\n";
            $sql.="product_id=%d,\n";
            $sql.="quantity=%f,\n";
            $sql.="price=%f,\n";
            $sql.="product_sum=%f\n";
            $sql.="where id=%d";
            $query=sprintf($sql,$_REQUEST["product_id"],$_REQUEST["quantity"],$_REQUEST["price"],$_REQUEST["quantity"]*$_REQUEST["price"],$edit_id);
            $result = $mysqli->query($query);
        }
    } else {
        $product_id = $_REQUEST["product_id"];
        $quantity = $_REQUEST["quantity"];
        $price = $_REQUEST["price"];
    }
}
$operation="list";
if (isset($_REQUEST["operation"])) {
    $operation=$_REQUEST["operation"];
}
if ($operation=="delete"){
    $id=$_REQUEST["id"];
    $sql="delete from order_details\n";
    $sql.="where id=%d";
    $query=sprintf($sql,$id);
    $result = $mysqli->query($query);
}
if ($operation=="edit"){
    $id=$_REQUEST["id"];
    $edit_id=$id;
    $sql="select * from order_details\n";
    $sql.="where id=%d";
    $query=sprintf($sql,$edit_id);
    $result = $mysqli->query($query);
    $order_detail = $result->fetch_assoc();
    $product_id=$order_detail["product_id"];
    $quantity=$order_detail["quantity"];
    $price=$order_detail["price"];
    $btn_value="Update";
}

$sql="select * from order_details\n";
$sql.="where (order_id = %d)\n";
$sql.="order by id\n";

$query=sprintf($sql,$order_id);
$result = $mysqli->query($query);

$order_details = [];
while ($order_detail = $result->fetch_assoc()) {
    $sql="select * from products\n";
    $sql.="where id=%d";
    $query=sprintf($sql,$order_detail['product_id']);
    $result1 = $mysqli->query($query);
    $product = $result1->fetch_assoc();
    
    $order_detail['product_name'] = $product['product_name'];
    $order_details[] = $order_detail;
} 

$data['order_details'] = $order_details;

$sql="select * from products\n";
$result = $mysqli->query($sql);
$products = [];
while ($product = $result->fetch_assoc()) {
    $products[] = $product;
}
$data['products'] = $products;

$data['edit_id'] = $edit_id;
$data['order_id'] = $order_id;
$data['product_id'] = $product_id;
$data['quantity'] = $quantity;
$data['price'] = $price;
$data['btn_value'] = $btn_value;
$data['errors'] = $errors;

echo $twig->render('order-details-template.php', $data);