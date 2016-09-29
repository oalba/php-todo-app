$(document).ready(function(){
	var url="inc/index2an.php";
	//var url="index2an.php";
	$("#cuerpo").html("");
	$.getJSON(url,function(listas){
		$.each(listas, function(i,lista){
			var newRow =
			"<form enctype='multipart/form-data' action='inc/check_tarea.php?cod_lista="+lista.cod_lista+"' method='post'>"
			+"<table border=1><tr><th colspan=4>NOMBRE</th></tr>"
			+"<tr><td><button><a href='inc/delete_lists.php?cod_lista="+lista.cod_lista+"' style=\"text-decoration:none\">Eliminar</a></button></td>"
			+"<td><button><a href='inc/archivar_lista.php?cod_lista="+lista.cod_lista+"' style=\"text-decoration:none\">Archivar</a></button></td>"
			//+"<td><button><a href='editar_lista.php?cod_lista="+lista.cod_lista+"' style=\"text-decoration:none\">Editar</a></button></td>"
			+"<td><button onClick='editarl(\'"+lista.cod_lista+"\')' style=\"text-decoration:none\">Editar</button></td>"
			+"<td>"+lista.list_name+"</td></tr>"
			+"<tr><th colspan=4>TAREAS</th></tr>";
			for (var e = 0; e < lista.tareas.length; e++){
				if (lista.tareas[e].cod_lista == lista.cod_lista){
					if (lista.tareas[e].status == "correcto"){
						newRow = newRow +
						"<tr>"
						//+"<td>"+lista.tareas[e].cod_tarea+"</td>"
						+"<td><button><a href='inc/del_tarea.php?cod_lista="+lista.cod_lista+"&cod_tarea="+lista.tareas[e].cod_tarea+"' style=\"text-decoration:none\">Eliminar</a></button></td>"
						+"<td><input type='checkbox' name='check[]' value='"+lista.tareas[e].cod_tarea+"'/></td>"
						+"<td colspan=2>"+lista.tareas[e].descripcion+"</td>"
						+"</tr>";
					}
					
				}
				
			}
			for (var o = 0; o < lista.tareas.length; o++){
				if (lista.tareas[o].cod_lista == lista.cod_lista){
					if (lista.tareas[o].status == "checked"){
						newRow = newRow +
						"<tr>"
						//+"<td>"+lista.tareas[o].cod_tarea+"</td>"
						+"<td><button><a href='inc/del_tarea.php?cod_lista="+lista.cod_lista+"&cod_tarea="+lista.tareas[o].cod_tarea+"' style=\"text-decoration:none\">Eliminar</a></button></td>"
						+"<td><input type='checkbox' name='check[]' value='"+lista.tareas[o].cod_tarea+"' checked/></td>"
						+"<td colspan=2><s>"+lista.tareas[o].descripcion+"</s></td>"
						+"</tr>";
					}
					
				}
				
			}
			newRow = newRow + "<tr><td colspan=4><input type='submit' name='guardar' value='Guardar'/></td></tr>"
			//+"<tr><form enctype='multipart/form-data' action='inc/add_tarea.php?cod_lista="+lista.cod_lista+"' method='post'><td colspan=2><input type='text' name='tarea'/></td><td><input type='submit' name='anadir' value='Añadir'/></td></form></tr>"
			+"</table></form><br/><br/>";
			$(newRow).appendTo("#cuerpo");
		});
	});
	/*$.getJSON(url,function(users){
		$.each(users, function(i,user){
			var newRow2 =
			"<p>"+user.cod_user+"</p><p>"+user.cod_user+"</p>";
			$(newRow2).appendTo("#cuerpo");
		});
	});*/
});
//dataJS[0].comments[0].created_at


$(document).ready(function(){
	var url="inc/archivadas.php";
	//var url="index2an.php";
	$("#archivadas").html("");
	$.getJSON(url,function(listas){
		$.each(listas, function(i,lista){
			var newRow =
			"<table border=1><tr><th colspan=3>NOMBRE</th></tr>"
			+"<tr><td><button><a href='inc/delete_lists.php?cod_lista="+lista.cod_lista+"' style=\"text-decoration:none\">Eliminar</a></button></td>"
			+"<td><button><a href='inc/restaurar_lista.php?cod_lista="+lista.cod_lista+"' style=\"text-decoration:none\">Restaurar</a></button></td>"
			+"<td>"+lista.list_name+"</td></tr>"
			+"<tr><th colspan=3>TAREAS</th></tr>";
			for (var e = 0; e < lista.tareas.length; e++){
				if (lista.tareas[e].cod_lista == lista.cod_lista){
					if (lista.tareas[e].status == "correcto"){
						newRow = newRow +
						"<tr>"
						//+"<td>"+lista.tareas[e].cod_tarea+"</td>"
						+"<td colspan=3>"+lista.tareas[e].descripcion+"</td>"
						+"</tr>";
					}
					
				}
				
			}
			for (var o = 0; o < lista.tareas.length; o++){
				if (lista.tareas[o].cod_lista == lista.cod_lista){
					if (lista.tareas[o].status == "checked"){
						newRow = newRow +
						"<tr>"
						//+"<td>"+lista.tareas[o].cod_tarea+"</td>"
						+"<td colspan=3><s>"+lista.tareas[o].descripcion+"</s></td>"
						+"</tr>";
					}
					
				}
				
			}
			newRow = newRow +"</table><br/><br/>";
			$(newRow).appendTo("#archivadas");
		});
	});
});




function editarl(cod_lista){

    $.ajax({
            type: "POST",
            url: 'inc/editar_lista.php',
            //dataType: "json",
           //dataType: "html",
           data:{'cod_lista': cod_lista},
            success: function(response) {
              console.log(response);
            },
            error: function(response) {
              console.log(response);
            }
        });
        
        location.href = "editar_lista.html";
}


$(document).ready(function(){
	var url="inc/editar_lista.php";
	//var url="index2an.php";
	$("#editar").html("");
            $.getJSON(url,function(listas){
				$.each(listas, function(i,lista){
					var newRow =
					"<table border=1><tr><th colspan=3>NOMBRE</th></tr>"
					+"<tr><td><button><a href='inc/delete_lists.php?cod_lista="+lista.cod_lista+"' style=\"text-decoration:none\">Eliminar</a></button></td>"
					+"<td><button><a href='inc/restaurar_lista.php?cod_lista="+lista.cod_lista+"' style=\"text-decoration:none\">Restaurar</a></button></td>"
					+"<td>"+lista.list_name+"</td></tr>"
					+"<tr><th colspan=3>TAREAS</th></tr>";
					for (var e = 0; e < lista.tareas.length; e++){
						if (lista.tareas[e].cod_lista == lista.cod_lista){
							if (lista.tareas[e].status == "correcto"){
								newRow = newRow +
								"<tr>"
								//+"<td>"+lista.tareas[e].cod_tarea+"</td>"
								+"<td colspan=3>"+lista.tareas[e].descripcion+"</td>"
								+"</tr>";
							}
							
						}
						
					}
					for (var o = 0; o < lista.tareas.length; o++){
						if (lista.tareas[o].cod_lista == lista.cod_lista){
							if (lista.tareas[o].status == "checked"){
								newRow = newRow +
								"<tr>"
								//+"<td>"+lista.tareas[o].cod_tarea+"</td>"
								+"<td colspan=3><s>"+lista.tareas[o].descripcion+"</s></td>"
								+"</tr>";
							}
							
						}
						
					}
					newRow = newRow +"</table><br/><br/>";
					$(newRow).appendTo("#editar");
				});
			});

        });
