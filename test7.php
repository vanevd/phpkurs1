<?php
//var_dump($_REQUEST);
//var_dump($_GET);
//var_dump($_POST);
//var_dump($_SERVER);
$data=false;
$sum=0;
if (isset($_REQUEST['field1'])) {
    $sum=$sum+$_REQUEST['field1'];
    $data = true;
}
if (isset($_REQUEST['field2'])) {
    $sum=$sum+$_REQUEST['field2'];
    $data = true;
}


?>

<html>
    
    <head>
        
    </head>
    
    <body>
        <?php
        if (($_SERVER['REQUEST_METHOD']=='POST')||$data) {
        ?> 
       
            Sum=<?=$sum ?><br/><br/>
            <a href='test7.php'>Next</a>
        <?php
        } else {
        ?>
        <form method="POST">
            Field 1<br/>
            <input type="text" name="field1"><br/>
            <br/>
            Field 2<br/>
            <input type="text" name="field2"><br/>
            <br/>
            <input type="submit" value="Sum">
            
        </form>
        <?php
        }
        ?>
        
    </body>
</html>

