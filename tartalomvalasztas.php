<?php
$index_html = new html_blokk;
$menu = filter_input(INPUT_GET, 'menu');

if ($menu){
   $tartalom = $index_html->load_template_file("sablonok/".$menu.".html", $array);
   if ($menu == "elerhetosegek"){
   $extra_gombok = '<a href="?" class="extra_gomb" style="background-color: #ed6c44;">Kezdőlap</a>
                    <a href="?menu=csoport&id=akcios" class="extra_gomb">Akciós termékek</a>
                    <a href="?menu=design" class="extra_gomb">Design termékek</a>';
   }
}
else {	
   $tartalom = $index_html->load_template_file("sablonok/cimlap.html", $array);
}	

if ($menu == 'csoport'){
    require_once('csoport.php');
}

if ($menu == 'termek'){
    require_once('termek.php');
}