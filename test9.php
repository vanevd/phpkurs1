<?php

session_start();
$phone_book=[];
$edit_id=-1;

if (isset($_SESSION["phone_book"])) {
    $phone_book=$_SESSION["phone_book"];
}
if (isset($_REQUEST["save_btn"])){
    $client=[];
    $client["first_name"]=$_REQUEST["first_name"];
    $client["last_name"]=$_REQUEST["last_name"];
    $client["phone"]=$_REQUEST["phone"];
    $client["email"]=$_REQUEST["email"];
    $phone_book[]=$client;
  
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
                <th>Action</th>
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
                    <td><a href='test9.php?operation=delete&id=<?=$id ?>'>delete</a></td>
                </tr>
            <?php
            }
            ?>
            
        </table>
        <form method="POST" action='test9.php'>
            <input type="hidden" name="edit_id" value="<?=$edit_id ?>">
            First Name<br/>
            <input type="text" name="first_name" value=""><br/>
            <br/>
            Last Name<br/>
            <input type="text" name="last_name" value=""><br/>
            <br/>
            Phone<br/>
            <input type="text" name="phone" value=""><br/>
            <br/>            
            Email<br/>
            <input type="text" name="email" value=""><br/>
            <br/>            
            <input type="submit" name='save_btn' value="Save">
            
        </form>
      
        
    </body>
</html>

