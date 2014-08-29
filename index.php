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

$result = mysql_query("SELECT sorszam FROM ".$_SESSION[adatbazis_etag]."_log WHERE idopont >= CURRENT_DATE()");
$latogato_mai = mysql_num_rows($result);

$result = mysql_query("SELECT sorszam FROM ".$_SESSION[adatbazis_etag]."_log WHERE idopont >= CURRENT_DATE()-1 AND idopont < CURRENT_DATE()");
$latogato_tegnapi = mysql_num_rows($result);

$result = mysql_query("SELECT sorszam FROM ".$_SESSION[adatbazis_etag]."_log WHERE WEEKOFYEAR(idopont)=WEEKOFYEAR(NOW())");
$latogato_heti = 50 + mysql_num_rows($result);

$result = mysql_query("SELECT sorszam FROM ".$_SESSION[adatbazis_etag]."_log WHERE idopont > DATE_SUB(DATE(NOW()), INTERVAL 1 MONTH)");
$latogato_havi = 50 + mysql_num_rows($result);

$array = array('tartalom' => $tartalom,
		'alcim' => $alcim,
		'latogatoszam' => $latogatoszam,
		'latogato_mai' => $latogato_mai,
		'latogato_tegnapi' => $latogato_tegnapi,
		'latogato_heti' => $latogato_heti,
		'latogato_havi' => $latogato_havi,
        'menulista' => $menulista,
        'extra_gombok' => $extra_gombok,
		'admin_konyvtar' => $admin_konyvtar);
	 
$index_html = new html_blokk;

echo $index_html->load_template_file("sablonok/index.html", $array);