<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
	<h1>REGISTRO</h1>
	<form id='fquestion' name='fquestion' action="" method="post">
		<label for="male">Profesor</label>
		<input type="radio" id="profesor" name="tipo" value="Profesor" checked>
		<label for="male">Alumno</label>
		<input type="radio" id="alumno" name="tipo" value="Alumno"><br>
		Email*:<input type="text" name="email" id="email"><br>
		Nombre y Apellidos*:<input type="text" name="nombreapellido" id="nombreapellido"><br>
		Password*:<input type="password" name="password" id="password"><br>
		Repetir Password*:<input type="password" name="reppassword" id="reppassword"><br>
		<input type="submit" value="Registrarse" id="registrarse" onclick="start()">
	</form>
	<?php 
	if(isset($_POST['password']) && isset($_POST['reppassword'])){
		$password = $_POST['password'];
		$reppassword = $_POST['reppassword'];
		if(empty($password) || strlen($password)<6){
			echo "<h1>Las contraseñas son inferiores a 6 digitos</h1>";
		}
		elseif($password!=$reppassword){
			echo "<h1>Las contraseñas no coinciden</h1>";
		}else{
			include "./DbConfig.php";
			$mysqli = mysqli_connect("$server", "$user", "$pass", "$basededatos");
			if (!$mysqli){
				die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
			}
			$email = $_POST['email'];
			$nombreapellido = $_POST['nombreapellido'];
			$sql = "insert into Usuarios(email,password,nombreapellido) values ('$email','$password','$nombreapellido')";
			if (!mysqli_query($mysqli,$sql)){
				echo "<h1>SE HA PRODUCIDO UN ERROR AL REGISTRARSE, PRUEBE MAS TARDE</h1>";
			}else{
				$message = "Se ha registrado correctamente";
				echo "<script>alert('$message');</script>";
				
			}
			mysqli_close($mysqli);
		}
	}
	
	?>
	</div>
  </section>
  <?php include '../html/Footer.html' ?>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/ValidateSignUp.js"></script>
</body>
</html>
