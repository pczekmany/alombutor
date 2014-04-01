<?php
	if ($_SERVER['HTTP_HOST'] == 'localhost'){
			$kapcsolat = mysql_connect("localhost", "root", "");
			$adatbazis = mysql_select_db("alombutor");
		} else {
			$kapcsolat = mysql_connect("localhost", "alombutor_user", "user2013");
			$adatbazis = mysql_select_db("alambutor_data");
		}

			if (!$kapcsolat) {
				die('Hiba a MySQL szerverhez kapcsolás közben: ' . mysql_error());
			}	
		
			if (!$adatbazis) {
				die('Hiba a MySQL adatbázishoz kapcsolódás közben: ' . mysql_error());
			}
		$ekezet = mysql_set_charset("utf8",$kapcsolat);
		
		$_SESSION[adatbazis_etag] = 'alombutor';
?>