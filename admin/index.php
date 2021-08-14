<?php
session_start();
	if (!isset($_SESSION['rol']) && !isset($_SESSION['usuario_nombre'])) {
		header('Location: login.php');
	}
	else {
	if($_SESSION['rol']=="admin"){
		

	
	?>



<!DOCTYPE html>
<html>
<head>
	<title>Adminstración - BIS</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<!-- Core theme CSS (includes Bootstrap)-->
	<link href="css/styles.css" rel="stylesheet" />

</head>
<body>
	<?php include("inc/nav.php");  ?>

	<div class="container">
		<div class="col">
			<div class="row">
					<h1>Panel de administración</h1>
					<?php echo "Bienvenido {$_SESSION['usuario_nombre']}"; ?>
			</div>
		</div>
	</div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

</body>
</html>


<?php
}
else{
	header('Location: login.php');
	}
}
?>