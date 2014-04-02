<?php
session_start();
require_once('class.php');
require_once('tartalomvalasztas.php');

$array = array('tartalom' => $tartalom,
		'alcim' => $alcim,
		'admin_konyvtar' => $admin_konyvtar);
	 
$index_html = new html_blokk;

echo $index_html->load_template_file("sablonok/index.html", $array);