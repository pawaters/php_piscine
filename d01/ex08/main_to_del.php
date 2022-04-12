#!/usr/local/bin/php
<?php

include("ft_is_sort.php");

$tab = array("!/@#;^", "42", "Hello World", "hi", "zZzZzZz");
$tab[] = "What are we doing now ?";

print_r($tab);

if (ft_is_sort($tab))
    echo "sorted\n";
else
    echo "not sorted\n";

?>