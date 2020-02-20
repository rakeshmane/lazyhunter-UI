<?php

require_once __DIR__.'/ansi-to-html/vendor/autoload.php';
use SensioLabs\AnsiConverter\AnsiToHtmlConverter;

$converter = new AnsiToHtmlConverter();


$filename="/TOWF/logs/".$_REQUEST['filename'];

while (@ ob_end_flush()); // end all output buffers if any

echo '<pre style="background-color: black; overflow: auto; padding: 10px 15px; font-family: monospace;"><font size=3>';

echo $converter->convert(file_get_contents($filename))."</pre>";
?>
