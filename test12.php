<?php
require_once "template_lib.php";
$mysqli = new mysqli('127.0.0.1', 'root', '', 'test-php');

$edit_id=-1;
$btn_value="Save";

if (isset($_REQUEST["save_btn"])){
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
} else {
    $first_name="";
    $last_name="";
    $phone="";
    $email="";
}

$template = file_get_contents('test12-template.php');

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

$table_row_template = get_row_template($template, 'clients');
$table_clients = '';
while ($client = $result->fetch_assoc()) {
    $table_row = $table_row_template;
    $table_row = str_replace('{client_id}', $client["id"], $table_row);
    $table_row = str_replace('{client_first_name}', $client["first_name"], $table_row);
    $table_row = str_replace('{client_last_name}', $client["last_name"], $table_row);
    $table_row = str_replace('{client_phone}', $client["phone"], $table_row);
    $table_row = str_replace('{client_email}', $client["email"], $table_row);
    
    $table_clients = $table_clients . $table_row;;
} 

$template = replace_table($template, 'clients', $table_clients);

$template = str_replace('{edit_id}', $edit_id, $template);
$template = str_replace('{first_name}', $first_name, $template);
$template = str_replace('{last_name}', $last_name, $template);
$template = str_replace('{phone}', $phone, $template);
$template = str_replace('{email}', $email, $template);
$template = str_replace('{btn_value}', $btn_value, $template);
      
echo $template;
