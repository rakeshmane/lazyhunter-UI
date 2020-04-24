<html>
<script src="resources/jquery.min.js"></script>
<link rel="stylesheet" href="resources/styles.css">
<script src="resources/md5.min.js"></script>
<script src="resources/functions.js"></script>
<title>LazyHunter</title>

<body onload="addSections()">
<center>
	_______________________________________________
<br>
<font size=5 color=black>|  LazyHunter  |</font>
<br>
|_______________________________________________|
<br>

	<font color=green size=6><div id=selected_tool></div></font>
<br>
	Target : <input id=target type="" name="target" style="width: 300px; padding: 2px; border: 1px solid black" onchange="updateCommand()"><br><br>





  <font color=red size=4>TODO : gitleaks</font>
<div id=sections>

</div>


<div id=tools>


</div>

<br>
<div id=controls>
	<input type=submit value=Start onclick="document.getElementById('response_frame').src ='cmd.php?cmd='+$('#default_cmd').val()+'&tool_name='+tool_name+'&target='+$('#target' ).val()">

	<input type=submit value="Check Progress" onclick="updateProgress()">

	<br><br><input type=text id="default_cmd" name=cmd placeholder="Current Command" style="width: 600px; padding: 2px; border: 1px solid black">
</div>
<br>
<div id=info>

</div>

<br>
<div id=response>

	<iframe  style="padding: 2px; border: 1px solid black" src="" id=response_frame height=700 width=1000></iframe><br><br>
	
<br>
---------------------------------------
<br> 
<!-- todo, it's incomplete feature : <iframe  style="padding: 2px; border: 1px solid black" src="upload.html" id=options_frame height=600 width=1000></iframe> --> <br><br>
	<font color=green>Developed by Rakesh Mane (@RakeshMane10)</font>
</div>


</body>

</html>
