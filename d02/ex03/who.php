#!/usr/local/bin/php
<?php
    $fh = fopen("/var/run/utmpx", "r");
    if ($fh)
    {
        while ($who = fread($fh, 628))
        {
            date_default_timezone_set('Europe/Helsinki');
            $who = unpack("a256u/a4tid/a32tname/ilog/iunk/itstamp/", $who);
            if ($who['unk'] == 7)
            {
                echo trim($who['u']) . str_repeat(' ', 6);
                echo trim($who['tname']) . str_repeat(' ', 2);
                echo date("M ", $who['tstamp']);
                echo str_pad(date("j ", $who['tstamp']), 3, " ", STR_PAD_LEFT);
                echo date("H:i", $who['tstamp']) . " \n";
            }
        }
        print_r($who); 
    }
?>