	
	<nav class="navbar navbar-expand-lg navbar-light navbar-dark" style="padding-bottom: 2rem; background-color: #16a085; ">
	  <a class="navbar-brand" href="index.php">BIS sistemas y negocios</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse " id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto ">
	      <li class="nav-item">
	        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="./usuarios.php">Usuarios</a>
	      </li>
  	      <li class="nav-item">
	        <a class="nav-link" href="./mensajes.php">Mensajes</a>
	      </li>
	      <li class="nav-item dropdown ">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <?php echo $_SESSION['usuario_nombre']?>
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Perfil</a>
	          <a class="dropdown-item" href="#">Configuración</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesión</a>
	        </div>
	      </li>
	    </ul>
	  </div>
	</nav>