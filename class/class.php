<?php

class html_blokk{
	public $html_code;
	
	function load_template_file($fajlnev,$tomb) {
 
		if(file_exists($fajlnev) > 0) {
			$temp = fopen($fajlnev,"r");
			$tartalom = fread($temp, filesize($fajlnev));
			fclose($temp);
	 
			$tartalom = preg_replace("/{(.*?)}/si","{\$tomb[\\1]}",$tartalom);
	 
			eval("\$tartalom = \"" . addslashes($tartalom) . "\";");
	 
			$this->html_code = $tartalom . "\n";
		}
 
	}
}

?>