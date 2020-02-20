<?php

$dir=$_GET['dir'];

$dir="uploads/".$dir;
if ($handle = opendir($dir)) {

	    while (false !== ($entry = readdir($handle))) {

	if ($entry != "." && $entry != "..") {		                echo "$entry\n"."<br>";
			}	        
	    }

	        closedir($handle);
	}

?>
