<?php 
if(!isset($_POST['email'])){
    echo "Error al eliminar el usuario";
}
else{
    $email = $_POST['email'];
    if($email =="admin@ehu.es"){
        echo "no se puede eliminar";
    }
    else{
    include "./DbConfig.php";
	$mysqli = mysqli_connect("$server", "$user", "$pass", "$basededatos");
	if (!$mysqli){
		die ("Fallo al conectar a MySQL: " . mysqli_connect_error());
	}
    $sql = "DELETE FROM Usuarios WHERE email='$email'";
    if(mysqli_query($mysqli,$sql)){
            echo "Se ha eliminado al usuario";
        }
    else{
        echo "Error al eliminar el usuario";
    }
    mysqli_close($mysqli);
        
    }
}


?>