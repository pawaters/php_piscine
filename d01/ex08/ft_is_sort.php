#!/usr/local/bin/php
<?php

    function ft_is_sort($tab)
    {
        $sorted = $tab;
        sort($sorted);
        return ($sorted === $tab);
    }

?>