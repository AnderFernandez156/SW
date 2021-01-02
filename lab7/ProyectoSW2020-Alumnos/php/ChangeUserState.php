<?php 
if(!isset($_POST['email'])){
    echo "Error al cambiar de estado";
}
else{
    $email = $_POST['email'];
    if($email =="admin@ehu.es"){
        echo "no se puede modificar";
    }
    else{
    include "./DbConfig.php";
	$mysqli = mysqli_connect("$server", "$user", "$pass", "$basededatos");
	if (!$mysqli){
		die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
	}
    $sql = "SELECT estado FROM Usuarios WHERE email ='$email'";
    $resultado = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_row($resultado);
    if(!$row){
        echo "Error al cambiar de estado";
    }
    else{
        $estado=$row[0];
        if($estado=="activo"){
            $estado="bloqueado";
        }else{
            $estado="activo";
        }
        $sql = "UPDATE Usuarios SET estado = '$estado' WHERE email ='$email' ";
        if(mysqli_query($mysqli,$sql)){
            echo "Se ha modificado el estado";
        }
        else{
            echo "Error al cambiar de estado";
        }
    }
    
    
	
	mysqli_close($mysqli);
        
    }
}


?>