#!/usr/local/bin/php
<?php
if ($argc > 1)
{
    $array = array();
    $i = 1;
    while ($i < $argc)
    {
        $tmp = explode(" ", $argv[$i]);
        $array = array_merge($array, $tmp);
        $i++;
    } 
    $array = array_filter($array);
    sort($array);
    for ($i = 0; $i < sizeof($array); $i++)
        echo "$array[$i]\n";
}


?>