<?php

namespace Ihsan\PhpCsvOptimization;

require 'vendor/autoload.php';

ini_set('memory_limit', '-1');

$start_time = microtime(true);
// $people = [];

$fp = fopen('sample-100-million.csv', 'r');

// while ($data = fgetcsv($fp, null, ',')) {
//     $people[] = $data;
// }

$result = fopen('result.txt', 'a');
while ($data = fgets($fp, 999)) {
    $column = explode(',', $data);
    fwrite($result, $column[4] . PHP_EOL);
}

fclose($result);
fclose($fp);
$end_time = microtime(true);
$execution_time = $end_time - $start_time;

// print('Read rows: ' . count($people) . "\n");
print("Script executed in " . $execution_time . " seconds");