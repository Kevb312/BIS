<?php include("conexion.php");

$id = $_POST['idUser'];
$name = $_POST['name'];
$email = $_POST['email'];
$rol = $_POST['rol'];


	$upd=$con->prepare("UPDATE users SET id = ?, name = ?, email = ?, rol = ? WHERE id = ?");
	$upd->bind_param('isssi',$id,$name,$email,$rol,$id);
    if($upd->execute()){
    	echo "Registro actualizado";
    	return header("Location: ./usuarios.php");

    }
    else{
    	echo "error";
    
	}





$upd->close();
$con->close();


?>