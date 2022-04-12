#!/usr/local/bin/php
<?php

    if ($argv[1])
    {
        $array = explode(" ", $argv[1]); //string exploded in an array
        $array = array_filter($array); //array cleaned up of empty strings
        //print all array elements starting with index 1
        foreach (array_slice($array, 1) as $word)
        {
            echo "$word" . " ";
        }
        //print array element index 0
        echo "$array[0]\n";
    }

?>