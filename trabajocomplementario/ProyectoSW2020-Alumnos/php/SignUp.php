<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
	<h1>REGISTRO</h1>
	<form id='fquestion' name='fquestion' action="" method="post" enctype="multipart/form-data">
		<label for="male">Profesor</label>
		<input type="radio" id="profesor" name="tipo" value="Profesor" checked>
		<label for="male">Alumno</label>
		<input type="radio" id="alumno" name="tipo" value="Alumno"><br>
		Email*:<input type="text" name="email" id="email" onfocusout="isVip()"><br>
		<div id="vip"></div>
		Nombre y Apellidos*:<input type="text" name="nombreapellido" id="nombreapellido"><br>
		Password*:<input type="password" name="password" id="password" onfocusout="isValid()"><br>
		<div id="valid"></div>
		Repetir Password*:<input type="password" name="reppassword" id="reppassword"><br>
		<input type="file" name="image"><br>
		<input type="submit" value="Registrarse" id="registrarse" onclick="start()" disabled>
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
			$password = crypt($password, '$email');
			//$imgData = 0;
			if (is_uploaded_file($_FILES['image']['tmp_name'])) {
			    	$imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			    	//echo $imgData;
			}
			
			$sql = "insert into Usuarios(email,password,nombreapellido,foto) values ('$email','$password','$nombreapellido', '{$imgData}')";
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
  <script>
	function isVip() {
	
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
	{document.getElementById("vip").innerHTML=xmlhttp.responseText; 
	    canregister();
	}
	}
	email = document.getElementById("email").value;
	xmlhttp.open("GET","./ClientVerifyEnrollment.php?email="+email,true);
	xmlhttp.send();
	
	}
	</script>
    <script>
	function isValid() {
	var password = $('#password').val();
	if(password!=""){
	$.ajax({
    type:"POST", // la variable type guarda el tipo de la peticion GET,POST,..
    url:"../php/validatepassword.php", //url guarda la ruta hacia donde se hace la peticion
    data:{"passw": password}, // data recive un objeto con la informacion que se enviara al servidor
    success:function(datos){ //success es una funcion que se utiliza si el servidor retorna informacion
        $("#valid").html(datos);
        canregister();
     },
    dataType: 'html' // El tipo de datos esperados del servidor. Valor predeterminado: Intelligent Guess (xml, json, script, text, html).
});

}
	
	}
</script>
<script>
function canregister(){
    var vip=document.getElementById('vip').innerHTML;
    var valid=document.getElementById('valid').innerHTML;
    setTimeout(function(){ 
        if(vip=="SI ES VIP" && valid=="LA CONTRASEÑA ES VALIDA"){
        document.getElementById("registrarse").disabled = false;
        }
        else{
        document.getElementById("registrarse").disabled = true;
        } 
    
    }, 100);
    
    
}
</script>
</body>
</html>
