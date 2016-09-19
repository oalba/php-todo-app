function seguroList(cod_lista,list_name){
var confirmar=confirm("¿Estás seguro de que quieres eliminar la lista \"" + list_name + "\"?"); 
    if (confirmar) {
        // si pulsamos en aceptar
        alert('La lista será eliminada.');
        window.location.assign("'inc/delete_lists.php?cod_lista='+cod_lista");
        return true;
    }else{ 
        // si pulsamos en cancelar
        return false;
    }           
}