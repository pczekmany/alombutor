<?php

//Open database connection
	$domain = $_SERVER['HTTP_HOST'];
	if ($domain == 'localhost'){
      $con = mysql_connect("localhost","root","");
      mysql_select_db("merlegek", $con);}
    else{
      $con = mysql_connect("localhost","magnet","center2012");
      mysql_select_db("magnet_center", $con);
    }
    
    mysql_set_charset("utf8",$con);
    $data_table = $_GET["data_table"];

$result = mysql_query("SELECT id, kategorianev_hu FROM merlegek_kategoriak WHERE szulo = '0'");
while ($sor = mysql_fetch_array($result)){
   $sorok .= '{"DisplayText":"'.$sor['kategorianev_hu'].'", "Value":"'.$sor['id'].'"},';
}
$sorok = '{"DisplayText":" ", "Value":"0"},'.$sorok;

$sorok = substr($sorok, 0, -1);

$data = '
{
   "Result":"OK",
   "Options":[
      '.$sorok.'
   ]
}';

echo $data;