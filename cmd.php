



<?php

error_reporting(E_ALL); ini_set('display_errors', '1');


require_once __DIR__.'/ansi-to-html/vendor/autoload.php';
use SensioLabs\AnsiConverter\AnsiToHtmlConverter;



$converter = new AnsiToHtmlConverter();




function Erasing_ANSI($line){ //http://wiki.bash-hackers.org/scripting/terminalcodes

	if(strpos($line,"\x1b[K")!==false) //erase whole line
		{
			$line="";
			//echo "[K Found";
		}
	else if(strpos($line,"\x1b[0K")!==false) //erase whole line
	{
		$line="";
		//echo "[0K Found";
	}
	else if(strpos($line,"\x1b[1K")!==false) //
	{
		$line=substr($line,strripos($line,"\x1b[1K"),strlen($line)); 
		// Hack, removes all chars till "\x1b[1k" assumming anything before that is not meant to be displayed and anything after that would be displayed obviously. Might create problems in future. *WARNING*

		//echo "[1K Found => ".$line;
		//$line=str_replace($line, "\x1b[1K", "");

	}
	else if(strpos($line,"\x1b[2K")!==false) //
	{
		$line="";
		//echo "[2K Found";
	}
	else
		$line=$line;
	return $line;
}


$cmd=$_REQUEST['cmd'];

$filename=md5($_REQUEST['tool_name'].$_REQUEST['target']).".txt"; // md5 hash the command and use it as filename

//echo "<br><br>Logging into file : ".$filename."<br>________________________________________________________<br><br>";

$cmd="./suid '$cmd' 2>&1";

$links_array = explode("\n", file_get_contents('./config/web_links.txt'));
foreach($links_array as $links){
	
	//echo $links;
	//echo trim(explode(":",$links,2)[1]);
	//exit();
	if(strtolower(trim(explode(":",$links,2)[0]))==strtolower(trim($_REQUEST['tool_name'])))
	{	
		//echo "Successs";

		//exit();
		$redirect_url=trim(explode(":",$links,2)[1]);
		exec($cmd);
		echo "<script>location.href='".$redirect_url."';</script>";
		//header("location :".$redirect_url);
			exit();
	}
}

/*$tmp_f=fopen("./config/web_links.txt");
$web_tools=$fread($tmp_f,"r")
 */
echo '<pre style="background-color: black; overflow: auto; padding: 10px 15px; font-family: monospace;"><font size=3>';

		$myfile = fopen("/TOWF/logs/".$filename, "w");

		while (@ ob_end_flush()); // end all output buffers if any


		$proc = popen($cmd, 'r');

		$command_indicate="Command : $cmd \n_____________________________________________________________________________________________________________________________\n\n";
		echo "<font color=white>".$command_indicate."</font>";
		fwrite($myfile, $command_indicate);

		while (!feof($proc))
		{
		    $data=fgets($proc); // Do not change it, Erasing_ANSI expects line by line output. Changing this line would break Erasing_ANSI function.

		    $data=Erasing_ANSI($data);
		    echo $converter->convert($data);
		    fwrite($myfile, $data);
		    @flush();
		}
		fclose($myfile);
		echo '</pre>';
	

?>
