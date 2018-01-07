<?php

function array_s($a) {
  $s = 0;
  foreach ($a as $i) {
    $s = $s + $i;
  }
  return $s;
}

//var_dump($_REQUEST);
//var_dump($_SERVER);
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

Name = <?=isset($_REQUEST['name'])?$_REQUEST['name']:'n/a' ?><br>