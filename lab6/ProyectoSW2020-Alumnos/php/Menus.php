<?php 
	if(isset($_GET['email'])){
		$email = $_GET['email'];
		include "./DbConfig.php";
		$mysqli = mysqli_connect("$server", "$user", "$pass", "$basededatos");
		if (!$mysqli){
			die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
		}
		$sql = "SELECT email FROM Usuarios WHERE email='$email'";
		$resultado = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_row($resultado);
		mysqli_close($mysqli);
		if ($row){ ?>
<div id='page-wrap'>
<header class='main' id='h1'>
  <span class="right" ><a href="./LogOut.php">Logout</a><?php echo $email?></span>

</header>
<nav class='main' id='n1' role='navigation'>
  <span><a href='Layout.php?email=<?php echo $email?>'>Inicio</a></span>
  <span><a href='ShowQuestions.php?email=<?php echo $email?>'> Ver Preguntas BD</a></span>
  <span><a href='HandlingQuizesAjax.php?email=<?php echo $email?>'> Preguntas</a></span>
  <span><a href='Credits.php?email=<?php echo $email?>'>Creditos</a></span>
</nav>
		<?php }
		else{?>
<div id='page-wrap'>
<header class='main' id='h1'>
  <span class="right"><a href="./SignUp.php">Registro</a></span>
  <span class="right"><a href="./LogIn.php">Login</a></span>
</header>
<nav class='main' id='n1' role='navigation'>
  <span><a href='Layout.php'>Inicio</a></span>
  <span><a href='Credits.php'>Creditos</a></span>
</nav>
<?php }
	}
	else{?>
<div id='page-wrap'>
<header class='main' id='h1'>
  <span class="right"><a href="./SignUp.php">Registro</a></span>
        <span class="right"><a href="./LogIn.php">Login</a></span>
        

</header>
<nav class='main' id='n1' role='navigation'>
  <span><a href='Layout.php'>Inicio</a></span>
  <span><a href='Credits.php'>Creditos</a></span>
</nav>


	<?php }?>


		
