<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
?>
<html>
<head>

</head>    
<body>
    <form method="POST" action="test101.php">
        Field 1<br/>
        <input type="text" name="field[]"><br/>
        <br/>
        Field 2<br/>
        <input type="text" name="field[]"><br/>
        <br/>
        Field 3<br/>
        <input type="text" name="field[]"><br/>
        <br/>
        Field 4<br/>
        <input type="text" name="field[]"><br/>
        <br/>
        Name<br/>
        <input type="text" name="name"><br/>
        <br/>
        <input type="submit" value="Sum">
        
    </form>
</body>
</html>    
<?php
} else {


    function array_s($a) {
    $s = 0;
    foreach ($a as $i) {
        $s = $s + $i;
    }
    return $s;
    }


    $sum = 0;
    if (isset($_REQUEST['field'])) {
        $field = $_REQUEST['field'];
        /*
        foreach ($field as $item) {
            $sum += $item;
        }
        */
        $sum = array_s($field);
    }
    ?>
    <table>
        <tr>
            <th>Number</th>
            <th>Value</th>
        <tr>
    <?php
    $n = 1;
    foreach ($field as $item) {
    ?>
        <tr>
            <td><?= $n ?></td>
            <td><?= $item ?></td>
        </tr>
    <?php
        $n++;
    }
    ?>
    </table>
    <br>
    Sum = <?=$sum ?><br>

    Name = <?=strlen($_REQUEST['name'])>0?$_REQUEST['name']:'n/a' ?><br>
    
<?php    
}    