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
   require_once('slider.php');
   
   $directory = 'designtermek_kep';
   $scanned_directory = array_diff(scandir($directory), array('..', '.'));
   foreach ($scanned_directory as $key => $value){
		 $designtermek_kep = '<img src="designtermek_kep/'.$value.'" alt="" />';
   }
   
   $directory = 'akciostermek_kep';
   $scanned_directory = array_diff(scandir($directory), array('..', '.'));
   foreach ($scanned_directory as $key => $value){
		 $akciostermek_kep = '<img src="akciostermek_kep/'.$value.'" alt="" />';
   }
   
   $array = array('slider' => $slider,
	   'akciostermek_kep' => $akciostermek_kep,
	   'designtermek_kep' => $designtermek_kep);
   
   $tartalom = $index_html->load_template_file("sablonok/cimlap.html", $array);
}	

if ($menu == 'csoport'){
    require_once('csoport.php');
}

if ($menu == 'termek'){
    require_once('termek.php');
}