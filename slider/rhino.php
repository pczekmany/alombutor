<?
$result = mysql_query("SELECT file, felirat FROM ".$_SESSION[adatbazis_etag]."_diak WHERE status = '1' ORDER BY rand()");
while ($next_element = mysql_fetch_array($result)){
	$rhino_slider_content .= '
	<li>
		<img src="diak/'.$next_element[file].'" width="940" height="340" data-thumb="diak/'.$next_element['file'].'" alt="" data-transition="shuffle" />
		<span>'.$next_element['felirat'].'</span>
	</li>';
}
?>