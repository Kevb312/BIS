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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- Core theme CSS (includes Bootstrap)-->
	<link href="css/styles.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>


</head>
<body>
	<?php include("inc/nav.php");  ?>
	<?php include("conexion.php");
		$sel = $con->prepare("SELECT * from mensajes");
		$sel->execute();
		$res = $sel->get_result();
		$row = mysqli_num_rows($res);

		
				?>
			
	<div class="container">
		<div class="col">
			<div class="row">
					<h3>Listado de mensajes envíados desde el formulario contacto</h3>
					<table class="table table-striped table-bordered " id="example">
					  <thead>
					    <tr>
					      <th scope="col">Id</th>
					      <th scope="col">Nombre</th>
					      <th scope="col">Email</th>
					      <th scope="col">Número</th>
					      <th scope="col">Mensaje</th>
					      <th scope="col">Acciones</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
					  	if ($row != 0) {
							while ($f = $res->fetch_assoc()) {?>
					    <tr>
					      <td><?php echo $f['id']; ?></td>
					      <td><?php echo $f['nombre']; ?></td>
					      <td><?php echo $f['email']; ?></td>
					      <td><?php echo $f['numeroTelefono']; ?></td>
					      <td><?php echo $f['mensaje']; ?></td>
					      <td> 
					      		<form action="borrar.php" method="post">
					      			<input type="hidden" name="borrar" id="borrar" value="<?php echo $f['id']; ?>" >
						      		<button type="submit" class="btn btn-danger"  >Borrar</button>
					     	 	</form>
					      </td>

					    </tr>
					    	<?php
							}
							$sel->close();
                        $con->close();
							}
						?>
					  </tbody>
					</table>
			</div>
		</div>
	</div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>

    <script type="text/javascript">
    	$(document).ready(function() {
    $('#example').DataTable();
		} );
    </script>

</body>
</html>


<?php
	}
	else{
		header('Location: login.php');
		}
}
?>