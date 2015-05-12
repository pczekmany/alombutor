<?php
if ($_REQUEST[id] == 'akcios'){
    
    $csoport_felirat = 'Akciós termékek';

    $result = mysql_query("SELECT sorszam, nev, ar, tol_ar FROM ".$_SESSION[adatbazis_etag]."_termekek WHERE akcios = 1");
    while ($next_element = mysql_fetch_array($result)){
        $result2 = mysql_query("SELECT fajlnev_nagy FROM ".$_SESSION[adatbazis_etag]."_galeriakepek WHERE sorszam = $next_element[sorszam] ORDER BY kepszam DESC");
        $a = mysql_fetch_row($result2);
        $kep = $a[0];

            $ar = number_format($next_element[ar], 0, ',', '.'). ' Ft';
		if ($next_element[tol_ar] == '1'){
		   $ar .= '-tól';
		} 
			
        $lista .= '
        <a name="anchor_'.$next_element[sorszam].'" href="?menu=termek&id='.$next_element[sorszam].'&amp;a='.$next_element[sorszam].'&amp;b=1" title="Kattintson a részletekért!" alt="Kattintson a részletekért!" class="termek_lista">
            <div><img src="termekkepek/'.$kep.'" alt="" /></div>
			<h2>'.$next_element[nev].'</h2>
            <p>'.$ar.'</p>
        </a>';
    }
    
} 

if ($_REQUEST[id] == 'design'){
    
    $csoport_felirat = 'Design termékek';

    $result = mysql_query("SELECT sorszam, nev, ar, tol_ar FROM ".$_SESSION[adatbazis_etag]."_termekek WHERE design = 1");
    while ($next_element = mysql_fetch_array($result)){
        $result2 = mysql_query("SELECT fajlnev_nagy FROM ".$_SESSION[adatbazis_etag]."_galeriakepek WHERE sorszam = $next_element[sorszam] ORDER BY kepszam DESC");
        $a = mysql_fetch_row($result2);
        $kep = $a[0];

            $ar = number_format($next_element[ar], 0, ',', '.'). ' Ft';
		
		if ($next_element[tol_ar] == '1'){
		   $ar .= '-tól';
		} 
			
        $lista .= '
        <a name="anchor_'.$next_element[sorszam].'" href="?menu=termek&id='.$next_element[sorszam].'&amp;a='.$next_element[sorszam].'" title="Kattintson a részletekért!" alt="Kattintson a részletekért!" class="termek_lista">
            <div><img src="termekkepek/'.$kep.'" alt="" /></div>
			<h2>'.$next_element[nev].'</h2>
            <p>'.$ar.'</p>
        </a>';
    }
    
} 

if ($_REQUEST[id] == 'uj'){
    
    $csoport_felirat = 'Új termékek';

    $result = mysql_query("SELECT sorszam, nev, ar, tol_ar FROM ".$_SESSION[adatbazis_etag]."_termekek WHERE uj = 1");
    while ($next_element = mysql_fetch_array($result)){
        $result2 = mysql_query("SELECT fajlnev_nagy FROM ".$_SESSION[adatbazis_etag]."_galeriakepek WHERE sorszam = $next_element[sorszam] ORDER BY kepszam DESC");
        $a = mysql_fetch_row($result2);
        $kep = $a[0];

            $ar = number_format($next_element[ar], 0, ',', '.'). ' Ft';
		
		if ($next_element[tol_ar] == '1'){
		   $ar .= '-tól';
		} 
			
        $lista .= '
        <a name="anchor_'.$next_element[sorszam].'" href="?menu=termek&id='.$next_element[sorszam].'&amp;a='.$next_element[sorszam].'" title="Kattintson a részletekért!" alt="Kattintson a részletekért!" class="termek_lista">
            <div><img src="termekkepek/'.$kep.'" alt="" /></div>
			<h2>'.$next_element[nev].'</h2>
            <p>'.$ar.'</p>
        </a>';
    }
    
}

if (($_REQUEST[id] != 'akcios') AND ($_REQUEST[id] != 'design')AND ($_REQUEST[id] != 'uj')){

    $result2 = mysql_query("SELECT felirat_hu FROM ".$_SESSION[adatbazis_etag]."_galeriacsop WHERE sorszam = $_REQUEST[id]");
    $a = mysql_fetch_row($result2);
    $csoport_felirat = $a[0];

    $result = mysql_query("SELECT sorszam, nev, ar, tol_ar FROM ".$_SESSION[adatbazis_etag]."_termekek WHERE csoport = $_REQUEST[id]");
    while ($next_element = mysql_fetch_array($result)){
        $result2 = mysql_query("SELECT fajlnev_nagy FROM ".$_SESSION[adatbazis_etag]."_galeriakepek WHERE sorszam = $next_element[sorszam] ORDER BY kepszam DESC");
        $a = mysql_fetch_row($result2);
        $kep = $a[0];

            $ar = number_format($next_element[ar], 0, ',', '.'). ' Ft';
		
		if ($next_element[tol_ar] == '1'){
		   $ar .= '-tól';
		} 
			
        $lista .= '
        <a name="anchor_'.$next_element[sorszam].'" href="?menu=termek&amp;id='.$next_element[sorszam].'&amp;a='.$next_element[sorszam].'" title="Kattintson a részletekért!" alt="Kattintson a részletekért!" class="termek_lista">
            
            <div><img src="termekkepek/'.$kep.'" alt="" /></div>
			<h2>'.$next_element[nev].'</h2>
            <p>'.$ar.'</p>
        </a>';
    }
}

$tartalom = '<div id="tartalom_h">
<h1>'.$csoport_felirat.'</h1>
'.$lista.'
<a href="'.$_SERVER[REQUEST_URI].'#top" class="vissza">Ugrás a lap tetejére</a>
</div>';