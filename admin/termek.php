<?php
If ($_REQUEST['termek_torles'] == "on") {
	$result = "DELETE FROM ".$_SESSION[adatbazis_etag]."_termekek WHERE sorszam = $_REQUEST[termek] LIMIT 1";
	mysql_query($result);
	header("Location: admin.php?tartalom=termeklist");
}

#új termék rögzítése
If ($_REQUEST[ujmentes] == '1'){
	if ($_REQUEST[termek_akcios] == "on") { $termek_akciosx = 1;}
	else { $termek_akciosx = 0;}
	if ($_REQUEST[termek_design] == "on") { $termek_designx = 1;}
	else { $termek_designx = 0;}
	if ($_REQUEST[termek_uj] == "on") { $termek_ujx = 1;}
	else { $termek_ujx = 0;}
	if ($_REQUEST[termek_aktiv] == "on") { $termek_aktivx = 1;}
	else { $termek_aktivx = 0;}
	if ($_REQUEST[termek_tol_ar] == "on") { $termek_tol_arx = 1;}
	else { $termek_tol_arx = 0;}
	if ($_REQUEST[termek_listaar] != "") { $termek_listaar = $_REQUEST[termek_listaar];}
	else { $termek_listaar = 0;}
	
	
	if ($_REQUEST[termek_megnevezes] != ""){
		$result = mysql_query("SELECT MAX(sorszam) FROM ".$_SESSION[adatbazis_etag]."_termekek");
		$row = mysql_fetch_array($result); 
		$num_rows=$row[0];
		$num_rows++;
		$ujelemsorszam = $num_rows;
		$result_termek = "INSERT INTO ".$_SESSION[adatbazis_etag]."_termekek (sorszam, csoport, nev, leiras, ar, aktiv, akcios, design, tol_ar ,uj)
		VALUES ('$num_rows', '$_REQUEST[termek_kategoria]', '$_REQUEST[termek_megnevezes]', '$_REQUEST[termek_leiras]', $termek_listaar, $termek_aktivx, $termek_akciosx, $termek_designx, $termek_tol_arx, $termek_ujx)";
		mysql_query($result_termek);
		$ujtermekszam = $num_rows;
		header("Location: admin.php?tartalom=termek&termek=".$num_rows);
	}
}

If ($_REQUEST[fokep] != ''){
	#főkép átállítása
	$result_kepek = "UPDATE ".$_SESSION[adatbazis_etag]."_galeriakepek SET kepszam='0' WHERE sorszam='$_REQUEST[termek]'"; 
	mysql_query($result_kepek);
	$result_kepek = "UPDATE ".$_SESSION[adatbazis_etag]."_galeriakepek SET kepszam='10' WHERE id='$_REQUEST[fokep]'"; 
	mysql_query($result_kepek);
	$fotolap_be = '<script>divdisp_on(\'admin_termekfotok\');</script>';
}

If ($_REQUEST[ujkepment] == '1'){
	if ($_REQUEST[termek]){
	#képfile feltöltése
	$result = mysql_query("SELECT MAX(sorszam) FROM ".$_SESSION[adatbazis_etag]."_galeriakepek");
	$row = mysql_fetch_array($result); 
	$num_rows=$row[0];
	$num_rows++;
	
	$konyvtar = 'termekkepek/';
	foreach($_FILES as $allomanynev => $all_tomb) {
	   $fajlnev_n = $all_tomb['name'].'_'.$num_rows .'.jpg';
		move_uploaded_file($all_tomb['tmp_name'], "$konyvtar/$fajlnev_n");
		If ($all_tomb['tmp_name'] == "") {
			$nincsfajl=1;
		}
		$filenev = "termekkepek/".$all_tomb['name'];
		$filename = $all_tomb['name'];
		settype ($filenev, 'string');
		$uzenet = $all_tomb['tmp_name'];
	}
	
	#a kép adatainak rögzítése az adatbázisba
	If ($nincsfajl != 1) {
		$sql2 = "INSERT INTO ".$_SESSION[adatbazis_etag]."_galeriakepek (sorszam, fajlnev_nagy) values ('$_REQUEST[termek]', '$fajlnev_n')";
		mysql_query($sql2);
	}	
	
	$fotolap_be = '<script type="text/javascript">divdisp_on(\'admin_termekfotok\');</script>'.$uzenet;
	}
}

#termék adatainak módosítása
If ($_REQUEST[ment] == '1'){
	If ($_REQUEST[termek] != ''){
		if ($_REQUEST[termek_akcios] == "on") { $termek_akciosx = 1;}
		else { $termek_akciosx = 0;}
		if ($_REQUEST[termek_design] == "on") { $termek_designx = 1;}
		else { $termek_designx = 0;}
		if ($_REQUEST[termek_uj] == "on") { $termek_ujx = 1;}
		else { $termek_ujx = 0;}
		if ($_REQUEST[termek_aktiv] == "on") { $termek_aktivx = 1;}
		else { $termek_aktivx = 0;}
		if ($_REQUEST[termek_tol_ar] == "on") { $termek_tol_arx = 1;}
		else { $termek_tol_arx = 0;}
		
		$result_termek = "UPDATE ".$_SESSION[adatbazis_etag]."_termekek SET 
					nev='$_REQUEST[termek_megnevezes]', 
					leiras='$_REQUEST[termek_leiras]',
					ar='$_REQUEST[termek_listaar]',
					szin='$_REQUEST[termek_szin]',
					anyag='$_REQUEST[termek_anyag]',
					elem='$_REQUEST[termek_elem]',
					csoport='$_REQUEST[termek_kategoria]',
					aktiv='$termek_aktivx',
					akcios='$termek_akciosx',
					design='$termek_designx',
					tol_ar='$termek_tol_arx',
					uj='$termek_ujx'
					WHERE sorszam='$_REQUEST[termek]'";
		mysql_query($result_termek);
		
		if ($_REQUEST[termek_azonosito] == ''){
			$ujkategoriax = $ujelemsorszam;}
		else {
			$ujkategoriax = $_REQUEST[termek_azonosito];}
		
		for ($i = 0; $i < 10000; $i++){
			$kategoriacombonev = 'kategoria_szulo_' . $i;
			if ($i == 0){
				if ($_REQUEST[$kategoriacombonev] != ''){
					$result = mysql_query("SELECT MAX(sorszam) FROM ".$_SESSION[adatbazis_etag]."_kategoriak_adat");
					$rowx = mysql_fetch_array($result); 
					$numrowsx=$rowx[0];
					$numrowsx++;
					$sql2 = "INSERT INTO ".$_SESSION[adatbazis_etag]."_kategoriak_adat 
					(sorszam, elemsorszam, kategoriasorszam) VALUES
					('$numrowsx', '$ujkategoriax', '".$_REQUEST[$kategoriacombonev]."')";
					mysql_query($sql2);
				}
			}
			else {
				if ($_REQUEST[$kategoriacombonev] != ''){
					$sql2 = "UPDATE ".$_SESSION[adatbazis_etag]."_kategoriak_adat SET kategoriasorszam = '$_REQUEST[$kategoriacombonev]' WHERE sorszam=$i";
					mysql_query($sql2);
				}
			}
		}
		
	}
}

#kép törlés
	If ($_REQUEST['keptorles'] != ""){
		$sql = "DELETE FROM ".$_SESSION[adatbazis_etag]."_galeriakepek WHERE id = $_REQUEST[keptorles]";
		mysql_query($sql);
		$fotolap_be = '<script type="text/javascript">divdisp_on(\'admin_termekfotok\');</script>';
	}

If ($_REQUEST[termek] == "") { 
	$termekbehiv = $ujtermekszam;}
else {
	  $termekbehiv = $_REQUEST[termek];
		
	  $result = mysql_query("SELECT t.sorszam, t.nev, t.ar, t.csoport, t.szin, t.anyag, t.elem, t.leiras, t.akcios, t.aktiv, t.design, t.uj, t.tol_ar, gcs.felirat_hu FROM ".$_SESSION[adatbazis_etag]."_termekek AS t
						   LEFT JOIN ".$_SESSION[adatbazis_etag]."_galeriacsop AS gcs
						   ON t.csoport = gcs.sorszam
						   WHERE t.sorszam = $termekbehiv");

	  $a = mysql_fetch_array($result);

	  $termek_megnevezes = $a[nev];
	  $termek_szin = $a[szin];
	  $termek_anyag = $a[anyag];
	  $termek_elem = $a[elem];
	  $termek_csoport = $a[csoport];
	  $termek_leiras = $a[leiras];
	  $termek_ar = $a[ar];
	  $termek_tol_ar = $a[tol_ar];
	  $termek_akcios = $a[akcios];
	  $termek_design = $a[design];
	  $termek_uj = $a[uj];
	  $termek_aktiv = $a[aktiv];

	  if ($termek_akcios == '1'){ $termek_akcios = 'checked="checked"';}
	  if ($termek_design == '1'){ $termek_design = 'checked="checked"';}
	  if ($termek_uj == '1'){ $termek_uj = 'checked="checked"';}
	  if ($termek_tol_ar == '1'){ $termek_tol_ar = 'checked="checked"';}
	  if ($termek_aktiv == '1'){ $termek_aktiv = 'checked="checked"';}

	  //termékfotók
	$kepszam = 0;
	$resultx = mysql_query("SELECT sorszam, fajlnev_nagy, felirat_hu, kepszam, id FROM ".$_SESSION[adatbazis_etag]."_galeriakepek WHERE sorszam = $_REQUEST[termek] ORDER BY kepszam DESC");
	while ($next_elementx = mysql_fetch_array($resultx)){
		  $kepszam++;
		  if ($next_elementx['kepszam'] == '10'){
			 $fokepx = 'checked="checked"';}
		  else {
			 $fokepx = '';}
		  $termekfotok .= '
			  <div style="float: left; margin: 10px;">
				  <img src="termekkepek/'.$next_elementx[fajlnev_nagy].'" width="120" alt="kép" /><br />
				  főkép <input name="fokepx" type="checkbox" '.$fokepx.' onclick="megerosites_x('.$next_elementx[id].', \'termek_fokep\', '.$next_elementx[sorszam].')" />
				  <img src="graphics/icon_del.png" title="kép törlése" border="0" width="23" style="margin: 5 0 0 20;" onclick="megerosites_x('.$next_elementx[id].', \'termek_kep\', '.$next_elementx[sorszam].')" alt="kép törlése" />
			  </div>';
	  
	}
}

$result = mysql_query("SELECT sorszam, felirat_hu FROM ".$_SESSION[adatbazis_etag]."_galeriacsop ORDER BY felirat_hu");
while ($next_element = mysql_fetch_array($result)){
   if ($termek_csoport == $next_element[sorszam]){
	  $select = 'selected="selected"';
   } else {
	  $select = '';
   }
   $kategoria_lista .= '<option value="'.$next_element[sorszam].'" '.$select.'>'.$next_element[felirat_hu].'</option>';
}
$kategoria_combo = '<select name="termek_kategoria">'.$kategoria_lista.'</select>';

if ($ujtermekszam != ''){$termek_sorszam = $ujtermekszam;}

If ($_REQUEST[uj] == '1'){
	$submit_felirat = 'Termék rögzítése';
	$form_action = 'admin.php?tartalom=termek&amp;ujmentes=1';}
else {
	$submit_felirat = 'Mentés';
	$form_action = 'admin.php?tartalom=termek&amp;termek=' . $_REQUEST[termek] . '&amp;ment=1';}

$admin_torzs = '
<form action="'.$form_action.'" method="post" class="admin_form" id="termek">
	<div class="a_form_fej">Termék adatlap <input type="submit" name="torol" value="'.$submit_felirat.'" class="a_form_mentes" /></div>
	<div style="width: 600px; float: left; text-align: left; margin: 20px 0px 0px 20px;">
		<a href="#" onclick="divdisp_on(\'admin_termekadatlap\');" id="a_lap_adatlap">ADATLAP</a>
		<a href="#" onclick="divdisp_on(\'admin_termekfotok\');" id="a_lap_fotok">FOTÓK</a>
		<a href="#" onclick="divdisp_on(\'admin_termekforum\');" id="a_lap_hozzaszol" style="display: none;">HOZZÁSZÓLÁSOK</a>
		<a href="#" onclick="divdisp_on(\'admin_termekdokumentumok\');" id="a_lap_hozzaszol" style="display: none;">DOKUMENTUMOK</a>
	</div>
	<div id="admin_termekadatlap">
		<table class="a_form_beldiv">
			<tr><td>&nbsp;</td><td><input name="termek_azonosito" size="30" type="text" value="'.$termek_sorszam.'" style="display:none;" /></td></tr>
			<!--<tr><td>Sorszám:</td><td>'.$termek_sorszam.'</td></tr>-->
			<tr><td>Kategória:</td><td>'.$kategoria_combo.'</td></tr>
			<tr><td>Megnevezés:</td><td><input name="termek_megnevezes" size="30" type="text" value="' . $termek_megnevezes . '" /></td></tr>
			<!--
			<tr><td>Szín:</td><td><input name="termek_szink" size="30" type="text" value="' . $termek_szin . '" /></td></tr>
			<tr><td>Anyag:</td><td><input name="termek_anyag" size="30" type="text" value="' . $termek_anyag . '" /></td></tr>
			<tr><td>Elem:</td><td><input name="termek_elem" size="30" type="text" value="' . $termek_elem . '" /></td></tr>
			-->
			<tr><td>Leírás:</td><td><textarea name="termek_leiras" rows="10" cols="40">' . $termek_leiras . '</textarea></td></tr>
			<tr><td>Listaár:</td><td><input name="termek_listaar" size="30" type="text" value="' . $termek_ar . '" onkeyup="numerikusCheck(termek.termek_webar)" /></td></tr>
			<tr><td>-tól ár:</td><td><input name="termek_tol_ar" size="30" type="checkbox" '.$termek_tol_ar.' /></td></tr>
			<tr><td>Akciós:</td><td><input name="termek_akcios" size="30" type="checkbox" '.$termek_akcios.' /></td></tr>
			<tr><td>Design:</td><td><input name="termek_design" size="30" type="checkbox" '.$termek_design.' /></td></tr>
			<tr><td>Új termék:</td><td><input name="termek_uj" size="30" type="checkbox" '.$termek_uj.' /></td></tr>
			<tr><td>Aktív:</td><td><input name="termek_aktiv" size="30" type="checkbox" '.$termek_aktiv.' /></td></tr>
			<tr><td>Végleges törlés:</td><td><input name="termek_torles" size="30" type="checkbox" '.$termek_torles.' /></td></tr>
		</table>
	</div>

	<div id="admin_termekforum" style="display: none;">
		<table class="a_form_beldiv">
			<tr>
			<td>'. $forumx.'</td>
			</tr>
		</table>
	</div>
	
	<div id="admin_termekdokumentumok" style="display: none;">
		<table class="a_form_beldiv">
			<tr>
			<td>'.$termekdokumentumok.'</td>
			</tr>
		</table>
	</div>
	
	<div id="admin_termekfotok" style="display: none;">
		<table class="a_form_beldiv">
			<tr>
			<td>'.$termekfotok.'</td>
			</tr>
		</table>
	</div>
	
</form>

<div id="kepfeltolt" style="display: none;">
	<form action="admin.php?tartalom=termek&amp;termek='.$_REQUEST[termek].'&amp;ujkepment=1" enctype="multipart/form-data" method="post" class="admin_form">
		<div class="a_form_beldiv">
		Új kép feltöltése:<br style="clear:both;" />
		<input name="file" type="file" size="30" accept="image/*" maxlength="150" /><br style="clear:both;" />
		<input type="submit" name="submit" value="Feltöltés" />			
		</div>
	</form>
</div>

<div id="dokfeltolt" style="display: none;">
	<form action="admin.php?tartalom=termek&amp;termek='.$termek_sorszam.'&amp;ujfajlment=1" enctype="multipart/form-data" method="post" class="admin_form">
		<div class="a_form_beldiv">
		Új dokumentum feltöltése:<br style="clear:both;" />
		<input name="file" type="file" size="30" accept="image/*" maxlength="150" /><br style="clear:both;" />
		<input type="submit" name="submit" value="Feltöltés" />			
		</div>
	</form>
</div>

'.$fotolap_be.$doklap_be.'';

If ($_REQUEST['termek_torles'] == "on") {
	include('admin/admin_termeklist.php');
	$admin_torzs = $admin_termeklist;}