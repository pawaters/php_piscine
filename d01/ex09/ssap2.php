#!/usr/local/bin/php
<?php

//takes a string, makes an array with each word without any spaces
function ft_split($str)
{
    $array = preg_split("/ +/", trim($str));
    if (empty($array))
        return (NULL);
    return ($array);
}

//take all strings and words within it, separate each word, make a clean array
//create 3 sub-arrays for each type of sort: alpha, num, other (ASCII).
//send each string of input array to the right sub-array for sorting
//sort each sub-array
//merge it all and print

if ($argc > 1)
{

    $alpha = array();
    $num = array();
    $other = array();

    array_shift($argv);
    foreach ($argv as $str)
    {
        $sub_array = ft_split($str);
        foreach ($sub_array as $elem)
        {
            if (ctype_alpha($elem))
                array_push($alpha, $elem);
            else if (ctype_digit($elem))
                array_push($num, $elem);
            else
                array_push($other, $elem);
        }
    }

    natcasesort($alpha);
    sort($num, SORT_STRING);
    natcasesort($other);

    $array = array_merge($alpha, $num, $other);
    foreach ($array as $word)
        echo $word . "\n";
}

?>