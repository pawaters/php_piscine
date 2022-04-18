#!/usr/bin/php
<?php

if ($argc < 3)
    exit(1);
if (!file_exists($argv[1]))
    exit(1);
$fh = fopen($argv[1], 'r');
if (!$fh)
    exit(1);
$line = fgetcsv($fh, 0, ';');
if (!in_array($argv[2], $line))
    exit(1);
$key = $argv[2];
$vars = $line;

$varsList = [];
foreach ($line as $var)
{
    $varsList[$var] = [];
}

while ($line = fgetcsv($fh, 0, ';'))
{
    foreach ($line as $index => $value)
    {
        $varsList[$vars[$index]][$line[array_search($key, $vars)]] = $value;
    }
}
extract($varsList);

$stdin = fopen("php://stdin", "r");
while ($stdin && !feof($stdin))
{
    echo "Enter your command: ";
    $command = fgets($stdin);
    if ($command)
    {
        eval("$command");
    }
}
fclose($stdin);
fclose($fh);
echo "\n";
?>