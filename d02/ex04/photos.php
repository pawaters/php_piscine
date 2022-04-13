#!/usr/local/bin/php
<?php

$page = file_get_contents($argv[1]);
preg_match_all("/<img .*?>/", $page, $array);

$url = preg_replace('/\/$/', '', $argv[1]);
preg_match("/[^\/]*\$/", $url, $folder_tab);
$folder = $folder_tab[0] . "/";
mkdir($folder);

preg_match_all("/<img .*?>/", $page, $tab);
$img_tab = $tab[0];

foreach ($img_tab as $img)
{
    preg_match("/src=[\"'].*?[\"']/", $img, $src_tab);
    $src = substr($src_tab[0], 5, -1);
    preg_match("/[^\/]*\$/", $src, $name_tab);
	$name = $name_tab[0];
    if (preg_match("/http?.:\/\//", $src))
		copy($src, $folder . $name);
	else
		copy($argv[1] . "/" . trim($src, "/"), $folder . $name);
}

?>