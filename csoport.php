<?php
if ($_REQUEST[id] == 'akcios'){
    
    $csoport_felirat = 'Akciós termékek';

    $result = mysql_query("SELECT sorszam, nev, ar, tol_ar FROM ".$_SESSION[adatbazis_etag]."_termekek WHERE akcios = 1");
    while ($next_element = mysql_fetch_array($result)){
        $result2 = mysql_query("SELECT fajlnev_nagy FROM ".$_SESSION[adatbazis_etag]."_galeriakepek WHERE sorszam = $next_element[sorszam]");
        $a = mysql_fetch_row($result2);
        $kep = $a[0];

            $ar = number_format($next_element[ar], 0, ',', '.'). ' Ft';
		if ($next_element[tol_ar] == '1'){
		   $ar .= '-tól';
		} 
			
        $lista .= '
        <a name="anchor_'.$next_element[sorszam].'" href="?menu=termek&id='.$next_element[sorszam].'&amp;a='.$next_element[sorszam].'&amp;b=1" class="termek_lista">
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
        $result2 = mysql_query("SELECT fajlnev_nagy FROM ".$_SESSION[adatbazis_etag]."_galeriakepek WHERE sorszam = $next_element[sorszam]");
        $a = mysql_fetch_row($result2);
        $kep = $a[0];

            $ar = number_format($next_element[ar], 0, ',', '.'). ' Ft';
		
		if ($next_element[tol_ar] == '1'){
		   $ar .= '-tól';
		} 
			
        $lista .= '
        <a name="anchor_'.$next_element[sorszam].'" href="?menu=termek&id='.$next_element[sorszam].'&amp;a='.$next_element[sorszam].'" class="termek_lista">
            <div><img src="termekkepek/'.$kep.'" alt="" /></div>
			<h2>'.$next_element[nev].'</h2>
            <p>'.$ar.'</p>
        </a>';
    }
    
} 

if (($_REQUEST[id] != 'akcios') AND ($_REQUEST[id] != 'design')){

    $result2 = mysql_query("SELECT felirat_hu FROM ".$_SESSION[adatbazis_etag]."_galeriacsop WHERE sorszam = $_REQUEST[id]");
    $a = mysql_fetch_row($result2);
    $csoport_felirat = $a[0];

    $result = mysql_query("SELECT sorszam, nev, ar, tol_ar FROM ".$_SESSION[adatbazis_etag]."_termekek WHERE csoport = $_REQUEST[id]");
    while ($next_element = mysql_fetch_array($result)){
        $result2 = mysql_query("SELECT fajlnev_nagy FROM ".$_SESSION[adatbazis_etag]."_galeriakepek WHERE sorszam = $next_element[sorszam]");
        $a = mysql_fetch_row($result2);
        $kep = $a[0];

            $ar = number_format($next_element[ar], 0, ',', '.'). ' Ft';
		
		if ($next_element[tol_ar] == '1'){
		   $ar .= '-tól';
		} 
			
        $lista .= '
        <a name="anchor_'.$next_element[sorszam].'" href="?menu=termek&amp;id='.$next_element[sorszam].'&amp;a='.$next_element[sorszam].'" class="termek_lista">
            
            <div><img src="termekkepek/'.$kep.'" alt="" /></div>
			<h2>'.$next_element[nev].'</h2>
            <p>'.$ar.'</p>
        </a>';
    }
}

$tartalom = '<div id="tartalom_h">
<h1>'.$csoport_felirat.'</h1>
'.$lista.'
</div>';