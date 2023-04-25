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
	$dataCsv[] = $csvArray[$i][2];
	$timeCsv[] = $csvArray[$i][0];
}
$itemLinear = array_filter($dataCsv);
print_r($itemLinear);

$time = array_filter($timeCsv);
$assoc = array_combine($itemLinear, $time);
print_r($assoc);

$end = microtime(true);

printf("%.3f\n",($end-$start));
//echo "time : ".($end - $start);


