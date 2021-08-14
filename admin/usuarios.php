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
		$sel = $con->prepare("SELECT * from users");
		$sel->execute();
		$res = $sel->get_result();
		$row = mysqli_num_rows($res);

		
				?>
			
	<div class="container">
		<div class="col">
			<div class="row">
					<h3>Gestión de usuarios</h3><br>
				

					<table class="table table-striped table-bordered " id="example">
					  <thead>
					    <tr>
					      <th scope="col">Id</th>
					      <th scope="col">Nombre</th>
					      <th scope="col">Email</th>
					      <th scope="col">Rol</th>
					      <th scope="col">Acciones</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
					  	if ($row != 0) {
							while ($f = $res->fetch_assoc()) {?>
					    <tr>
					      <td><?php echo $f['id']; ?></td>
					      <td><?php echo $f['name']; ?></td>
					      <td><?php echo $f['email']; ?></td>
					      <td><?php echo $f['rol']; ?></td>
  					      <td> 
				      		<form action="borrarUsuario.php" method="post">
				      			<input type="hidden" name="borrar" id="borrar" value="<?php echo $f['id']; ?>" >
					      		<button type="submit" class="btn btn-danger"  >Borrar</button>
				     	 	</form>

				     	 	<br>
				     	 	<a data-toggle="modal" data-target="#modalEditar<?php echo $f['id']; ?>">
				      			
					      		<button class="btn btn-warning" >Editar</button>
					      	</a>

				      		<!-- modals -->
							<!-- modal editar -->
						    <div class="modal fade" id="modalEditar<?php echo $f['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLongTitle">Editar usuario</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      	<form action="editarUsuario.php" method="post">
							      		<div class="form-group mb-3">
							      			
							      			<input type="hidden" name="idUser" id="idUser" value="<?php echo $f['id']; ?>" >
						      			</div>

							      		<div class="form-group mb-3">
							      			<label for="name">Nombre</label><br>
							      			<input type="text" name="name"  value="<?php echo $f['name']; ?>" class="form-control"  placeholder="Name user" required>
						      			</div>

						      			<div class="form-group mb-3">
							      			<label for="name">Email</label><br>
							      			<input type="text" name="email"  value="<?php echo $f['email']; ?>" class="form-control" placeholder="name@example.com" required>
						      			</div>

						      			<div class="form-group mb-3">
							      			<label for="name">Rol</label><br>
							      			<input type="text" name="rol"  value="<?php echo $f['rol']; ?>" class="form-control" required>
						      			</div>

						      			<div class="form-floating mb-3">
			                            <button class="btn btn-warning " type="submit"  name="guardar" id="guardar" btn-xl 
			                                    
			                                >Guardar</button>
			                            </div>
							        </form>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
							        
							      </div>
							    </div>
							  </div>
							</div>

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

					<a data-toggle="modal" data-target="#modalNuevo">
						<button type="button" class="btn btn-success">
							Nuevo
						</button>
					</a>
			</div>
		</div>
	</div>


<!-- modal nuevo usuario -->

	<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo usuario</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<form action="registroUser.php" method="post">
	      		<div class="form-group mb-3">
	      			
	      			<input type="hidden" name="idUser" id="idUser" value="<?php echo $f['id']; ?>" >
	  			</div>

	      		<div class="form-group mb-3">
	      			<label for="name">Nombre</label><br>
	      			<input class="form-control" id="user" type="text" placeholder="Name user" required name="user">
	  			</div>

	  			<div class="form-group mb-3">
	      			<label for="name">Email</label><br>
	      			<input class="form-control" id="email" type="email" placeholder="name@example.com" required name="email">
	  			</div>

	  			<div class="form-group mb-3">
	      			<label for="inputName">Password</label>
                    <input type="password" class="form-control" id="password" type="text" placeholder="Enter your password..." required name="password">
	  			</div>

	  			<div class="form-floating mb-3">
	            <div class="d-grid"><button class="btn btn-primary btn-xl" type="submit">Registrar</button></div>
	            </div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
	        
	      </div>
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