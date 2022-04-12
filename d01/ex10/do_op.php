#!/usr/local/bin/php
<?php

if ($argc == 4)
{
    $nb1 = trim($argv[1]);
    $nb2 = trim($argv[3]);
    $op = trim($argv[2]);

    switch ($op)
    {
        case "+":
            echo $nb1 + $nb2 . "\n";
            break;
        case "-":
            echo $nb1 - $nb2 . "\n";
            break;
        case "*":
            echo $nb1 * $nb2 . "\n";
            break;
        case "/":
            echo $nb1 / $nb2 . "\n";
            break;
        case "%":
            echo $nb1 % $nb2 . "\n";
            break;
        default:
            echo "Incorrect Parameters\n";
    }
}
else
    echo "Incorrect Parameters\n";

?>