<?php
//var_dump($_REQUEST);
//var_dump($_SERVER);

$sum=0;
if (isset($_REQUEST['field1'])) {
    $sum=$sum+$_REQUEST['field1'];
}
if (isset($_REQUEST['field2'])) {
    $sum=$sum+$_REQUEST['field2'];
}


?>

<html>
    
    <head>
        
    </head>
    
    <body>
        <?php
        if ($_SERVER['REQUEST_METHOD']=='POST') {
        ?> 
       
            Sum=<?=$sum ?><br/><br/>
            <a href='test7.php'>Next</a>
        <?php
        }
        ?>
        <?php
        if ($_SERVER['REQUEST_METHOD']=='GET') {
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

