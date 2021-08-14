<?php include("conexion.php");
	
	$id = $_POST['borrar'];


	$del=$con->prepare("DELETE FROM mensajes WHERE id = $id");
	$del->bind_param('i',$id);
    if($del->execute()){
    	echo "Registro borrado";
    	return header("Location: ./mensajes.php");

    }
    else{
    	echo "error";
    
	}








?>