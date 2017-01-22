<?php

require_once "vendor/autoload.php";

$loader = new Twig_Loader_Filesystem('./templates');

$twig = new Twig_Environment($loader);

$mysqli = new mysqli('127.0.0.1', 'root', '', 'test-php');

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
            $sql="insert into clients (first_name, last_name, phone, email)\n";
            $sql.="values('%s','%s','%s','%s')";
            $query=sprintf($sql,$_REQUEST["first_name"],$_REQUEST["last_name"],$_REQUEST["phone"],$_REQUEST["email"]);
            $result = $mysqli->query($query);

        }
        if ($_REQUEST["save_btn"]=="Update"){
            $edit_id=$_REQUEST["edit_id"];
            $sql="update clients set\n";
            $sql.="first_name='%s',\n";
            $sql.="last_name='%s',\n";
            $sql.="phone='%s',\n";
            $sql.="email='%s'\n";
            $sql.="where id=%d";
            $query=sprintf($sql,$_REQUEST["first_name"],$_REQUEST["last_name"],$_REQUEST["phone"],$_REQUEST["email"],$edit_id);
            $result = $mysqli->query($query);

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
    $sql="delete from clients\n";
    $sql.="where id=%d";
    $query=sprintf($sql,$id);
    $result = $mysqli->query($query);
}
if ($operation=="edit"){
    $id=$_REQUEST["id"];
    $edit_id=$id;
    $sql="select * from clients\n";
    $sql.="where id=%d";
    $query=sprintf($sql,$edit_id);
    $result = $mysqli->query($query);
    $client = $result->fetch_assoc();
    $first_name=$client["first_name"];
    $last_name=$client["last_name"];
    $phone=$client["phone"];
    $email=$client["email"];
    $btn_value="Update";
}

$sql="select * from clients\n";
$sql.="where (1=1)\n";
if (isset($_REQUEST["search_btn"])){
    $s_first_name=$_REQUEST["s_first_name"];
    $s_last_name=$_REQUEST["s_last_name"];
    $s_phone=$_REQUEST["s_phone"];
    $s_email=$_REQUEST["s_email"];
    if (strlen($s_first_name)>0) {
        $sql.="and(first_name like '%".$s_first_name."%')\n";
    }
    if (strlen($s_last_name)>0) {
        $sql.="and(last_name like '%".$s_last_name."%')\n";
    }
    if (strlen($s_phone)>0) {
        $sql.="and(phone like '%".$s_phone."%')\n";
    }
    if (strlen($s_email)>0) {
        $sql.="and(email like '%".$s_email."%')\n";
    }
}
$result = $mysqli->query($sql);

$clients = [];
while ($client = $result->fetch_assoc()) {
    $clients[] = $client;
} 

$data['clients'] = $clients;

$data['edit_id'] = $edit_id;
$data['first_name'] = $first_name;
$data['last_name'] = $last_name;
$data['phone'] = $phone;
$data['email'] = $email;
$data['s_first_name'] = $s_first_name;
$data['s_last_name'] = $s_last_name;
$data['s_phone'] = $s_phone;
$data['s_email'] = $s_email;
$data['btn_value'] = $btn_value;
$data['errors'] = $errors;

echo $twig->render('clients-template.php', $data);