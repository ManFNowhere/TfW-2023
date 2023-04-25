#!/usr/bin/php
<?php

echo "start\n";
$start = microtime(true);

$file = fopen("tempdir/rhodes1.csv", "r");
//feof is "end-of-life", for looping unknown length
while(! feof($file)){
	$csvArray[] = fgetcsv($file, 100000, '|');
}
fclose($file);
for( $i = 0; $i < count($csvArray); ++$i){
	$data[] = $csvArray[$i][2];
}
$item = array_filter($data);
print_r($item);

$end = microtime(true);

echo "time : ".($end - $start);


