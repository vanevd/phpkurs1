<?php
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


?>

<html>
    
    <head>
        
    </head>
    
    <body>
        <form method="POST" action='test11.php'>
        First Name <input type="text" name="s_first_name" value="">
        Last Name <input type="text" name="s_last_name" value="">
        Phone <input type="text" name="s_phone" value="">
        Email <input type="text" name="s_email" value="">
        <br>
        <input type="submit" name='search_btn' value="Search"><br><br>
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
            while ($client = $result->fetch_assoc()) {
            
            ?>
                <tr>
                    <td><?=$client["id"] ?></td>
                    <td><?=$client["first_name"] ?></td>
                    <td><?=$client["last_name"] ?></td>
                    <td><?=$client["phone"] ?></td>
                    <td><?=$client["email"] ?></td>
                    <td><a href='test11.php?operation=delete&id=<?=$client["id"] ?>'>delete</a></td>
                    <td><a href='test11.php?operation=edit&id=<?=$client["id"] ?>'>edit</a></td>
                </tr>
            <?php
            }
            ?>
            
        </table>
        
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
