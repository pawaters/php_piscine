#!/usr/local/bin/php
<?php

function mod2($nb) {
    if($nb % 2 == 1)
        echo "The number " . $nb . " is odd\n";
    else
        echo "The number " . $nb . " is even\n";
}

echo "Enter a number: ";
while (true)
{
    $buf = trim(fgets(STDIN)); 
    if (feof(STDIN))
        break;
    if (is_numeric($buf))
        mod2($buf);
    else   
        echo "'" . $buf . "' is not a number\n";
    echo "Enter a number: ";
}
echo "\n";
?>