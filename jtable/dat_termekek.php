<?php

try
{
	//Open database connection
	$domain = $_SERVER['HTTP_HOST'];
	if ($domain == 'localhost'){
      $con = mysql_connect("localhost","root","");
      mysql_select_db("gps_ugyfelkapu", $con);}
    else{
      $con = mysql_connect("localhost","gepponts_user","gepponts2012");
      mysql_select_db("gepponts_gpsugyfelkapu", $con);
    }
    
    mysql_set_charset("latin2",$con);
    $data_table = $_GET["data_table"];
	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get records from database
		$result = mysql_query("SELECT * FROM $data_table;");
		
		//Add all records to an array
		$rows = array();
		while($row = mysql_fetch_array($result))
		{
           //latin2-es mezõ miatt
           $row['megnevezes']=iconv('ISO-8859-2','UTF-8',$row['megnevezes']);
           $row['kiszereles']=iconv('ISO-8859-2','UTF-8',$row['kiszereles']);
           $row['cikkszam']=iconv('ISO-8859-2','UTF-8',$row['cikkszam']);
           $row['mennyisegiegyseg']=iconv('ISO-8859-2','UTF-8',$row['mennyisegiegyseg']);
		   $rows[] = $row;
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	{
		//Insert record into database
        $cikkszam_string =iconv('UTF-8','ISO-8859-2',$_POST["cikkszam"]);
        $megnevezes_string =iconv('UTF-8','ISO-8859-2',$_POST["megnevezes"]);
        $kiszereles_string =iconv('UTF-8','ISO-8859-2',$_POST["kiszereles"]);
        $mennyisegiegyseg_string =iconv('UTF-8','ISO-8859-2',$_POST["mennyisegiegyseg"]);
		$result = mysql_query("INSERT INTO $data_table (cikkszam, megnevezes, kiszereles, mennyisegiegyseg) VALUES('" . $cikkszam_string . "', '" . $megnevezes_string . "', '" . $kiszereles_string . "', '" . $mennyisegiegyseg_string . "');");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM $data_table WHERE sorszam = LAST_INSERT_ID();");
		$row = mysql_fetch_array($result);
        $row['cikkszam']=iconv('ISO-8859-2','UTF-8',$row['cikkszam']);
        $row['megnevezes']=iconv('ISO-8859-2','UTF-8',$row['megnevezes']);
        $row['kiszereles']=iconv('ISO-8859-2','UTF-8',$row['kiszereles']);
        $row['mennyisegiegyseg']=iconv('ISO-8859-2','UTF-8',$row['mennyisegiegyseg']);
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
        
		print json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		//Update record in database
        $cikkszam_string =iconv('UTF-8','ISO-8859-2',$_POST["cikkszam"]);
        $megnevezes_string =iconv('UTF-8','ISO-8859-2',$_POST["megnevezes"]);
        $kiszereles_string =iconv('UTF-8','ISO-8859-2',$_POST["kiszereles"]);
        $mennyisegiegyseg_string =iconv('UTF-8','ISO-8859-2',$_POST["mennyisegiegyseg"]);
		$result = mysql_query("UPDATE $data_table SET cikkszam = '" . $cikkszam_string . "', megnevezes = '" . $megnevezes_string . "', kiszereles = '" . $kiszereles_string . "', mennyisegiegyseg = '" . $mennyisegiegyseg_string . "' WHERE sorszam = '" . $_POST["sorszam"] . "';");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM $data_table WHERE sorszam = " . $_POST["sorszam"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	mysql_close($con);

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}
	
?>