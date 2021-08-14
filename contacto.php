<?php
include "admin/conexion.php";

$recaptcha = $_POST["g-recaptcha-response"];
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
 'secret' => '6Le5mPEbAAAAAMMz-AZDjMtGGwhsLTD2aqg_MTLf',
 'response' => $recaptcha
 );

$options = array(
 'http' => array (
 'method' => 'POST',
 'content' => http_build_query($data)
 )
 );
$context = stream_context_create($options);
$verify = file_get_contents($url, false, $context);
$captcha_success = json_decode($verify);

if ($captcha_success->success) {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$tel = $_POST['tel'];
		$mensaje = $_POST['mensaje'];
		
	    $ins=$con->prepare("INSERT INTO mensajes(id,nombre,email,numeroTelefono,mensaje) VALUES(?,?,?,?,?)");
	    $ins->bind_param("issss",$id,$name,$email,$tel, $mensaje);
	    if($ins->execute()){
	    	echo "usuario creado";
	    	header("Location: index.php");

	    }
	    else{
	    	echo "error";
	    

	}
	
}
} else {
 	exit("Lo siento, parece que eres un robot");
 	header("Location: index.php");
}




?>