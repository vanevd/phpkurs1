<?php

include "functions.php";

$a =5;
$b =6;
/*
if ($a != 7) {
  echo "a = 7";
} else {
  echo "a != 7";
  
}
*/
/*
for ($i=5; $i<=15; $i=$i+3) {
  echo $i . "\n";
}
*/
//die();

$p1 = 10;
$p2 = 20;
$r = name($p1, $p2);
echo $r;
//die();

echo name(4,5) . "\n", 'kjkj';
echo name1(4,6) . "\n";
echo name2(7,5) . "\n";
echo name(4,15) . "\n";


die();

$p = 0;
$n = 5;
$s = (2*$p + $n*$n)*4 + 6;


$d = "$s $p abc ";

$a = [5,6,7];
$a1 = ['name' => 'Ivan', 'email' => 'ivan@abv.bg', 'phone' => '0878555555', 'address' => 'bul.bulgaria 10'];

var_dump($a1);
die();
var_dump($a);

var_dump($p);

