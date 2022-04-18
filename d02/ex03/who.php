#!/usr/bin/php
<?php
    date_default_timezone_set('Europe/Helsinki');
    $fh = fopen("/var/run/utmpx", "r");
    if ($fh)
    {
        while ($who = fread($fh, 628))
        {
            $who = unpack("a256u/a4tid/a32tname/ipid/ilogintype/itstamp/", $who);
            if ($who['logintype'] == 7)
            {
                echo trim($who['u']) . str_repeat(' ', 2);
                echo trim($who['tname']) . str_repeat(' ', 2);
                echo date("M ", $who['tstamp']);
                echo str_pad(date("j ", $who['tstamp']), 3, " ", STR_PAD_LEFT);
                echo date("H:i", $who['tstamp']) . " \n";
            }
        }
    }
?>