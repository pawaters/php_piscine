#!/usr/bin/php
<?php

    function ft_upcase($matches)
    {
        return (str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
    }

    if ($argc != 2 || !file_exists($argv[1]))
        exit(1);

    if ($argc == 2)
    {
        $fh = fopen($argv[1], 'r');
        $page = "";
        while ($fh && !feof($fh))
            $page .= fgets($fh);
    $page = preg_replace_callback('/<a.*?title="(.*?)">/', "ft_upcase", $page);
    $page = preg_replace_callback('/<a.*?>(.*?)</', "ft_upcase", $page);
    echo $page;
    }

?>