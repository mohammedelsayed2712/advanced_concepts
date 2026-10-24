<?php

$array1 = ['a' => 1, 2, 3, 4, 5];
$array2 = [6, 7, 'a' => 8, 9, 10];

// $array3 = array_merge($array1, $array2);
$array3 = [...$array1, ...$array2];

print_r($array3);