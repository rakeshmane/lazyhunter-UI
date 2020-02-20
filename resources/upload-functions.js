
function saveAsFile(){

	domain=top.document.getElementById("target").value
	if(domain.match('/(http:|https:)/'))
	{
		domain=domain.substr(domain.indexOf("://")+3)
		domain=domain.substr(0,domain.indexOf("/")-1)
	}

$.post( "saveAsFiles.php", { "domain": domain, "fileName": $("#file_name").val(), "data": $("#file_data").val() })
	  .done(function( resp ) {
		      console.log( "savedFile " + resp );
		    });

}


function listFiles()
{

//	debugger
	domain=top.document.getElementById("target").value
	if(domain.match('/(http:|https:)/'))
	{
		domain=domain.substr(domain.indexOf("://")+3)
		domain=domain.substr(0,domain.indexOf("/")-1)
	}


		$.get( "listFiles.php?dir="+domain, function( data ) {

				$("#files_list").html(data)
								
			}
		);

}


