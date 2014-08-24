<?php
   $directory = 'slider_kep';
   $scanned_directory = array_diff(scandir($directory), array('..', '.'));
   foreach ($scanned_directory as $key => $value){
		 $slides .= '<li>'
				 . '<div class="slide">'
				 . '<img src="/'.MAIN_DIRECTORY.'slider_kep/'.$value.'" alt="" />'
				 . '</div>'
				 . '</li>';
   }

$slider =	'<div id="x"><div id="slider_frame">	   
			   <ul id="slider">
			   '.$slides.'
			   </ul>
			   </div>
			</div>';