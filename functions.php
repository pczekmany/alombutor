<?php
function backup_tables($tables = '*')
{
		
	  //get all of the tables
	  if($tables == '*')
	  {
		  $tables = array();
		  $result = mysql_query('SHOW TABLES');
		  while($row = mysql_fetch_row($result))
		  {
			  $tables[] = $row[0];
		  }
	  }
	  else
	  {
		  $tables = is_array($tables) ? $tables : explode(',',$tables);
	  }

	  //cycle through
	  foreach($tables as $table)
	  {
		  $result = mysql_query('SELECT * FROM '.$table);
		  $num_fields = mysql_num_fields($result);

		  $return.= 'DROP TABLE '.$table.';';
		  $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		  $return.= "\n\n".$row2[1].";\n\n";

		  for ($i = 0; $i < $num_fields; $i++) 
		  {
			  while($row = mysql_fetch_row($result))
			  {
				  $return.= 'INSERT INTO '.$table.' VALUES(';
				  for($j=0; $j<$num_fields; $j++) 
				  {
					  $row[$j] = addslashes($row[$j]);
					  #$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					  if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					  if ($j<($num_fields-1)) { $return.= ','; }
				  }
				  $return.= ");\n";
			  }
		  }
		  $return.="\n\n\n";
	  }

	  //save file
	  $handle = fopen('db-backup.sql','w+');
	  fwrite($handle,$return);
	  fclose($handle);
	}
	
function sql_import($file, $delimiter = ';'){
    set_time_limit(0);
    if (is_file($file) === true){
        $file = fopen($file, 'r');
        if (is_resource($file) === true){
            $query = array();
            while (feof($file) === false){
                $query[] = fgets($file);
                if (preg_match('~' . preg_quote($delimiter, '~') . '\s*$~iS', end($query)) === 1){
                    $query = trim(implode('', $query));
                    if (mysql_query($query) === false){
                        #echo '<h3>ERROR: ' . $query . '</h3>' . "\n";
						
					}
					else {
                        #echo '<h3>SUCCESS: ' . $query . '</h3>' . "\n";
                    }
                    while (ob_get_level() > 0){
                        ob_end_flush();
                    }
                    flush();
                }

                if (is_string($query) === true){
                    $query = array();
                }
            }
            return fclose($file);
        }
    }
    return false;
}