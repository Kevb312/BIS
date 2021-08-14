<?php include("conexion.php");
	
	$id = $_POST['borrar'];


	$del=$con->prepare("DELETE FROM users WHERE id = $id");
	$del->bind_param('i',$id);
    if($del->execute()){
    	echo "Registro borrado";
    	return header("Location: ./usuarios.php");

    }
    else{
    	echo "error";
    
	}





$del->close();
$con->close();
                            


?>