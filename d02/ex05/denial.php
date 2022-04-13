#!/usr/local/bin/php
<?php

$fh = fopen($argv[1], 'r');
$line = fgetcsv($fh, 0, ';');
$vars = $line;
$key = $argv[2];

$varsList = [];
foreach ($line as $var)
    $varsList[$var] = [];

while ($line = fgetcsv($fh, 0, ';'))
{
    foreach ($line as $index => $value)
    {
        $varsList[$vars[$index]][$line[array_search($key, $vars)]] = $value;
    }
}
extract($varsList);

echo "Enter you command: ";
while ($line = fgets(STDIN))
{
    echo "Enter your command: ;";
}
echo "\n";

?>