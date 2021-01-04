<?php session_start();?>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
	<h1>INICIO</h1>
	<form id='fquestion' name='fquestion' action="" method="post">
		Email*:<input type="text" name="email" id="email"><br>
		Password*:<input type="password" name="password" id="password"><br>
		<input type="submit" value="Registrarse" id="registrarse">
		<?php
		if(isset($_POST['email']) && isset($_POST['password'])){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$password = crypt($password, '$email');
			
			include "./DbConfig.php";
			$mysqli = mysqli_connect("$server", "$user", "$pass", "$basededatos");
			if (!$mysqli){
				die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
			}
			$sql = "SELECT email,password,estado FROM Usuarios WHERE email='$email' and password='$password'";
			$resultado = mysqli_query($mysqli,$sql);
			$row = mysqli_fetch_row($resultado);
			if (!$row || $row[2]=="bloqueado"){
				echo "<h1>Parametros de login incorrectos o usuario bloqueado.Contacte con el admin</h1>";
			}else{
			    $_SESSION['user']=$email;
				$message = "Se ha iniciado correctamente";
				echo "<script>alert('$message');</script>";
				echo "<script type='text/javascript'>window.location.href = 'Layout.php';</script>";
				exit();
				
				
				
			}
			mysqli_close($mysqli);
		}
			
		
		?>
	</form>
	
	</div>
  </section>
  <?php include '../html/Footer.html' ?>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/ValidateSignUp.js"></script>
</body>
</html>
