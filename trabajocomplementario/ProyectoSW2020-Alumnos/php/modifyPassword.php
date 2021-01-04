<?php  session_start();
if(isset($_SESSION['user'])){
    header("location:./Layout.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
	<h1>Recuperacion de contraseña</h1>
     <form action="" method="post">
        Introduce tu email:<input type="text" name="mail"><br>
        <input type="submit"  value="Enviar solicitud">
     </form>
     <?php 
    if(isset($_POST['mail'])){
        $email = $_POST['mail'];
        include "./DbConfig.php";
    	$mysqli = mysqli_connect("$server", "$user", "$pass", "$basededatos");
    	if (!$mysqli){
    		die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
    	}
    	$sql = "SELECT email FROM Usuarios WHERE email='$email'";
    	$resultado = mysqli_query($mysqli,$sql);
    	$row = mysqli_fetch_row($resultado);
    	if($row[0]==$email){
    	    $to = $email;
    	    $subject = "Recuperacion de contraseña";
    	    $codigo = rand(10000,99999);
    	    $_SESSION['code'] = $codigo;
    	    $_SESSION['email'] =  $email;
    	    $msg = "<html><head><title>Recuperacion de contraseña</title></head>
    	    <body><h3>Pasos de recuperacion:</h3><ol><li>entre al linl</li><li>rellena el formulario</li></ol>
    	    <h3>Link a la pagina:</h3>
    	    <h2><a href='http://swander.000webhostapp.com/trabajo_complementario/ProyectoSW2020-Alumnos/php/modifyPasswordDB.php?email={$email}'>aqui</a></h2>
    	    <h3>Codigo de recuperacion</h3><h2>{$codigo}</h2></body></html>";
    	    
    	    $headers = "MIME-Version: 1.0" . "\r\n";
    	    $headers.= "Content-type:text/html;charset=UTF-8" . "\r\n";
    	    mail($to,$subject,$msg,$headers);
    	    
    	    echo "Se ha enviado el correo de recuperacion";
    	}
    	else{
    	    echo "El mail no esta registrado";
    	} 
    }
   
     ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
