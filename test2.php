<?php

$b = [5,17,16,3,4,8,2,10,12,20,100,1,44,667,4,333,444,1000,5,5,6];
$c = [8,2,10,12,20,100,1,44,667,5,6];

function my_sort($a) {
  for ($j=1; $j<count($a)-1; $j++) {
    $min = $j-1;
    for ($i=$j; $i<count($a); $i++) {
      if ($a[$i] < $a[$min]) {
        $min = $i;
      }
    }
    $t = $a[$j-1];
    $a[$j-1] = $a[$min];
    $a[$min] = $t;
  }
  return $a;
}  

$b = my_sort($b);
$c = my_sort($c);
//my_sort($b);
//my_sort($c);

//sort($b);
//sort($c);


foreach ($b as $item) {
  echo $item . "<br />\n";
}
echo "<br />\n";
foreach ($c as $item) {
  echo $item . "<br />\n";
}
