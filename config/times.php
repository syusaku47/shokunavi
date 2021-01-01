<?php

// $array = ['未設定'];

// $i = 0;
// while ($zero !== '24:00') {
//     $zero = $i + ':00';
//     $half = $i + ':30';
//     if ($i < 10) {
//         $zero = '0' + $zero;
//     }

//     $array[] = $zero;
//     $array[] = $half;
//     $i++;
// }

$datelist = [];
$date = new DateTime('2020-01-01 00:00:00');
$timestamp= $date->format('U');

for ($i=0; $i < 48; $i++ ){
$datelist[] = date('H:i', $timestamp + $i * 1800);
}

return $datelist;
