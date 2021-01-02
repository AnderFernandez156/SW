<?php 
	require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');
    $password = $_POST['passw'];
	$soapclient = new nusoap_client( "https://swander.000webhostapp.com/Lab6/ProyectoSW2020-Alumnos/php/VerifyPassWS.php?wsdl",true);
	$result = $soapclient->call('comprobar',array('x'=>$password, 'y'=>'1010'));
    echo "LA CONTRASEÑA ES $result";
    ?>
