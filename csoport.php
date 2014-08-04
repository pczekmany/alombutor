<?php
if ($_REQUEST[id] == 'akcios'){
    
    $csoport_felirat = 'Akciós termékek';

    $result = mysql_query("SELECT sorszam, nev, ar FROM ".$_SESSION[adatbazis_etag]."_termekek WHERE akcios = 1");
    while ($next_element = mysql_fetch_array($result)){
        $result2 = mysql_query("SELECT fajlnev_nagy FROM ".$_SESSION[adatbazis_etag]."_galeriakepek WHERE sorszam = $next_element[sorszam]");
        $a = mysql_fetch_row($result2);
        $kep = $a[0];

            $ar = number_format($next_element[ar], 0, ',', '.'). ' Ft';

        $lista .= '
        <a href="?menu=termek&id='.$next_element[sorszam].'" class="termek_lista">
            <h2>'.$next_element[nev].'</h2>
            <div><img src="termekkepek/'.$kep.'" alt="" /></div>
            <p>'.$ar.'-tól</p>
        </a>';
    }
    
} else {

    $result2 = mysql_query("SELECT felirat_hu FROM ".$_SESSION[adatbazis_etag]."_galeriacsop WHERE sorszam = $_REQUEST[id]");
    $a = mysql_fetch_row($result2);
    $csoport_felirat = $a[0];

    $result = mysql_query("SELECT sorszam, nev, ar FROM ".$_SESSION[adatbazis_etag]."_termekek WHERE csoport = $_REQUEST[id]");
    while ($next_element = mysql_fetch_array($result)){
        $result2 = mysql_query("SELECT fajlnev_nagy FROM ".$_SESSION[adatbazis_etag]."_galeriakepek WHERE sorszam = $next_element[sorszam]");
        $a = mysql_fetch_row($result2);
        $kep = $a[0];

            $ar = number_format($next_element[ar], 0, ',', '.'). ' Ft';

        $lista .= '
        <a href="?menu=termek&id='.$next_element[sorszam].'" class="termek_lista">
            <h2>'.$next_element[nev].'</h2>
            <div><img src="termekkepek/'.$kep.'" alt="" /></div>
            <p>'.$ar.'</p>
        </a>';
    }
}

$tartalom = '<div id="tartalom_h">
<h1>'.$csoport_felirat.'</h1>
'.$lista.'
</div>';