<?php
require_once('../parameters.php');
$directory = '../images_csoportok';
$scanned_directory = array_diff(scandir($directory), array('..', '.'));

$sorok = '{"DisplayText":"", "Value":""},';

foreach ($scanned_directory as $key => $value){
   $sorok .= '{"DisplayText":"'.$value.'", "Value":"'.$value.'"},';
}

$sorok = substr($sorok, 0, -1);

$data = '
{
   "Result":"OK",
   "Options":[
      '.$sorok.'
   ]
}';

echo $data;