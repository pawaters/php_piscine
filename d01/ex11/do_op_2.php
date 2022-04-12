#!/usr/local/bin/php

<?php
if ($argc == 2)
{
    $input = trim(preg_replace('/ +/', "", $argv[1]));
    if (!preg_match('/^[0-9]+[%*+\-\/][0-9]+$/', $input))
    {
        exit("Syntax Error\n");
    }

    $op = strpbrk($input, "+-*/%");
    $nb = preg_split('/[%*+\-\/]/', $input);
 

    switch ($op[0])
        {
            case "+":
                echo $nb[0] + $nb[1] . "\n";
                break;
            case "-":
                echo $nb[0] - $nb[1] . "\n";
                break;
            case "*":
                echo $nb[0] * $nb[1] . "\n";
                break;
            case "/":
                echo $nb[0] / $nb[1] . "\n";
                break;
            case "%":
                echo $nb[0] % $nb[1] . "\n";
                break;
            default:
                echo "Incorrect Parameters\n";
        }
}
else
    echo "Incorrect Parameters\n";

?>