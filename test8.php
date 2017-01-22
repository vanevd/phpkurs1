<?php

session_start();
//var_dump($_REQUEST);
//var_dump($_SERVER);

$sum=0;
$num=2;

if (isset($_SESSION['num'])) {
    $num=($_SESSION['num']);
}
if (isset($_REQUEST['num'])) {
    $num=($_REQUEST['num']);
}
$_SESSION['num']=$num;

for ($i=1; $i<=$num;$i++) {
    if (isset($_REQUEST['field'.$i])){
        $sum=$sum+$_REQUEST['field'.$i];
    }
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
            <a href='test8.php'>Next</a>
        <?php
        }
        ?>
        <?php
        if ($_SERVER['REQUEST_METHOD']=='GET') {
        ?> 
        <form method="POST">
            <?php
            for ($i=1; $i<=$num; $i++) {
            ?>
            Field <?=$i ?><br/>
            <input type="text" name="field<?=$i ?>"><br/>
            <br/>
            <?php
            }
            ?>
            <input type="submit" value="Sum">
            
        </form>
        <?php
        }
        ?>
        
    </body>
</html>


