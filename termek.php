<?php
$result = mysql_query("SELECT nev, csoport, szin, leiras, ar, tol_ar FROM ".$_SESSION[adatbazis_etag]."_termekek WHERE sorszam = $_REQUEST[id]");
$a = mysql_fetch_row($result);
$nev = $a[0];
$csoport = $a[1];
$szin = $a[2];
$leiras = nl2br($a[3]);
$ar = $a[4];
$tol_ar = $a[5];

$ar = number_format($ar, 0, ',', '.'). ' Ft';
if ($tol_ar == '1'){
   $ar .= '-tól';
}


$result = mysql_query("SELECT fajlnev_nagy, felirat_hu FROM ".$_SESSION[adatbazis_etag]."_galeriakepek WHERE sorszam = $_REQUEST[id]");
while ($next_element = mysql_fetch_array($result)){
    $galeria .= '
    <a href="termekkepek/'.$next_element[fajlnev_nagy].'" class="highslide" title="Kattintson a nagyításhoz!" alt="Kattintson a nagyításhoz!" onclick="return hs.expand (this, {dimmingOpacity: 0.90})">
        <img src="termekkepek/'.$next_element[fajlnev_nagy].'" alt="" />
    </a>
    <div class="highslide-caption">
        <div id="kepfelirat">'.$next_element[felirat_hu].'<br /><!--(1/3)--></div>
        <a href="#" onclick="return hs.next(this)" class="controlleft">
        <img src="graphics/next_sz.png" border="0" alt="következő" title="következő" />
        </a>
        <a href="#" onclick="return hs.previous(this)" class="controlright">
        <img src="graphics/back_sz.png" border="0" alt="előző" title="előző" />
        </a>
    </div>
    ';
}

if ($szin){$szin = '<tr><td>Elérhető színek:</td><td>'.$szin.'</td></tr>';}
if ($elem){$elem = '<tr><td>Elemek:</td><td>'.$elem.'</td></tr>';}

if ($_REQUEST[b] == '1'){
   $csoport = 'akcios';
} else {
   
}

$tartalom = '
<div id="tartalom_h">
   <h1>'.$nev.'</h1>
   <table class="termek_tablazat">
	   <tr><td>ÁR:</td><td>'.$ar.'</td></tr>
	   '.$szin.'
	   '.$elem.'
   </table>
   <p class="leiras">
	  <span>Leírás:</span>
	  '.$leiras.'
   </p>
   <div class="galeria">
	  '.$galeria.'
   </div>
   <a href="?menu=csoport&id='.$csoport.'#anchor_'.$_REQUEST[a].'" class="vissza">vissza</a>
</div>';