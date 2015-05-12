<?php
$index_html = new html_blokk;
$menu = filter_input(INPUT_GET, 'menu');

if ($menu){
   $tartalom = $index_html->load_template_file("sablonok/".$menu.".html", $array);
   if ($menu == "elerhetosegek"){
   $extra_gombok = '<a href="?" class="extra_gomb">Kezdőlap</a>
                    <a href="?menu=csoport&id=akcios" class="extra_gomb">Akciós termékek</a>
                    <a href="?menu=design" class="extra_gomb">Design termékek</a>';
   }
}
else {	
   
   if (!$_SESSION[log]){
	  $log = new log_db;
	  $log->write('x', 'címlap');
	  $_SESSION[log] = '1';
   }
   
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
   
   $result = mysql_query("SELECT sorszam, nev, ar, tol_ar FROM ".$_SESSION[adatbazis_etag]."_termekek WHERE uj = 1 LIMIT 3");
    while ($next_element = mysql_fetch_array($result)){
        $result2 = mysql_query("SELECT fajlnev_nagy FROM ".$_SESSION[adatbazis_etag]."_galeriakepek WHERE sorszam = $next_element[sorszam] ORDER BY kepszam DESC");
        $a = mysql_fetch_row($result2);
        $kep = $a[0];

            $ar = number_format($next_element[ar], 0, ',', '.'). ' Ft';
		
		if ($next_element[tol_ar] == '1'){
		   $ar .= '-tól';
		} 
			
        $uj_termek_lista .= '
        <a name="anchor_'.$next_element[sorszam].'" href="?menu=termek&id='.$next_element[sorszam].'&amp;a='.$next_element[sorszam].'" title="Kattintson a részletekért!" alt="Kattintson a részletekért!" class="termek_lista" style="margin: 0px 7px 10px 6px;">
            <div><img src="termekkepek/'.$kep.'" alt="" /></div>
			<h2>'.$next_element[nev].'</h2>
            <p>'.$ar.'</p>
        </a>';
    }
   
   $array = array('slider' => $slider,
	   'uj_termek_lista' => $uj_termek_lista,
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