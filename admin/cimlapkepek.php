<?php

if ($_REQUEST[torles]){
   unlink('slider_kep/'.$_REQUEST[torles]);
}

if ($_REQUEST[slide]){
   $konyvtar = 'slider_kep/';
   
	foreach($_FILES as $allomanynev => $all_tomb) {
	   $fajlnev_n = $all_tomb['name'].'_'.$num_rows .'.jpg';
		move_uploaded_file($all_tomb['tmp_name'], "$konyvtar/$fajlnev_n");
		If ($all_tomb['tmp_name'] == "") {
			$nincsfajl=1;
		}
		$filenev = "slider_kep/".$all_tomb['name'];
		$filename = $all_tomb['name'];
		settype ($filenev, 'string');
		$uzenet = $all_tomb['tmp_name'];
	}
}

if ($_REQUEST[designtermek_kep]){
   $konyvtar = 'designtermek_kep/';
   $mask = $konyvtar."*.*";
   array_map( "unlink", glob( $mask ) );
   
	foreach($_FILES as $allomanynev => $all_tomb) {
	   $fajlnev_n = $all_tomb['name'].'_'.$num_rows .'.jpg';
		move_uploaded_file($all_tomb['tmp_name'], "$konyvtar/$fajlnev_n");
		If ($all_tomb['tmp_name'] == "") {
			$nincsfajl=1;
		}
		$filenev = "designtermek_kep/".$all_tomb['name'];
		$filename = $all_tomb['name'];
		settype ($filenev, 'string');
		$uzenet = $all_tomb['tmp_name'];
	}
}

if ($_REQUEST[akciostermek_kep]){
   $konyvtar = 'akciostermek_kep/';
   $mask = $konyvtar."*.*";
   array_map( "unlink", glob( $mask ) );
   
	foreach($_FILES as $allomanynev => $all_tomb) {
	   $fajlnev_n = $all_tomb['name'].'_'.$num_rows .'.jpg';
		move_uploaded_file($all_tomb['tmp_name'], "$konyvtar/$fajlnev_n");
		If ($all_tomb['tmp_name'] == "") {
			$nincsfajl=1;
		}
		$filenev = "akciostermek_kep/".$all_tomb['name'];
		$filename = $all_tomb['name'];
		settype ($filenev, 'string');
		$uzenet = $all_tomb['tmp_name'];
	}
}

   

   $directory = 'slider_kep';
   $scanned_directory = array_diff(scandir($directory), array('..', '.'));
   foreach ($scanned_directory as $key => $value){
		 $slides .= 
				  '<div class="slide">'
				 . '<img src="/'.MAIN_DIRECTORY.'slider_kep/'.$value.'" alt="" style="width: 630px; height: 388px;" />'
				 . '</div><a href="?tartalom=cimlapkepek&torles='.$value.'">törlés</a><br style="clear:both;" /><br style="clear:both;" />';
   }
   
   $directory = 'akciostermek_kep';
   $scanned_directory = array_diff(scandir($directory), array('..', '.'));
   foreach ($scanned_directory as $key => $value){
		 $akciostermek_kep .= 
				  '<div class="slide">'
				 . '<img src="/'.MAIN_DIRECTORY.'akciostermek_kep/'.$value.'" alt="" style="height: 290px; width: 300px;" />'
				 . '</div><br style="clear:both;" /><br style="clear:both;" />';
   }
   
   $directory = 'designtermek_kep';
   $scanned_directory = array_diff(scandir($directory), array('..', '.'));
   foreach ($scanned_directory as $key => $value){
		 $designtermek_kep .= 
				  '<div class="slide">'
				 . '<img src="/'.MAIN_DIRECTORY.'designtermek_kep/'.$value.'" alt="" style="height: 290px; width: 300px;" />'
				 . '</div><br style="clear:both;" /><br style="clear:both;" />';
   }

$admin_torzs = ''
		. '<form action="admin.php?tartalom=cimlapkepek" enctype="multipart/form-data" method="post" class="admin_form">'
		. '<h2>animáció képek (630x388)</h2>'
		. '<br style="clear:both;" />'
		. $slides
		. 'Új kép feltöltése:<br style="clear:both;" />
			   <input name="file" type="file" size="30" accept="image/*" maxlength="150" /><br style="clear:both;" />
			   <input type="submit" name="slide" value="Feltöltés" />			
		   </form>'
		. ''
		. '<form action="admin.php?tartalom=cimlapkepek" enctype="multipart/form-data" method="post" class="admin_form">'
		. '<h2>akciós termékek kép (300x290)</h2>'
		. '<br style="clear:both;" />'
		. $akciostermek_kep
		. 'Új kép feltöltése:<br style="clear:both;" />
			   <input name="file" type="file" size="30" accept="image/*" maxlength="150" /><br style="clear:both;" />
			   <input type="submit" name="akciostermek_kep" value="Feltöltés" />			
		   </form>'
		. ''
		. '<form action="admin.php?tartalom=cimlapkepek" enctype="multipart/form-data" method="post" class="admin_form">'
		. '<h2>design termékek kép (300x290)</h2>'
		. '<br style="clear:both;" />'
		. $designtermek_kep
		. 'Új kép feltöltése:<br style="clear:both;" />
			   <input name="file" type="file" size="30" accept="image/*" maxlength="150" /><br style="clear:both;" />
			   <input type="submit" name="designtermek_kep" value="Feltöltés" />			
		   </form>';