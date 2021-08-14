<?php
	include 'conexion.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$user = $_POST['user'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$rol = "admin";

		$pass_cifrado = password_hash($password, PASSWORD_DEFAULT);

		$sel = $con->prepare("SELECT * from users where email=? and name=?");
		$sel->bind_param('ss', $email, $user);
		$sel->execute();
		$res = $sel->get_result();
		$row = mysqli_num_rows($res);

		if ($row != 0) {
			while ($f = $res->fetch_assoc()) {
				echo "El usuario {$f['name']} ya existe";
			}
		} else {
		#echo "$user $email $pass_cifrado";
		
		    $ins=$con->prepare("INSERT INTO users(id,name,email,password,rol) VALUES(?,?,?,?,?)");
		    $ins->bind_param("issss",$id,$user,$email,$pass_cifrado, $rol);
		    if($ins->execute()){
		    	echo "usuario creado";
		    	header("Location: login.php");

		    }
		    else{
		    	echo "error";
		    

		}
	}
}
?>