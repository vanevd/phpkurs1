<?php

session_start();
$phone_book=[];
$edit_id=-1;
$btn_value="Save";

if (isset($_SESSION["phone_book"])) {
    $phone_book=$_SESSION["phone_book"];
}
if (isset($_REQUEST["save_btn"])){
    if ($_REQUEST["save_btn"]=="Save") {
        $client=[];
        $client["first_name"]=$_REQUEST["first_name"];
        $client["last_name"]=$_REQUEST["last_name"];
        $client["phone"]=$_REQUEST["phone"];
        $client["email"]=$_REQUEST["email"];
        $phone_book[]=$client;
    }
    if ($_REQUEST["save_btn"]=="Update"){
        $edit_id=$_REQUEST["edit_id"];
        $phone_book[$edit_id]["first_name"]=$_REQUEST["first_name"];
        $phone_book[$edit_id]["last_name"]=$_REQUEST["last_name"];
        $phone_book[$edit_id]["phone"]=$_REQUEST["phone"];
        $phone_book[$edit_id]["email"]=$_REQUEST["email"];
    }
}
$operation="list";
if (isset($_REQUEST["operation"])) {
    $operation=$_REQUEST["operation"];
}
if ($operation=="delete"){
    $id=$_REQUEST["id"];
    unset($phone_book[$id]);
}
if ($operation=="edit"){
    $id=$_REQUEST["id"];
    $edit_id=$id;
    $first_name=$phone_book[$id]["first_name"];
    $last_name=$phone_book[$id]["last_name"];
    $phone=$phone_book[$id]["phone"];
    $email=$phone_book[$id]["email"];
    $btn_value="Update";
} else {
    $first_name="";
    $last_name="";
    $phone="";
    $email="";
}
$_SESSION["phone_book"]=$phone_book;


?>

<html>
    
    <head>
        
    </head>
    
    <body>
        <table border='1'>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name </th>
                <th>Phone</th>
                <th>Email</th> 
                <th>Delete</th>
                <th>Edit</th>
            </tr>
          
            <?php
            foreach($phone_book as $id=>$client) {
            ?>
                <tr>
                    <td><?=$id ?></td>
                    <td><?=$client["first_name"] ?></td>
                    <td><?=$client["last_name"] ?></td>
                    <td><?=$client["phone"] ?></td>
                    <td><?=$client["email"] ?></td>
                    <td><a href='test10.php?operation=delete&id=<?=$id ?>'>delete</a></td>
                    <td><a href='test10.php?operation=edit&id=<?=$id ?>'>edit</a></td>
                </tr>
            <?php
            }
            ?>
            
        </table>
        <form method="POST" action='test10.php'>
            <input type="hidden" name="edit_id" value="<?=$edit_id ?>">
            First Name<br/>
            <input type="text" name="first_name" value="<?=$first_name ?>"><br/>
            <br/>
            Last Name<br/>
            <input type="text" name="last_name" value="<?=$last_name ?>"><br/>
            <br/>
            Phone<br/>
            <input type="text" name="phone" value="<?=$phone ?>"><br/>
            <br/>            
            Email<br/>
            <input type="text" name="email" value="<?=$email ?>"><br/>
            <br/>            
            <input type="submit" name='save_btn' value="<?=$btn_value ?>">
            
        </form>
      
        
    </body>
</html>
