#!/usr/bin/php
<?php
    function ft_check_datetime_format($str)
    {
        $check_date = preg_match('/^(Lundi|Mardi|Mercredi|Jeudi|Vendredi|Samedi|Dimanche) ([0-9]|1[0-9]|2[0-9]|3[0-1]) (Janvier|Fevrier|Mars|Avril|Mai|Juin|Juillet|Aout|Septembre|Octobre|Novembre|Decembre) ([0-9]{4}) (([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9]))$/', $str, $check);
        if (!$check_date)
            exit ("Wrong Format\n");
    }

    function ft_get_month($month_input)
    {
        $month_input = strtolower($month_input);
        $months_array_FR = array(
        "janvier" => 1,
        "fevrier" => 2,
        "mars" => 3,
        "avril" => 4,
        "mai" => 5,
        "juin" => 6,
        "juillet" => 7,
        "aout" => 8,
        "septembre" => 9,
        "octobre" => 10,
        "novembre" => 11,
        "decembre" => 12
        );
        return ($months_array_FR[$month_input]);
    }

    if ($argc != 2)
        exit(1);
    if ($argc == 2)
    {
        ft_check_datetime_format($argv[1]);
        date_default_timezone_set('Europe/Paris');
        $array = explode(" ", $argv[1]);
        $day = $array[1];
        $month = ft_get_month($array[2]);
        $year = $array[3];
        $time = $array[4];
        $unix_timestamp = strtotime($year . '-' . $month . '-' . $day . ' ' . $time);
        echo $unix_timestamp . "\n";
    }
?>