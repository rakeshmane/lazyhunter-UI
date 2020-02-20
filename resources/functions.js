		var tool_name=""
		var cmd_name=""

function updateSelectedTool(tool_name){ // Updates the selected tool and displays
			console.log(tool_name)
			document.getElementById("selected_tool").innerText=tool_name
			this.tool_name=tool_name
			getDefaultCommand(tool_name)
			updateProgress()
		}

function updateCommand(){ // Updates command in input box

			if($( "#target" ).val().length>1)
			 	$( "#default_cmd" ).val( cmd_name.replace("$host",$( "#target" ).val()) ); //alert( "Load was performed." );
			else 
			 	alert("Target Not Set.")	

}


function updateProgress() { // Fetches command output from file and displays
			document.getElementById('response_frame').src = "progress.php?filename="+md5(tool_name+$( "#target" ).val())+".txt";

			/*$.get( "progress.php?filename="+md5(tool_name+$( "#target" ).val())+".txt", function( data ) {
				document.getElementById('response_frame').src = "data:text/html,"+data
			});*/

			updateCommand()

		}


function getDefaultCommand(tool_name){ // returns default command of specified tool
			$.get( "config/default_commands.txt", function( data ) {
				if(data.indexOf(tool_name.toLowerCase())>=1){
					cmd_name=data.substring(data.indexOf("#"+tool_name.toLowerCase())+1+tool_name.length+1,data.indexOf(tool_name.toLowerCase()+"#"));
					updateCommand()
				}
			 	else{
			 		$("#default_cmd" ).val( "" );
			 		alert("Unknown Tool Name.")
			 	} 
			});
		}

function showtools(category){ // adds tools to DOM
				$.get( "config/"+category+".txt", function( data ) {
					final_data=""
					category_array=data.split("\n")
					for(i=0;i<category_array.length;i++)
					{
						if(i==0)
						{
							 final_data="<li>";
						}
						//<a href="#" onclick=updateSelectedTool("CTFR")>CTFR</a>
						if(category_array[i].length>0 )
						{
							final_data=final_data+"<a href='#' onclick=updateSelectedTool('"+category_array[i]+"');updateInfo()>"+category_array[i]+"</a>";
						}
					/*	else if (category=="web") // Commented bcz we don't need this hack anymore, we have added way to change iframe href directly.
						{
							final_data=final_data+category_array[i]
						
						} */

					}
					final_data=final_data+"</li>"

					$("#tools").html(final_data);

			});
			}

function addSections(){ //Adds tools sections to DOM
					$.get( "config/sections.txt", function( data ) {
					final_data=""
					sections_array=data.split("\n")
					for(i=0;i<sections_array.length;i++)
					{
						if(i==0)
						{
							 final_data="<ul><li>";
						}
						if(sections_array[i].length>0){
							tmp=[sections_array[i].slice(0,sections_array[i].indexOf(":")),sections_array[i].slice(sections_array[i].indexOf(":")+1,sections_array[i].length)]
							final_data=final_data+"<a href='#' onclick=showtools('"+tmp[0]+"')>"+tmp[1]+"</a>";
						}
					}
					final_data=final_data+"</ul></li>"

					$("#sections").html(final_data);

					});
}


function updateInfo()
{
	
	document.getElementById('options_frame').contentWindow.listFiles()
	$("#info").html("");

					$.get( "config/info.txt", function( data ) {
					final_data=""
					info_array=data.split("\n")
					for(i=0;i<info_array.length;i++)
					{
						//if(i==0)
						//{
						//	 final_data="<ul><li>";
						//}

						if(info_array[i].length>0){
							tmp=[info_array[i].slice(0,info_array[i].indexOf(":")),info_array[i].slice(info_array[i].indexOf(":")+1,info_array[i].length)]
							if(tmp[0]==tool_name){
								$("#info").html("<font color=blue size=2>"+tmp[0]+" : "+tmp[1]+"</font>");
								continue
							}
						}
					}


					

					});


}
