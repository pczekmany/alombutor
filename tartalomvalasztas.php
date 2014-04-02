<?php
$index_html = new html_blokk;
$menu = filter_input(INPUT_GET, 'menu');

if ($menu){
   $tartalom = $index_html->load_template_file("sablonok/".$menu.".html", $array);}
else {	
   $tartalom = $index_html->load_template_file("sablonok/cimlap.html", $array);
}	