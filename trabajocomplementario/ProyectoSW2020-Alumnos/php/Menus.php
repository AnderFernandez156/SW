<?php  
if(isset($_SESSION['user'])){
    if($_SESSION['user']!="admin@ehu.es"){?>
        <div id='page-wrap'>
        <header class='main' id='h1'>
        <?php 
        include "./DbConfig.php";
        $mysqli = mysqli_connect("$server", "$user", "$pass", "$basededatos");
		if (!$mysqli){
			die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
		}
		$email=$_SESSION['user'];
		$sql = "SELECT foto FROM Usuarios WHERE email='$email'";
		$resultado = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_row($resultado);
		?>
          <span class="right" ><a href="./LogOut.php">Logout</a><?php echo $_SESSION['user'];?><?php echo '<img  src="data:image/jpeg;base64,'.base64_encode( $row[0] ).'" style="width:50px;height:50px;">';?></span>
        
        </header>
        <nav class='main' id='n1' role='navigation'>
          <span><a href='Layout.php'>Inicio</a></span>
          <span><a href='ShowQuestions.php'> Ver Preguntas BD</a></span>
          <span><a href='HandlingQuizesAjax.php'> Preguntas</a></span>
          <span><a href='Credits.php'>Creditos</a></span>
        </nav>
<?php
    }
    else{ ?>
        <div id='page-wrap'>
        <header class='main' id='h1'>
        
         <span class="right" ><a href="./LogOut.php">Logout</a><?php echo $email?></span>
        
        </header>
        <nav class='main' id='n1' role='navigation'>
          <span><a href='Layout.php'>Inicio</a></span>
          <span><a href='HandlingAccounts.php'>Gestionar usuarios</a></span>
          <span><a href='Credits.php'>Creditos</a></span>
        </nav>
<?php 
    }
}
else{
?>
<div id='page-wrap'>
<header class='main' id='h1'>
  <span class="right"><a href="./SignUp.php">Registro</a></span>
  <span class="right"><a href="./LogIn.php">Login</a></span>
  <span><a href='modifyPassword.php'>Modificar contraseña</a></span>
</header>
<nav class='main' id='n1' role='navigation'>
  <span><a href='Layout.php'>Inicio</a></span>
  
  <span><a href='Credits.php'>Creditos</a></span>
</nav>
<?php }?>






		
