<?php
if ($_REQUEST[torles] != "" ){ 
	$result_torles = "UPDATE ".$_SESSION[adatbazis_etag]."_termekek SET aktiv='2' WHERE sorszam='$_REQUEST[torles]'";
	mysql_query($result_torles);
}

$result = mysql_query("SELECT t.sorszam, t.nev, t.ar, gcs.felirat_hu FROM ".$_SESSION[adatbazis_etag]."_termekek AS t
					 LEFT JOIN ".$_SESSION[adatbazis_etag]."_galeriacsop AS gcs
					 ON t.csoport = gcs.sorszam
					 ORDER BY gcs.felirat_hu");

while ($next_element = mysql_fetch_array($result)){
    $result2 = mysql_query("SELECT fajlnev_nagy FROM ".$_SESSION[adatbazis_etag]."_galeriakepek WHERE sorszam = $next_element[sorszam]");
    $a = mysql_fetch_row($result2);
    $kep = $a[0];
    
    $termeklista .= '
    <a href="?tartalom=termek&termek='.$next_element[sorszam].'">
        <div><img src="termekkepek/'.$kep.'" alt="" /></div>
		<span>'.$next_element[felirat_hu].'</span>
		<span>'.$next_element[nev].'</span>
        <span>'.$next_element[ar].'-tól</span>
    </a>';
}

$admin_torzs = '
<form method="post" id="termek" class="admin_form">
	<div class="a_form_fej">Termékek</div>
	<div class="a_form_beldiv">
		<!--
		 '.$kategoria_combo.'
		<span style="float: left;">Cikkszám:</span><input name="termekkereso" size="6" type="text" value="" style="float: left;" /><input type="image" src="graphics/icon_search.png" name="Submit" title="Ugrás a termékhez" style="float: left; width: 23px;" />
		-->
		<a href="admin.php?tartalom=termek&amp;uj=1" style="text-decoration: none;">
		 <img src="graphics/icon_new.png" title="új termék" border="0" style=" margin: 0px 0px 0px 20px; width: 23px;" alt="új termék" />
		</a>
		<div class="admin_termeklista">
		'.$termeklista.'
		</div>
		<br style="clear: both;" />
	</div>
</form>';
?>