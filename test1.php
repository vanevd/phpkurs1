<?php
function array_s($a) {
  $s = 0;
  foreach ($a as $i) {
    $s = $s + $i;
  }
  return $s;
}

$a = [5,7,6,4,8];
$a1 = ['name' => 'Ivan', 'email' => 'ivan@abv.bg', 'phone' => '0878555555', 'address' => 'bul.bulgaria 10'];

$a[] = 10; 
$a[] = 15;
$a[0] = 3;
unset($a[1]);
$a1['web_site'] = 'www.ivan.com';
$a1['name'] = 'Stoyan';
unset($a1['phone']);
//echo $a1['email'];

echo count($a) . "<br />\n";
foreach ($a as $key => $item) {
  echo $key . " = " . $item . "<br />\n";
}

echo array_s($a) . "<br /></n>";