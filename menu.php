<?php
$result = mysql_query("SELECT sorszam, felirat_hu FROM ".$_SESSION[adatbazis_etag]."_galeriacsop ORDER BY sorrendszam");
while ($next_element = mysql_fetch_array($result)){
    $menulista .= '<a href="?menu=csoport&id='.$next_element[sorszam].'">'.$next_element[felirat_hu].'</a>';
}