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
	$alumnoPattern = "/\w+\d{3}\@ikasle\.ehu\.(eus|es)/";
	$profePattern = "/(\w+\.\w+|\w+)\@ehu\.(eus|es)/";
	if(empty($email) || empty($enunciado) || empty($preguntac) ||empty($preguntai1) ||empty($preguntai2) ||empty($preguntai3) ||empty($complejidad) ||empty($tema)){
	    echo "<h1>NO HAS INTRODUCIDO TODOS LOS DATOS NECESARIOS</h1>";
	}

	elseif(preg_match($alumnoPattern, $email)==0 && preg_match($profePattern, $email)==0){
	    echo "<h1>EMAIL INCORRECTO</h1>";
	}
	else{
    	$sql = "insert into preguntas(email,enunciado,respuestac,respuestai1,respuestai2,respuestai3,complejidad,tema) values ('$email','$enunciado','$preguntac','$preguntai1','$preguntai2','$preguntai3',$complejidad,'$tema')";
    	if (!mysqli_query($mysqli,$sql)){
    		
    		echo "<h1>SE HA PRODUCIDO UN ERROR AL INSERTAR LA PREGUNTA, PRUEBE MAS TARDE</h1>";
    	}else{
    		echo "<h1>PREGUNTA GUARDADA EN BD</h1>";
    		$email = $_GET['email'];
    		echo "<a href='./ShowQuestions.php?email=$email'>ver preguntas de la bd</a>";
    	}
	}
	mysqli_close($mysqli);
	
?>
			

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
