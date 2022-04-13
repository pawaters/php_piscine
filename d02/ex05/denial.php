#!/usr/local/bin/php
<?php

$fh = fopen($argv[1], 'r');
$line = fgetcsv($fh, 0, ';');
echo $line;

?>