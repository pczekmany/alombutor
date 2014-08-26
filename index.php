<?php
session_start();
require_once('parameters.php');
require_once('functions.php');
require_once('class.php');

//kapcsolat létrehozása az adatbázis szerverrel (class.php)
$adatkapcsolat = new data_connect;  //példányosítjuk az objektumot
$adatkapcsolat->connect();          //az objektum connect fügvényét futatjuk

require_once('menu.php');

require_once('tartalomvalasztas.php');

$result = mysql_query("SELECT sorszam FROM ".$_SESSION[adatbazis_etag]."_log");
$latogatoszam = 50 + mysql_num_rows($result);

$array = array('tartalom' => $tartalom,
		'alcim' => $alcim,
		'latogatoszam' => $latogatoszam,
        'menulista' => $menulista,
        'extra_gombok' => $extra_gombok,
		'admin_konyvtar' => $admin_konyvtar);
	 
$index_html = new html_blokk;

echo $index_html->load_template_file("sablonok/index.html", $array);