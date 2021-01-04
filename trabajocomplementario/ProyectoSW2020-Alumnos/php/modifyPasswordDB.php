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
        Introduce tu email:<input type="text" name="mail" value="<?php echo $_GET['email']?>"><br>
        Contraseña:<input type="password" name="password"><br>
        Repetir Contraseña:<input type="password" name="reppassword"><br>
        Codigo :<input type="number" name="codigo"><br>
        <input type="submit"  value="Enviar solicitud">
     </form>
<?php 
if(isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['reppassword']) && isset($_POST['codigo'])){
        $email = $_POST['mail'];
        $password = $_POST['password'];
        $reppassword = $_POST['reppassword'];
        $codigo = $_POST['codigo'];
        if($password != $reppassword){
            echo "Las contraseñas no coinciden";
        }
        else if($codigo != $_SESSION['code'] || $email!= $_SESSION['email']){
            echo "Codigo o email invalido";
        }
        else{
            include "./DbConfig.php";
        	$mysqli = mysqli_connect("$server", "$user", "$pass", "$basededatos");
        	if (!$mysqli){
        		die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
        	}
        	$password = crypt($password, '$email');
        	
        	$sql = "UPDATE Usuarios SET password='$password' WHERE email='$email'";
        	if(mysqli_query($mysqli,$sql)){
        	    echo "Contraseña actualizada";
        	    unset($_SESSION['code']);
        	    unset($_SESSION['email']);
        	}
        	else{
        	    echo "error al actualizar";
        	}
        	
        }
        
}

?>
</div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
