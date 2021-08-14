<?php
	include 'conexion.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sel = $con->prepare("SELECT *from users where email=?");
		$sel->bind_param('s', $email);
		$sel->execute();
		$res = $sel->get_result();
		$row = mysqli_num_rows($res);

		if ($row != 0) {
			while ($f = $res->fetch_assoc()) {
				if(password_verify($password, $f['password'])){
					if ($f['rol'] == "admin") {

						session_start();
						$_SESSION['rol'] = "admin";
						$_SESSION['usuario_nombre'] = $f['name'];
						header("Location: index.php");
					
					}
				}
				else{
					header("Location: login.php");
				}

			}
		}
	 else {
		header("Location: login.php");
		}
}	
?>