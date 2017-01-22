<?php

require_once "vendor/autoload.php";

$loader = new Twig_Loader_Filesystem('./templates');

$twig = new Twig_Environment($loader);

$mysqli = new mysqli('127.0.0.1', 'root', '', 'test-php');

$edit_id=-1;
$btn_value="Save";
$errors=[];
$product_name="";
$product_code="";
$price="";
$s_product_name="";
$s_product_code="";
$s_price="";

if (isset($_REQUEST["save_btn"])){
    $is_valid = true;
    if (strlen($_REQUEST["product_name"]) == 0) {
        $is_valid = false;
        $errors[] = "Field product name must have a value.";
    }
    if (strlen($_REQUEST["product_code"]) == 0) {
        $is_valid = false;
        $errors[] = "Field product code must have a value.";
    }
    if (strlen($_REQUEST["price"]) == 0) {
        $is_valid = false;
        $errors[] = "Field price must have a value.";
    }
    if ($is_valid){
        if ($_REQUEST["save_btn"]=="Save") {
            $sql="insert into products (product_name, product_code, price)\n";
            $sql.="values('%s','%s','%s')";
            $query=sprintf($sql,$_REQUEST["product_name"],$_REQUEST["product_code"],$_REQUEST["price"]);
            $result = $mysqli->query($query);

        }
        if ($_REQUEST["save_btn"]=="Update"){
            $edit_id=$_REQUEST["edit_id"];
            $sql="update products set\n";
            $sql.="product_name='%s',\n";
            $sql.="product_code='%s',\n";
            $sql.="price='%s'\n";
            $sql.="where id=%d";
            $query=sprintf($sql,$_REQUEST["product_name"],$_REQUEST["product_code"],$_REQUEST["price"],$edit_id);
            $result = $mysqli->query($query);

        }
    } else {
        $product_name = $_REQUEST["product_name"];
        $product_code = $_REQUEST["product_code"];
        $price = $_REQUEST["price"];
    }    
}
$operation="list";
if (isset($_REQUEST["operation"])) {
    $operation=$_REQUEST["operation"];
}
if ($operation=="delete"){
    $id=$_REQUEST["id"];
    $sql="delete from products\n";
    $sql.="where id=%d";
    $query=sprintf($sql,$id);
    $result = $mysqli->query($query);
}
if ($operation=="edit"){
    $id=$_REQUEST["id"];
    $edit_id=$id;
    $sql="select * from products\n";
    $sql.="where id=%d";
    $query=sprintf($sql,$edit_id);
    $result = $mysqli->query($query);
    $product = $result->fetch_assoc();
    $product_name=$product["product_name"];
    $product_code=$product["product_code"];
    $price=$product["price"];
    $btn_value="Update";
}

$sql="select * from products\n";
$sql.="where (1=1)\n";
if (isset($_REQUEST["search_btn"])){
    $s_product_name=$_REQUEST["s_product_name"];
    $s_product_code=$_REQUEST["s_product_code"];
    $s_price=$_REQUEST["s_price"];
    if (strlen($s_product_name)>0) {
        $sql.="and(product_name like '%".$s_product_name."%')\n";
    }
    if (strlen($s_product_code)>0) {
        $sql.="and(product_code like '%".$s_product_code."%')\n";
    }
    if (strlen($s_price)>0) {
        $sql.="and(price =  ".$s_price.")\n";
    }    
}
$result = $mysqli->query($sql);

$products = [];
while ($product = $result->fetch_assoc()) {
    $products[] = $product;
} 

$data['products'] = $products;

$data['edit_id'] = $edit_id;
$data['product_name'] = $product_name;
$data['product_code'] = $product_code;
$data['price'] = $price;
$data['s_product_name'] = $s_product_name;
$data['s_product_code'] = $s_product_code;
$data['s_price'] = $s_price;
$data['btn_value'] = $btn_value;
$data['errors'] = $errors;

echo $twig->render('products-template.php', $data);