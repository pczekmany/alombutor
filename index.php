<?php
session_start();
include('parameters.php');
#include('adatkapcsolat.inc.php');
include('class/class.php');
#######include('tartalomvalasztas.php');
#include('email.php');
#include('css_valaszt.php');

$array = array('tartalom' => $tartalom,
				'alcim' => $alcim,
				'admin_konyvtar' => $admin_konyvtar);
	 
$index_html = new html_blokk;
$index_html->load_template_file("template/index.html",$array);
echo $index_html->html_code;
?>