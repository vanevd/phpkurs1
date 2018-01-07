<?php

$a = [12,23,45];
$a[] = 10;
$a[] = 20;
$a[] = 30;
$a[] = 31;
$a[] = 32;
$a[] = 33;
$a[] = 34;
$a[] = 35;
$b = 10;
//$c = 5;
//$a = [33,44,55];
/*
foreach ($a as $item) {
    echo $item . "\n";
}
*/
/*
for ($i=0;$i<count($a);$i++) {
    echo $a[$i] . "\n";
}
*/

$i = 0;
while ($i<count($a)) {
    echo $a[$i] . "\n";
    $i++;
}
/*
$i = 0;
do {
    echo $a[$i] . "\n";
    $i++;
} while ($i<count($a));
*/
echo $b + (isset($c)?$c:0);
echo "\n";