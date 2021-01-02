<?php session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']!="admin@ehu.es"){
    echo "<script>alert('Solo puede entrar el admin');</script>";
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
	$sql = "SELECT email, password,estado FROM Usuarios";
	$resultado = mysqli_query($mysqli,$sql);
	?>
        <h1>Gestión de usuarios</h1>
	<table>
		<tr>
			<th>EMAIL</th>
			<th>PASS</th>
			<th>ESTADO</th>
			<th>BLOQUEO</th>
			<th>BORRAR</th>
		</tr>
		<?php
		if($resultado){
			while($row = mysqli_fetch_array($resultado)){ 
			?>
			<tr>
				<th><?php echo $row['email'];?></th>
				<th><?php echo $row['password'];?></th>
				<th><?php echo $row['estado'];?></th>
				<?php $email = $row['email'];?>
				<th><?php echo "<button name='name' value=$email onclick='changeState(this.value)'>Cambiar estado</button>";?></th>
				<th><?php echo "<button name='name' value=$email onclick='deleteAccount(this.value)'>Eliminar usuario</button>";?></th>
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
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script>
      function changeState(data){
          $.ajax({
            type:"POST", 
            url:"../php/ChangeUserState.php", 
            data:{"email":data},
            success:function(datos){ 
                alert(datos);
                location.reload();
             },
            dataType: 'html' 
        });
      }
      function deleteAccount(data){
          $.ajax({
            type:"POST", 
            url:"../php/RemoveUser.php", 
            data:{"email":data}, 
            success:function(datos){ 
                alert(datos);
                location.reload();
             },
            dataType: 'html' 
        });
      }
  </script>
</body>
</html>