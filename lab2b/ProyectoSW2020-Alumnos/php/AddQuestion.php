<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
<?php 
	include "./DbConfig.php";
	$mysqli = mysqli_connect("$server", "$user", "$pass", "$basededatos");
	if (!$mysqli){
		die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
	}
	$email = $_POST['email'];
	$enunciado = $_POST['enunciado'];
	$preguntac = $_POST['preguntac'];
	$preguntai1 = $_POST['preguntai1'];
	$preguntai2 = $_POST['preguntai2'];
	$preguntai3 = $_POST['preguntai3'];
	$complejidad = $_POST['complejidad'];
	$tema = $_POST['tema'];
	$sql = "insert into preguntas(email,enunciado,respuestac,respuestai1,respuestai2,respuestai3,complejidad,tema) values ('$email','$enunciado','$preguntac','$preguntai1','$preguntai2','$preguntai3',$complejidad,'$tema')";
	if (!mysqli_query($mysqli,$sql)){
		
		echo "<h1>SE HA PRODUCIDO UN ERROR AL INSERTAR LA PREGUNTA, PRUEBE MAS TARDE</h1>";
	}else{
		echo "<h1>PREGUNTA GUARDADA EN BD</h1>";
		echo "<a href='./ShowQuestions.php'>ver preguntas de la bd</a>";
	}
	
	// Cerrar conexión
	mysqli_close($mysqli);
	
?>
			

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
