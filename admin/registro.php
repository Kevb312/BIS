<!DOCTYPE html>
<html>
<head>
	<title>BIS - REGISTRO</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background-color: #e9edf0">

	<div class="container" style="padding-top: 15rem; width: 30rem">
		<div class="jumbotron" style="background-color: white;">
			<div class="text-center">
				<h4>REGISTRO BIS SISTEMAS</h4>
			</div>

			<form action="registroUser.php" method="post">

				<div class="form-floating mb-3">
					<label for="inputEmail">Name</label>

                    <input class="form-control" id="user" type="text" placeholder="Name user" required name="user"> 
                    
                </div>

				<div class="form-floating mb-3">
					<label for="inputEmail">Email</label>

                    <input class="form-control" id="email" type="email" placeholder="name@example.com" required name="email"> 
                    
                </div>
				<div class="form-floating mb-3">
					<label for="inputName">Password</label>
                    <input type="password" class="form-control" id="password" type="text" placeholder="Enter your password..." required name="password">
                    
                </div>
                
                <div class="d-grid"><button class="btn btn-primary btn-xl" type="submit">Registrar</button></div>

                <div >
                	<a href="login.php">Ya tengo cuenta</a>
                </div>
			</form>
		</div>
	</div>




	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>