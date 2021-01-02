<?php session_start();
if(!isset($_SESSION['user'])){
    echo "<script type='text/javascript'>window.location.href = 'Layout.php';</script>";
	exit();
}?>
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
	$mysqli = mysqli_connect ("$server", "$user", "$pass", "$basededatos");
	if (!$mysqli){
		die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
	}
	$sql = "SELECT email, enunciado,respuestac FROM preguntas";
	$resultado = mysqli_query($mysqli,$sql);
	?>
	<h1>Preguntas almacenadas en la base de datos</h1>
	<table>
		<tr>
			<th>AUTOR</th>
			<th>ENUNCIADO</th>
			<th>RESPUESTA</th>
		</tr>
		<?php
		if($resultado){
			while($row = mysqli_fetch_array($resultado)){ 
				?>
			<tr>
				<th><?php echo $row['email'];?></th>
				<th><?php echo $row['enunciado'];?></th>
				<th><?php echo $row['respuestac'];?></th>
			</tr>
		<?php
				
			}
		}
		mysqli_close($mysqli);
		?>
		
	</table>
      
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
